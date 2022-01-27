<?php

namespace App\Http\Components\Frontend;

use App\Models\Property;
use Livewire\Component;

class PropertiesList extends Component
{
    public $properties;

    public function render()
    {
        return view('components.frontend.properties-list');
    }

    public function loadProperties()
    {
        $this->properties = Property::all();
    }
}
