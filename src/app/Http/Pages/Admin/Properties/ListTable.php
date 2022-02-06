<?php

namespace App\Http\Pages\Admin\Properties;

use App\Models\Property;
use Livewire\Component;

class ListTable extends Component
{
    public $properties;

    public function render()
    {
        return view('pages.admin.properties.list-table');
    }

    public function load()
    {
        $this->properties = Property::all();
    }
}
