<?php

namespace App\Http\Pages\Frontend;

use App\Models\Property as PropertyModel;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class PropertyPage extends Component
{
    use WireToast;

    public $property_id;
    public $property;

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
}
