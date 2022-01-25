<?php

namespace App\Http\Components\Backend\Properties;

use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PropertyList extends Component
{
    public $properties = [];

    public function render()
    {
        return view('components.properties.property-list');
    }

    public function init()
    {
        $this->properties = Property::where('user_id', Auth::user()->id)->get();
    }
}
