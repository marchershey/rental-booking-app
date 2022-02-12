<?php

namespace App\Http\Pages\Frontend;

use App\Models\Property as PropertyModel;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class PropertyPage extends Component
{
    use WireToast;

    public $property_id;
    public $property;
    public $checkin;
    public $checkout;
    public $nights;
    // pricing
    // public $totalCost;
    // public $nightlyRate;
    // public $fees = [];
    // public $tax;

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
        $this->property = PropertyModel::find($this->property_id)->first();
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

    public function updateDates($dates)
    {
        $this->checkin = Carbon::parse($dates[0])->format('Y-m-d');
        $this->checkout = Carbon::parse($dates[1])->format('Y-m-d');
        $this->nights = Carbon::parse($this->checkin)->diffInDays(Carbon::parse($this->checkout));

        // $this->calculateTotal();

        $this->dispatchBrowserEvent('showconfirmation');
    }

    public function clearDates()
    {
        $this->checkin = null;
        $this->checkout = null;
        $this->nights = null;
        $this->dispatchBrowserEvent('hideconfirmation');
    }

    // public function calculateTotal()
    // {
    //     // nightly rate
    //     $this->nightlyRate = $this->property->nightlyRate * $this->nights; // calculate nightly rate
    //     $this->totalCost = $this->nightlyRate; // add nightly rate to total cost

    //     // fees
    //     $this->propertyFees = $this->property->fees->toArray();
    //     if($this->propertyFees){
    //         foreach($this->propertyFees as $fee){
    //             if($fee['type'] == 'fixed'){
    //                 $this->fees[] = [
    //                     'name' => $fee['name'],
    //                     'amount' => $fee['amount'],
    //                 ];
    //                 $this->totalCost = $this->totalCost + $fee['amount'];
    //             }elseif($fee['type'] == 'percent'){
    //                 $this->fees[] = [
    //                     'name' => $fee['name'],
    //                     'amount' => (($fee['amount'] * 0.01) * $this->nightlyRate),
    //                 ];
    //                 $this->totalCost = $this->totalCost + (($fee['amount'] * 0.01) * $this->nightlyRate);
    //             }
    //         }
    //     }

    //     // tax
    //     if($this->property->taxRate){
    //         $taxPercentage = $this->property->taxRate * 0.01;
    //         $this->tax = $this->totalCost * $taxPercentage;
    //         $this->totalCost = $this->totalCost + $this->tax;
    //     }
    // }

    public function submit()
    {
        try {
            $reservation = Reservation::create([
                'slug' => Str::uuid()->toString(),
                'property_id' => $this->property->id,
                'checkin' => $this->checkin,
                'checkout' => $this->checkout,
                'nights' => $this->nights,
            ]);
        } catch (\Exception $e) {
            toast()->danger('Please refresh the page and try again. [' . $e->getCode() . ']', 'Server error')->push();
            return;
        }

        return redirect()->route('frontend.checkout', ['reservation' => $reservation->slug]);
    }
}
