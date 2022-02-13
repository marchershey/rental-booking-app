<?php

namespace App\Http\Pages\Frontend;

use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;

class CheckoutPage extends Component
{
    // states
    public $showCalendar = false;

    // reservation
    public $reservationSlug;
    public $reservation;
    public $checkin;
    public $checkout;

    // billing information
    public $name;
    public $email;
    public $phone;
    public $address;
    public $unit;
    public $city;
    public $state;
    public $zip;

    // prices
    public $nightlyRate;
    public $fees = [];
    public $tax;
    public $totalCost;

    // stripe
    protected $stripeCustomer;
    protected $stripeIntent;
    public $stripeClientSecret;

    public function render()
    {
        return view('pages.frontend.checkout')->layout('layouts.app');
    }

    public function mount($reservationSlug)
    {
        $this->reservationSlug = $reservationSlug;
    }

    public function load()
    {
        $this->reservation = Reservation::where('slug', $this->reservationSlug)->first();

        // set the checkin/checkout for the calendar
        $this->checkin = $this->reservation->checkin;
        $this->checkout = $this->reservation->checkout;

        // set the users contact information
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        $this->phone = auth()->user()->phone;
        $this->address = auth()->user()->address;
        $this->unit = auth()->user()->unit;
        $this->city = auth()->user()->city;
        $this->state = auth()->user()->state;
        $this->zip = auth()->user()->zip;


        $this->calculateTotal();
        $this->stripeSetup();
    }

    public function stripeSetup()
    {
        $this->stripeCustomer = auth()->user()->createOrGetStripeCustomer();
        $this->stripeIntent = auth()->user()->createSetupIntent([
            'customer' => $this->stripeCustomer->id,
            'payment_method_types' => ['card'],
        ]);
        $this->stripeClientSecret = $this->stripeIntent->client_secret;
        $this->dispatchBrowserEvent('stripeSetupCardElement');
    }

    public function calculateTotal()
    {
        // nightly rate
        $this->nightlyRate = $this->reservation->property->nightlyRate * $this->reservation->nights; // calculate nightly rate
        $this->totalCost = $this->nightlyRate; // add nightly rate to total cost

        // fees
        $this->fees = [];
        $this->propertyFees = $this->reservation->property->fees->toArray();
        if ($this->propertyFees) {
            foreach ($this->propertyFees as $propertyFee) {
                if ($propertyFee['type'] == 'fixed') {
                    $this->fees[] = [
                        'name' => $propertyFee['name'],
                        'amount' => $propertyFee['amount'],
                    ];
                    $this->totalCost = $this->totalCost + $propertyFee['amount'];
                } elseif ($propertyFee['type'] == 'percent') {
                    $this->fees[] = [
                        'name' => $propertyFee['name'],
                        'amount' => (($propertyFee['amount'] * 0.01) * $this->nightlyRate),
                    ];
                    $this->totalCost = $this->totalCost + (($propertyFee['amount'] * 0.01) * $this->nightlyRate);
                }
            }
        }

        // tax
        if ($this->reservation->property->taxRate) {
            $taxPercentage = $this->reservation->property->taxRate * 0.01;
            $this->tax = $this->totalCost * $taxPercentage;
            $this->totalCost = $this->totalCost + $this->tax;
        }
    }

    public function showCalendar()
    {
        $this->showCalendar = true;
        $this->dispatchBrowserEvent('calendarLoad');
    }

    public function updateDates($dates)
    {
        $reservation = Reservation::find($this->reservation->id);
        $reservation->checkin = Carbon::parse($dates[0])->format('Y-m-d');
        $reservation->checkout = Carbon::parse($dates[1])->format('Y-m-d');
        $reservation->nights = Carbon::parse($dates[0])->diffInDays(Carbon::parse($dates[1]));
        $reservation->save();

        $this->load();

        $this->showCalendar = false;
        $this->dispatchBrowserEvent('calendarDestroy');
    }

    public function submit()
    {
        // update billing information
        $validatedData = $this->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zip' => 'required',
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $this->name;
        $user->phone = $this->phone;
        $user->address = $this->address;
        $user->unit = $this->unit;
        $user->city = $this->city;
        $user->state = $this->state;
        $user->zip = $this->zip;
        $user->save();

        // update stripe customer
        auth()->user()->updateStripeCustomer([
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
            'phone' => auth()->user()->phone,
            'address' => [
                'line1' => auth()->user()->address,
                'line2' => auth()->user()->unit,
                'city' => auth()->user()->city,
                'state' => auth()->user()->state,
                'postal_code' => auth()->user()->zip,
                'country' => 'US',
            ],
        ]);

        $this->dispatchBrowserEvent('submitStripe');
    }

    // public function testCharge($paymentMethod)
    public function savePaymentMethod($setupIntent)
    {
        dd($setupIntent);

        toast()->success('saved')->push();
        // $payment = auth()->user()->charge(100, $paymentMethod['id'], ['off_session' => true]);
        // $payment = auth()->user()->charge(100, $intent['payment_method'], ['off_session' => true]);
        // dd($payment);
    }
}
