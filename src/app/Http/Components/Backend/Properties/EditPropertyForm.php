<?php

namespace App\Http\Components\Backend\Properties;

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

    public $propertyId;
    public $property;
    public $address;
    public $unit;
    public $city;
    public $state;
    public $zip;
    public $type;
    public $guests;
    public $bedrooms;
    public $beds;
    public $bathrooms;
    public $listing_headline;
    public $listing_desc;
    public $listing_rating;
    public $listing_rating_count;

    public $stagedPhotos;
    public $uploadedPhotos = [];
    public $maxPhotos = 30;

    protected $rules = [
        'address' => 'required|string|regex:/^[a-zA-Z0-9\s]+$/',
        'unit' => 'nullable|alpha_num',
        'city' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
        'state' => 'required|alpha',
        'zip' => 'required|numeric|max:99999',
        'type' => 'required|alpha',
        'guests' => 'required|numeric|min:1|max:16',
        'bedrooms' => 'required|numeric|min:0|max:50',
        'beds' => 'required|numeric|min:0|max:50',
        'bathrooms' => 'required|numeric|min:0|max:50',
        'listing_headline' => 'required|min:1|max:500',
        'listing_desc' => 'required',
        'listing_rating' => 'nullable|numeric|between:0.0,5.0',
        'listing_rating_count' => 'nullable|numeric|min:0',
        'stagedPhotos' => 'nullable|max:12288',
        'stagedPhotos.*' => 'nullable|image'
    ];

    public function render()
    {
        return view('components.backend.properties.edit-property-form');
    }

    public function mount($propertyId)
    {
        $this->propertyId = $propertyId;
    }

    public function loadProperty()
    {
        $this->property = Property::firstWhere('id', $this->propertyId);
        $this->address = $this->property->address;
        $this->unit = $this->property->unit;
        $this->city = $this->property->city;
        $this->state = $this->property->state;
        $this->zip = $this->property->zip;
        $this->type = $this->property->type;
        $this->guests = $this->property->guests;
        $this->bedrooms = $this->property->bedrooms;
        $this->beds = $this->property->beds;
        $this->bathrooms = $this->property->bathrooms;
        $this->listing_headline = $this->property->listing_headline;
        $this->listing_desc = $this->property->listing_desc;
        $this->listing_rating = number_format($this->property->listing_rating, 1);
        $this->listing_rating_count = $this->property->listing_rating_count;
        $this->uploadedPhotos = $this->property->photos->toArray();
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function removeUploadedPhoto(Photo $photo, $notification = true)
    {
        Storage::delete('public/' . $photo->path); // delete file
        $photo->delete(); // delete in db
        $this->loadProperty(); // refresh property
        if($notification){
            toast()->success('Photo deleted successfully')->push();
        }
    }

    public function removeStagedPhoto($key)
    {
        unset($this->stagedPhotos[$key]);
    }

    public function submit()
    {
        $this->validate();

        // dd($this->bedrooms);

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
            $property->beds = $this->beds;
            $property->bathrooms = $this->bathrooms;
            $property->listing_headline = $this->listing_headline;
            $property->listing_desc = $this->listing_desc;
            $property->listing_rating = $this->listing_rating;
            $property->listing_rating_count = $this->listing_rating_count;
            $property->user_id = Auth::user()->id;
            $property->save();

            if($this->stagedPhotos){
                foreach ($this->stagedPhotos as $key => $photo) {
                    // MAX PHOTOS VALIDATION
                    if($key < $this->maxPhotos){
                        $photoPath = $photo->storePublicly('photos', 'public');
                        Photo::create([
                            'name' => $this->stagedPhotos[$key]->getFilename(),
                            'filename' => $this->stagedPhotos[$key]->getClientOriginalName(),
                            'size' => $this->stagedPhotos[$key]->getSize(),
                            'path' => $photoPath,
                            'property_id' => $property->id,
                            'user_id' => Auth::user()->id
                        ]);
                    }else{
                        unset($this->stagedPhotos[$key]);
                    }
                }
            }
        } catch (\Exception $e) {
            toast()->danger('There was a problem on our end. (' . $e->getCode() . ')', 'Error')->push();
            return;
        }

        toast()->success('Your property was updated.')->pushOnNextPage();
        return redirect()->route('dashboard.properties.index');
    }

    public function delete()
    {
        // delete photos
        foreach($this->property->photos as $photo){
            $this->removeUploadedPhoto($photo, false);
        }

        // delete listing
        $this->property->delete();

        // create notificaiton
        toast()->success('Your property was successfully deleted!')->pushOnNextPage();

        return redirect()->route('dashboard.properties.index');
    }
}
