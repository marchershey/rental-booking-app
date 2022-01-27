<?php

namespace App\Http\Components\Frontend;

use App\Models\Property;
use Livewire\Component;

class Reserve extends Component
{
    public $propertyId;
    public $property;

    public function render()
    {
        return view('components.frontend.reserve');
    }

    public function mount($propertyId)
    {
        $this-> propertyId = $propertyId;
    }

    public function load()
    {
        // sleep(10);
        $this->property = Property::find($this->propertyId);
    }
}
