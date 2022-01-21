<?php

namespace App\Http\Components\Properties;

use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Usernotnull\Toast\Concerns\WireToast;

use Livewire\Component;

class NewPropertyForm extends Component
{
    use WireToast;

    public $address;
    public $unit;
    public $city;
    public $state;
    public $zip;
    public $type;
    public $guests;
    public $bedrooms;
    public $bathrooms;
    public $listing_headline;
    public $listing_desc;
    public $listing_rating;
    public $listing_rating_count;

    protected $rules = [
        'address' => 'required|string|regex:/^[a-zA-Z0-9\s]+$/',
        'unit' => 'nullable|alpha_num',
        'city' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
        'state' => 'required|alpha',
        'zip' => 'required|numeric|max:99999',
        'type' => 'required|alpha',
        'guests' => 'required|numeric|min:1|max:16',
        'bedrooms' => 'required|numeric|min:0|max:50',
        'bathrooms' => 'required|numeric|min:0|max:50',
        'listing_headline' => 'required|min:1|max:500',
        'listing_desc' => 'required',
        'listing_rating' => 'nullable|numeric|min:1|max:5',
        'listing_rating_count' => 'nullable|numeric|min:0',
    ];

    public function render()
    {
        return view('components.properties.new-property-form');
    }

    public function mount()
    {
        $this->address = "123 address ave";
        $this->unit = "1a";
        $this->city = "lexington";
        $this->state = "KY";
        $this->zip = "10001";
        $this->type = "house";
        $this->guests = 6;
        $this->bedrooms = 2;
        $this->bathrooms = 1.5;
        // $this->guests = "6";
        // $this->bedrooms = "2";
        // $this->bathrooms = "1.5";
        $this->listing_headline = "Listing Head";
        $this->listing_desc = "This is the listing description with long text";
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        // try {
            $property = new Property();
            $property->address = $this->address;
            $property->unit = $this->unit;
            $property->city = $this->city;
            $property->state = $this->state;
            $property->zip = $this->zip;
            $property->type = $this->type;
            $property->guests = $this->guests;
            $property->bedrooms = $this->bedrooms;
            $property->bathrooms = $this->bathrooms;
            $property->listing_headline = $this->listing_headline;
            $property->listing_desc = $this->listing_desc;
            $property->listing_rating = $this->listing_rating;
            $property->listing_rating_count = $this->listing_rating_count;
            $property->user_id = Auth::user()->id;
            $property->save();
        // } catch (\Exception $e) {
        //     dd($e);
        //     toast()->danger('There was a problem on our end. (' . $e->getCode() . ')', 'Error')->push();
        // }

    }
}
