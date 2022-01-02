<?php

namespace App\Http\Components\Landing;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class ReservationButton extends Component
{
    // strings
    public $title;
    public $subtitle;
    public $numOfNights = 0;
    public $numOfMinNights = 3;
    public $continueButtonText;

    // user data
    public $checkinDate;
    public $checkoutDate;
    public $firstName;
    public $lastName;
    public $birthdate;
    public $phoneNumber;
    public $emailAddress;

    // prices & fees
    public $baseFee = 299;
    public $cleaningFee = 175;
    public $taxes = 0;
    public $total = 0;

    // states
    public $calendarVisible = true;
    public $guestDataVisible = false;
    public $pricesVisible = false;
    public $continueButtonEnabled = false;
    public $submitType;

    // validation
    protected $rules = [
        'checkinDate' => 'required',
        'checkoutDate' => 'required',
        'firstName' => 'required',
        'lastName' => 'required',
        'birthdate' => 'required|date',
        'phoneNumber' => 'required|regex:/\b\d{3}[-.]?\d{3}[-.]?\d{4}\b/',
        'emailAddress' => 'required|email',
    ];

    public function render()
    {
        return view('components.landing.reservation-button');
    }

    public function mount()
    {
        $this->calendarVisible = true;
        $this->guestDataVisible = false;
        $this->pricesVisible = false;
        $this->continueButtonEnabled = true;
        $this->submitType = "submitUserData";

        $this->title = "Select your check-in date";
        $this->subtitle = "Select the dates you would like to stay...";
        $this->checkinDate = null;
        $this->checkoutDate = null;
        $this->continueButtonText = "Continue";
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
        $this->resetValidation($propertyName);
        $this->resetErrorBag($propertyName);
    }

    public function updateDates($selectedDates, $dateStr)
    {
        // first date selected
        if (isset($selectedDates[0]) && !isset($selectedDates[1])) {
            $this->checkinDate = $this->formatHumanFriendlyDate($selectedDates[0]);
            $this->checkoutDate = null;

            $this->dispatchBrowserEvent('disableMinDates', ['selectedDate' => $selectedDates[0]]);

            $this->title = "Now, select your check-out date";
            $this->subtitle = "Please note, there is a " . $this->numOfMinNights . "-night minimum";
        }

        // both dates selected
        if (isset($selectedDates[0]) && isset($selectedDates[1])) {
            $this->calendarVisible = false;
            $this->guestDataVisible = true;

            $this->checkinDate = $this->formatHumanFriendlyDate($selectedDates[0]);
            $this->checkoutDate = $this->formatHumanFriendlyDate($selectedDates[1]);
            $this->numOfNights = Carbon::parse($this->checkinDate)->diffInDays($this->checkoutDate);

            $this->dispatchBrowserEvent('enableAllDates');

            $this->title = $this->numOfNights . " nights selected";
            $this->subtitle = "Fill out the information below to continue...";

            $this->calculateTotal();
        }
    }

    public function resetReservation()
    {
        $this->mount();
    }

    public function calculateTotal()
    {
        // (base fee * number of nights) + cleaning fee + taxes
        $baseTotal = $this->baseFee * $this->numOfNights;
        $this->taxes = $baseTotal * 0.07;
        $this->total = $baseTotal + $this->cleaningFee + $this->taxes;
    }

    public function formatHumanFriendlyDate($date)
    {
        return Carbon::parse($date)->format('M j, Y');
    }

    public function submitUserData()
    {
        $this->validate(); // will stop here if validation fails

        $this->pricesVisible = true;
        $this->submitType = "checkout";
        $this->continueButtonText = "Request Dates";
    }

    public function checkout()
    {
        //
    }
}
