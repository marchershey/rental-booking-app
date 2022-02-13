<?php

namespace App\Http\Pages\Frontend;

use App\Models\Property as PropertyModel;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class PropertyPage extends Component
{
    use WireToast;

    // states
    public $authType = "auth";
    public $showCalendar = true;
    public $showLoginForm = false;
    public $showSignupForm = false;

    // properties
    public $property_id;
    public $property;
    public $checkin;
    public $checkout;
    public $nights;

    // auth
    public $user;
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    // prices
    public $nightlyRate;
    public $fees = [];
    public $tax;
    public $totalCost;

    public function render()
    {
        return view('pages.frontend.property')->layout('layouts.app');
    }

    public function mount($property_id)
    {
        $this->property_id = $property_id;
    }

    public function load()
    {
        // load the property
        $this->property = PropertyModel::find($this->property_id);

        // load the user if signed in
        if (auth()->user()) {
            $this->user = auth()->user();
        }

        // load slider
        $this->dispatchBrowserEvent('sliderLoad');

        // load calendar
        $this->dispatchBrowserEvent('calendarLoad');
    }

    // public function clearDates()
    // {
    //     $this->checkin = null;
    //     $this->checkout = null;
    //     $this->nights = 0;
    //     $this->nightlyRate = 0;
    //     $this->cleaningFee = 0;
    //     $this->fees = [];
    //     $this->dispatchBrowserEvent('showcalendar');
    //     $this->dispatchBrowserEvent('clearcalendardates');
    // }

    public function checkAvailabilty()
    {
        toast()->info('Please select your check-in and check-out dates from the calendar')->push();
    }

    public function updateDates($dates)
    {

        $this->checkin = Carbon::parse($dates[0])->format('Y-m-d');
        $this->checkout = Carbon::parse($dates[1])->format('Y-m-d');
        $this->nights = Carbon::parse($this->checkin)->diffInDays(Carbon::parse($this->checkout));

        $this->calculateTotal();

        $this->showCalendar = false;
    }

    public function clearDates()
    {
        $this->checkin = null;
        $this->checkout = null;
        $this->nights = null;
        $this->showCalendar = true;
    }

    public function calculateTotal()
    {
        // nightly rate
        $this->nightlyRate = $this->property->nightlyRate * $this->nights; // calculate nightly rate
        $this->totalCost = $this->nightlyRate; // add nightly rate to total cost

        // fees
        $this->propertyFees = $this->property->fees->toArray();
        if($this->propertyFees){
            foreach($this->propertyFees as $fee){
                if($fee['type'] == 'fixed'){
                    $this->fees[] = [
                        'name' => $fee['name'],
                        'amount' => $fee['amount'],
                    ];
                    $this->totalCost = $this->totalCost + $fee['amount'];
                }elseif($fee['type'] == 'percent'){
                    $this->fees[] = [
                        'name' => $fee['name'],
                        'amount' => (($fee['amount'] * 0.01) * $this->nightlyRate),
                    ];
                    $this->totalCost = $this->totalCost + (($fee['amount'] * 0.01) * $this->nightlyRate);
                }
            }
        }

        // tax
        if($this->property->taxRate){
            $taxPercentage = $this->property->taxRate * 0.01;
            $this->tax = $this->totalCost * $taxPercentage;
            $this->totalCost = $this->totalCost + $this->tax;
        }
    }

    public function auth()
    {
        $this->user = User::where('email', $this->email)->first();

        if ($this->user) {
            $this->showLoginForm = true;
            $this->showSignupForm = false;
            $this->authType = "login";
        } else {
            $this->showSignupForm = true;
            $this->showLoginForm = false;
            $this->authType = "signup";
        }
    }

    public function login()
    {
        if ($this->user = auth()->attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->user = auth()->user();
            toast()->debug('Welcome back, ' . auth()->user()->firstName() . '!')->pushOnNextPage();
            $this->submit();
        } else {
            toast()->danger('Incorrect password.')->push();
        }
    }

    public function signup()
    {
        // create user
        $this->user = User::create([
            'name' => ucwords($this->name),
            'email' => $this->email,
            'password' => Hash::make($this->password),
        ]);

        // login user
        auth()->attempt(['email' => $this->email, 'password' => $this->password]);

        // submit the form
        toast()->debug('Thanks for joining, ' . auth()->user()->firstName() . '!')->pushOnNextPage();
        $this->submit();
    }

    public function submit()
    {
        try {
            $reservation = Reservation::create([
                'slug' => Str::uuid()->toString(),
                'property_id' => $this->property->id,
                'user_id' => $this->user->id,
                'checkin' => $this->checkin,
                'checkout' => $this->checkout,
                'nights' => $this->nights,
            ]);
        } catch (\Exception $e) {
            toast()->danger('Please refresh the page and try again. [' . $e->getCode() . ']', 'Server error')->push();
            return;
        }

        return redirect()->route('frontend.checkout', ['reservationSlug' => $reservation->slug]);
    }
}
