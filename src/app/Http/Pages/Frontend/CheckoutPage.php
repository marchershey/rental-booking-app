<?php

namespace App\Http\Pages\Frontend;

use App\Models\Reservation;
use Livewire\Component;

class CheckoutPage extends Component
{

    public $reservation;
    public $property;
    public $nights;
    public $totalCost;
    public $nightlyRate;
    public $fees = [];
    public $tax;

    public function render()
    {
        return view('pages.frontend.checkout')->layout('layouts.app');
    }

    public function mount(Reservation $reservation)
    {
        $this->reservation = $reservation;
    }

     public function calculateTotal()
    {
        // nightly rate
        $this->nightlyRate = $this->reservation->property->nightlyRate * $this->reservation->nights; // calculate nightly rate
        $this->totalCost = $this->nightlyRate; // add nightly rate to total cost

        // fees
        $propertyFees = $this->reservation->property->fees->toArray();
        if($propertyFees){
            foreach($propertyFees as $fee){
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
        if($this->reservation->property->taxRate){
            $taxPercentage = $this->reservation->property->taxRate * 0.01;
            $this->tax = $this->totalCost * $taxPercentage;
            $this->totalCost = $this->totalCost + $this->tax;
        }
    }

    public function changeDates()
    {
        return redirect()->route('frontend.property', ['property_id' => $this->reservation->property->id]);
    }
}
