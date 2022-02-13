<?php

namespace App\Http\Pages\Admin\Guests;

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Livewire\Component;
use Livewire\WithPagination;

class ViewGuestsPage extends Component
{
    use WithPagination;

    public $guests;

    public function render()
    {
        return view('pages.admin.guests.view-guests-page');
    }

    public function load()
    {
        $this->guests = User::where('admin', false)->orderBy('id')->orderBy('created_at')->paginate(10)->toArray()['data'];
    }
}
