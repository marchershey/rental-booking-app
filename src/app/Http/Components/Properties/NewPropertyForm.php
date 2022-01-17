<?php

namespace App\Http\Components\Properties;

use Livewire\Component;

class NewPropertyForm extends Component
{
    public $address;
    public $unit;
    public $city;
    public $state;
    public $zip;
    public $country;
    public $type;
    public $guests;
    public $bedrooms;
    public $bathrooms;
    public $headline;
    public $desc;

    public function render()
    {
        return view('components.properties.new-property-form');
    }

    public function mount()
    {
        //
    }

    public function submit()
    {
        dd($this);
    }
}
