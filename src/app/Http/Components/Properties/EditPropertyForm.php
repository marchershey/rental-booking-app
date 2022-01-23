<?php

namespace App\Http\Components\Properties;

use App\Models\Photo;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Usernotnull\Toast\Concerns\WireToast;

class EditPropertyForm extends Component
{
    use WithFileUploads;
    use WireToast;

    public $property;
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

    public $photos = [];
    public $uploadedPhotos = [];
    public $maxPhotos = 3;

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
        'photos' => 'nullable|max:12288',
        'photos.*' => 'nullable|image'
    ];

    public function render()
    {
        return view('components.properties.edit-property-form');
    }

    public function mount(Property $property)
    {
        $this->property = $property;
        $this->address = $property->address;
        $this->unit = $property->unit;
        $this->city = $property->city;
        $this->state = $property->state;
        $this->zip = $property->zip;
        $this->type = $property->type;
        $this->guests = $property->guests;
        $this->bedrooms = $property->bedrooms;
        $this->bathrooms = $property->bathrooms;
        $this->listing_headline = $property->listing_headline;
        $this->listing_desc = $property->listing_desc;
        $this->uploadedPhotos = $property->photos->toArray();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function removeImage($key)
    {

    }

    public function submit()
    {
        if($this->photos){
            dd('yes');
        }else{
            dd('no');
        }



        $this->validate();





        try {
            $property = Property::find($this->property->id);
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

            foreach ($this->photos as $key => $photo) {
                // MAX PHOTOS VALIDATION
                if($key < $this->maxPhotos){
                    $this->photos[$key] = $photo->storePublicly('photos', 'public');
                    Photo::create(['path' => $this->photos[$key], 'property_id' => $property->id, 'user_id' => Auth::user()->id]);
                }else{
                    unset($this->photos[$key]);
                }
            }

        } catch (\Exception $e) {
            toast()->danger('There was a problem on our end. (' . $e->getCode() . ')', 'Error')->push();
            return;
        }

        toast()->success('Your property was updated.')->pushOnNextPage();
        return redirect()->route('dashboard.properties.index');
    }
}
