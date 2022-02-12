<?php

namespace App\Http\Pages\Admin\Properties;

use App\Models\Fee;
use App\Models\Photo;
use App\Models\Property;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Usernotnull\Toast\Concerns\WireToast;


class PropertyForm extends Component
{
    use WithFileUploads;
    use WireToast;

    // states
    public $showDeleteButton = null;

    // property
    public $property_id;
    public $property;
    public $name;
    public $type;
    public $title;
    public $description;
    public $address;
    public $nightlyRate;
    public $taxRate;
    public $fees = [];
    public $photos;
    public $stagedPhotos;

    public $maxPhotos = 20;

    protected $rules = [
        'name' => 'required',
        'type' => 'required',
        'title' => 'required',
        'description' => 'required',
        'address' => 'required',
        'nightlyRate' => 'required|numeric|min:1',
        'taxRate' => 'required|numeric',
        'fees' => '',
        'fees.*' => '',
        'stagedPhotos' => 'nullable|max:12288',
        'stagedPhotos.*' => 'nullable|image',
    ];


    public function render()
    {
        return view('pages.admin.properties.property-form');
    }

    public function mount($property_id = null)
    {
        $this->property_id = $property_id;
    }

    public function load()
    {
        if ($this->property_id != null) {
            $this->showDeleteButton = true;
            $this->property = Property::find($this->property_id);
            $this->name = $this->property->name;
            $this->type = $this->property->type;
            $this->title = $this->property->title;
            $this->description = $this->property->description;
            $this->address = $this->property->address;
            $this->nightlyRate = $this->property->nightlyRate;
            $this->taxRate = $this->property->taxRate;
            $this->fees = $this->property->fees->toArray();
            $this->photos = $this->property->photos;
            $this->dispatchBrowserEvent('address-updated', ['newAddress' => $this->address]);
        } elseif (app()->isLocal()) {
            $this->showDeleteButton = false;
            $this->name = 'Ohana Burnside';
            $this->type = 'Full House';
            $this->title = 'Spacious home (sleeps 14) w/new furniture, TVs, hot tub, game room in basement';
            $this->description = 'Beautiful lake view nestled in the heart of the Daniel Boone National Forest by Lake Cumberland! Spacious 3 bedroom home with bonus basement sleeping area has large hot tub under screened in, covered porch and is located in a private gated resort community with multiple pools, tennis courts, walking/ATV trails- all within 1 mile of a boat ramp. New furniture with new TVs in every bedroom, basement game room with bar and poker table, jacuzzi in master bedroom. Nearby attractions include a state park with golf, Burnside Marina, Cumberland Falls, South Fork Scenic Railway and just a short trip to Somerset for a drive-in movie or water park. The gated resort includes multiple swimming pools (1 in the property\'s gate) along with tennis courts';
            $this->address = '12320 Ridgemont Road, Louisville, KY, USA';
            $this->dispatchBrowserEvent('address-updated', ['newAddress' => $this->address]);
            $this->nightlyRate = '379';
            $this->taxRate = '7';
        }
    }

    public function updating($field, $value)
    {
        $this->dispatchBrowserEvent('console', ['message' => [
            $field => $value
        ]]);
    }

    public function updated($field, $value)
    {
        $this->validateOnly($field);
    }

    public function addFee()
    {
        array_push($this->fees,[
            'type' => 'fixed'
        ]);
    }

    public function removeFee($key)
    {
        unset($this->fees[$key]);
    }

    public function removeUploadedPhoto(Photo $photo, $notification = true)
    {
        Storage::delete('public/' . $photo->path); // delete file
        $photo->delete(); // delete in db
        $this->load(); // refresh property
        if ($notification) {
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

        if ($this->property_id == null) {
            $property = new Property();
        } else {
            $property = $this->property;
        }


        $property->name = $this->name;
        $property->type = $this->type;
        $property->title = $this->title;
        $property->description = $this->description;
        $property->address = $this->address;
        $property->nightlyRate = $this->nightlyRate;
        $property->taxRate = $this->taxRate;
        $property->user_id = auth()->user()->id;

        try {
            $property->save();
        } catch (\Throwable $e) {
            // toast()->debug($e->errorInfo[2])->push();
            toast()->danger('Please refresh the page and try again. [' . $e->getCode() . ']', 'Server error')->push();
            return;
        }


        // Remove existing fees
        // you gotta come up with a cleaner way to do this... this seems ugly
        if($property->fees){
            foreach($property->fees as $fee){
                $property->fees()->delete();
            }
        }

        // add fees
        try {
            if($this->fees) {
                foreach($this->fees as $fee){
                    Fee::create([
                        'property_id' => $property->id,
                        'user_id' => auth()->user()->id,
                        'name' => $fee['name'],
                        'amount' => $fee['amount'],
                        'type' => $fee['type'],
                    ]);
                }
            }
        } catch (\Exception $e) {
            toast()->danger('Please refresh the page and try again. [' . $e->getCode() . ']', 'Server error')->push();
        }

        if ($this->stagedPhotos) {
            foreach ($this->stagedPhotos as $key => $photo) {
                // MAX PHOTOS VALIDATION
                if ($key < $this->maxPhotos) {
                    $photoPath = $photo->storePublicly('photos', 'public');
                    Photo::create([
                        'name' => $this->stagedPhotos[$key]->getFilename(),
                        'filename' => $this->stagedPhotos[$key]->getClientOriginalName(),
                        'size' => $this->stagedPhotos[$key]->getSize(),
                        'path' => $photoPath,
                        'property_id' => $property->id,
                        'user_id' => auth()->user()->id
                    ]);
                } else {
                    unset($this->stagedPhotos[$key]);
                }
            }
        }

        // clean up tmp files
        Photo::removeTempPhotos();

        toast()->success('Your property was successfully created!')->pushOnNextPage();
        return redirect()->route('admin.properties.list');
    }

    public function delete()
    {
        // delete photos
        foreach ($this->property->photos as $photo) {
            $this->removeUploadedPhoto($photo, false);
        }

        // delete listing
        $this->property->delete();

        // create notificaiton
        toast()->success('Your property was successfully deleted!')->pushOnNextPage();

        return redirect()->route('admin.properties.list');
    }
}
