<?php

namespace App\Http\Components\Backend\Properties;

use App\Models\Photo;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Usernotnull\Toast\Concerns\WireToast;

use Livewire\Component;
use Livewire\WithFileUploads;

class NewPropertyForm extends Component
{
    use WithFileUploads;
    use WireToast;

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

    public $stagedPhotos = [];
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
        'listing_rating' => 'nullable|numeric|min:1|max:5',
        'listing_rating_count' => 'nullable|numeric|min:0',
        'stagedPhotos' => 'required|min:1',
        'stagedPhotos.*' => 'image|max:12288',
    ];

    public function render()
    {
        return view('components.backend.properties.new-property-form');
    }

    public function mount()
    {
        // set defaults
        $this->guests = 1;
        $this->bedrooms = 0;
        $this->beds = 0;
        $this->bathrooms = 0;

        // custom
        $this->address = "123 address ave";
        $this->unit = "1a";
        $this->city = "lexington";
        $this->state = "KY";
        $this->zip = "10001";
        $this->type = "house";
        $this->listing_headline = "Listing Head";
        $this->listing_desc = "This is the listing description with long text";
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function removeImage($key)
    {
        unset($this->stagedPhotos[$key]);
    }

    public function submit()
    {
        $this->validate();

        try {
            $property = new Property();
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
        } catch (\Exception $e) {
            toast()->danger('There was a problem on our end. (' . $e->getCode() . ')', 'Error')->push();
            return;
        }

        toast()->success('Your property was created.')->pushOnNextPage();
        return redirect()->route('dashboard.properties.index');
    }
}
