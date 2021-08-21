<?php

namespace App\Http\Components\Landing;

use Carbon\Carbon;
use Livewire\Component;

class ReservationButton extends Component
{
    public $title;
    public $subtitle;
    public $numOfNights = "0";

    public $isDisabled = true;

    public function render()
    {
        return view('components.landing.reservation-button');
    }

    public function mount()
    {
        $this->title = "Select your check-in date";
        $this->subtitle = "Select the dates you would like to stay...";
    }

    public function clearDates()
    {
        $this->title = "Select your check-in date";
        $this->subtitle = "Select the dates you would like to stay...";
    }

    public function updateDates($selectedDates, $dateStr)
    {
        if (count($selectedDates) == 1) {
            $this->title = "Now, select your check-out date";
        }

        if (count($selectedDates) == 2) {
            $checkinDate = Carbon::parse($selectedDates[0]);
            $checkoutDate = Carbon::parse($selectedDates[1]);

            $this->numOfNights = $checkinDate->diffInDays($checkoutDate);

            if ($this->numOfNights < 3) {
                $this->title = "3-night minimum";
                $this->dispatchBrowserEvent('resetDatesToStart', ['checkinDate' => $checkinDate]);
            } else {
                $this->title = $this->numOfNights . " nights selected";
                $this->subtitle = $dateStr;
                $this->isDisabled = false;
            }
        }
    }
}
