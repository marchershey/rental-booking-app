<?php

namespace App\Http\Components\Frontend;

use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Reserve extends Component
{
    use WireToast;

    public $propertyId;
    public $property;
    public $step;

    public $email;
    public $first_name;
    public $last_name;
    public $birthdate;


    protected $rules = [
        'email' => 'required|email',
    ];

    public function render()
    {
        return view('components.frontend.reserve');
    }

    public function mount($propertyId)
    {
        $this->step = "auth";
        // $this->email = "demo@hershey.cmo";
        $this-> propertyId = $propertyId;
    }

    public function load()
    {
        $this->property = Property::find($this->propertyId);
    }

    public function updatedEmail($value)
    {
        toast()->debug($value)->push();
    }

    public function resetReservation()
    {
        $this->resetExcept('propertyId', 'property');
        $this->step = "auth";
    }

    public function auth()
    {
        $validator = Validator::make(
            [
                'email' => $this->email,
            ],
            [
                'email' => 'required|email',
            ]
        );

        if ($validator->fails()) {
            toast()->danger($validator->errors()->first())->push();
        }

        $validator->validate();

        try {
            // check if user exists
            if($user = User::where('email', $this->email)->first()){
                $this->step = 'login';
            }else{
                $this->step = 'register';
            }
        } catch (\Throwable $e) {
            toast()->danger('There was a problem on our end. (' . $e->getCode() . ')', 'Error')->push();
        }
    }

    public function register()
    {
        dd($this);
    }
}
