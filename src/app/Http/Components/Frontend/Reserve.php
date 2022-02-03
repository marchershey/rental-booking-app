<?php

namespace App\Http\Components\Frontend;

use App\Models\Property;
use App\Models\Trip;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Reserve extends Component
{
    use WireToast;

    public $propertyId;
    public $property;
    public $user;
    public $trip;
    public $step;

    public $email;
    public $first_name;
    public $last_name;
    public $birthdate;
    public $password;
    public $password_confirmation;
    public $check_in_date;
    public $check_out_date;
    public $adults;
    public $children;


    protected $rules = [
        'email' => 'required|email|max:250',
        'first_name' => 'required|max:250|alpha',
        'last_name' => 'required|max:250|alpha',
        'birthdate' => 'required|date',
        'password' => 'required|min:6',
    ];

    public function render()
    {
        return view('components.frontend.reserve');
    }

    public function mount($propertyId)
    {
        $this->step = "auth";
        $this->email = "demo@hershey.co";
        $this->first_name = "marc";
        $this->last_name = "hershey";
        $this->propertyId = $propertyId;

        $this->adults = 2;
        $this->children = 0;
    }

    public function load()
    {
        $this->property = Property::find($this->propertyId);
        if (Auth::check()) {
            $this->user = Auth::user();
            $this->step = "trip";
        }
    }

    public function resetReservation()
    {
        $this->resetValidation();
        $this->resetExcept('propertyId', 'property');
        $this->step = "auth";
    }

    public function submit()
    {
        $step = $this->step;
        $this->$step();
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
            if ($user = User::where('email', $this->email)->first()) {
                $this->step = 'signin';
            } else {
                $this->step = 'register';
            }
        } catch (\Throwable $e) {
            toast()->danger('There was a problem on our end. (' . $e->getCode() . ')', 'Error')->push();
        }
    }

    public function signin()
    {
        $validator = Validator::make(
            [
                'email' => $this->email,
                'password' => $this->password,
            ],
            [
                'email' => 'required|email',
                'password' => 'required',
            ]
        );

        if ($validator->fails()) {
            toast()->danger($validator->errors()->first())->push();
        }

        $validator->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $this->user = auth()->user();
            toast()->success('<strong>Hi ' . $this->user->first_name . '!</strong> You\'ve sucessfully signed in!</strong>')->doNotSanitize()->push();
            $this->step = "trip";
        }else{
            toast()->danger('Incorrect email address or password')->push();
            $this->addError('password', 'error');
        }
    }


    public function register()
    {
        $validator = Validator::make(
            [
                'email' => $this->email,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'birthdate' => $this->birthdate,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
            ],
            [
                'email' => 'required|email|max:250',
                'first_name' => 'required|max:250|alpha',
                'last_name' => 'required|max:250|alpha',
                'birthdate' => 'required|date',
                'password' => ['required', 'confirmed', Password::min(6)->letters()->numbers()],
            ],
            [
                'password.confirmed' => 'Passwords do not match',
            ]
        );

        if ($validator->fails()) {
            toast()->danger($validator->errors()->first())->push();
        }

        $validator->validate();

        try {
            $user = new User();
            $user->first_name = ucfirst($this->first_name);
            $user->last_name = ucfirst($this->last_name);
            $user->email = $this->email;
            $user->birthdate = $this->birthdate;
            $user->password = Hash::make($this->password);
            $user->save();
            Auth::loginUsingId($user->id);
            $this->user = $user;
            $this->step = "trip";
        } catch (\Throwable $e) {
            toast()->danger('There was a problem on our end. (' . $e->getCode() . ')', 'Error')->push();
        }
    }

    public function updateDates($selectedDates)
    {
        if(isset($selectedDates[0]) && !isset($selectedDates[1])){
            $this->check_in_date = Carbon::parse($selectedDates[0])->format('Y-m-d');
        }

        if(isset($selectedDates[1])){
            $this->check_out_date = Carbon::parse($selectedDates[1])->format('Y-m-d');
        }

        // if($this->check_in_date && $this->check_out_date){
        //     $number_of_nights = Carbon::parse($this->check_in_date)->diffInDays($this->check_out_date);
        //     if($number_of_nights < 4){
        //         toast()->danger('Sorry, but there is a 3 night minimum')->push();
        //         $this->dispatchBrowserEvent('clearCalendarDates');
        //     }
        // }

    }

    public function trip()
    {
        $validator = Validator::make(
            [
                'check_in_date' => $this->check_in_date,
                'check_out_date' => $this->check_out_date,
                'adults' => $this->adults,
                'children' => $this->children,
            ],
            [
                'check_in_date' => 'required|date_format:Y-m-d',
                'check_out_date' => 'required|date_format:Y-m-d',
                'adults' => 'required|numeric|max:16|min:1',
                'children' => 'required|numeric|max:16|min:0',
            ]
        );

        if ($validator->fails()) {
            toast()->danger($validator->errors()->first())->push();
        }

        $validator->validate();

        $trip = new Trip();
        $trip->code = Str::uuid()->toString();
        $trip->user_id = $this->user->id;
        $trip->property_id = $this->property->id;
        $trip->check_in_date = Carbon::parse($this->check_in_date)->format('Y-m-d');
        $trip->check_out_date = Carbon::parse($this->check_out_date)->format('Y-m-d');
        $trip->number_of_nights = $number_of_nights = Carbon::parse($this->check_in_date)->diffInDays($this->check_out_date);
        $trip->adults = $this->adults;
        $trip->children = $this->children;
        $trip->guests = $this->adults + $this->children;
        $trip->rate_per_night = $this->property->rate;
        $trip->total_price = number_format($this->property->rate * $number_of_nights, 2);
        $trip->save();
        return redirect()->route('frontend.trip.checkout', ['code' => $trip->code]);
    }

}
