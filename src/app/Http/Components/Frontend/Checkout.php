<?php

namespace App\Http\Components\Frontend;

use App\Models\Trip;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Laravel\Cashier\Exceptions\IncompletePayment;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Checkout extends Component
{
    use WireToast;

    public $checkoutCode;
    public $trip;
    public $property;

    // states
    public $showCreditCardField = false;

    // user
    public $user;
    public $email;
    public $first_name;
    public $last_name;
    public $birthdate;
    public $phone;
    public $address;
    public $unit;
    public $city;
    public $state;
    public $zip;

    // stripe data
    protected $stripe_user;
    public $client_secret;
    public $payment_intent;

    // prices
    public $rate_per_night;
    public $number_of_nights;
    public $base_cost;
    public $cleaning_fee;
    public $tax;
    public $total_cost;

    public function render()
    {
        return view('components.frontend.checkout');
    }

    public function mount($code)
    {
        $this->checkoutCode = $code;
        $this->user = auth()->user();

        $this->email = $this->user->email;
        $this->first_name = $this->user->first_name;
        $this->last_name = $this->user->last_name;
        $this->birthdate = $this->user->birthdate;
        $this->phone = $this->user->phone;
        $this->address = $this->user->address;
        $this->unit = $this->user->unit;
        $this->city = $this->user->city;
        $this->state = $this->user->state;
        $this->zip = $this->user->zip;
    }

    public function load()
    {
        $this->trip = Trip::where('code', $this->checkoutCode)->first();
        $this->property = $this->trip->property;

        $this->calulatePrices();

        // create or find stripe customer
        // create and save payment method
    }

    public function calulatePrices()
    {
        $this->rate_per_night = $this->trip->rate_per_night;
        $this->number_of_nights = $this->trip->number_of_nights;
        $this->base_cost = $this->rate_per_night * $this->number_of_nights;
        $this->cleaning_fee = (isset($this->property->cleaning_fee) ? $this->property->cleaning_fee : config('settings.cleaning_fee'));
        $this->service_fee = (config('settings.service_fee') / 100) * $this->base_cost;
        $this->total_cost = ($this->base_cost + $this->cleaning_fee + $this->service_fee);
    }

    public function saveUserBillingInfo()
    {
        $validator = Validator::make(
            [
                'email' => $this->email,
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'birthdate' => $this->birthdate,
                'phone' => $this->phone,
                'address' => $this->address,
                'city' => $this->city,
                'state' => $this->state,
                'zip' => $this->zip,
            ],
            [
                'email' => 'required|email|max:250',
                'first_name' => 'required|max:250|alpha',
                'last_name' => 'required|max:250|alpha',
                'birthdate' => 'required|date',
                'phone' => 'required|min:12|max:14',
                'address' => 'required|max:250',
                'unit' => 'nullable|max:250',
                'city' => 'required|max:250',
                'state' => 'required|max:2',
                'zip' => 'required|numeric|regex:/^\d{5}(?:-\d{4})?$/',
            ],
        );

        if ($validator->fails()) {
            toast()->danger($validator->errors()->first())->push();
        }

        $validator->validate();

        ///

        // update user profile
        if (!$this->updateUserInfo()) {
            toast()->danger('Failed to update user profile')->push();
            return;
        } else {
            $this->user = auth()->user();
        }

        // // create or update stripe user
        // if (!$this->createOrUpdateStripeUser()) {
        //     toast()->danger('Our payment processor failed to return the correct data');
        //     return;
        // }

        // set up intent
        // $this->intent = $this->user->
        // dd($this->user->createSetupIntent());

        // let's now create a PaymentIntent
        // $this->user->createPayment
        // $this->paymentIntent = $this->createPaymentIntent();








        // show credit card field
        $this->showCreditCardField = true;




        toast()->debug('all good')->push();
    }

    public function updateUserInfo()
    {
        $user = User::find($this->user->id);
        $user->email = $this->email;
        $user->first_name = ucwords($this->first_name);
        $user->last_name = ucwords($this->last_name);
        $user->phone = $this->phone;
        $user->birthdate = $this->birthdate;
        $user->address = ucwords($this->address);
        $user->unit = strtoupper($this->unit);
        $user->city = ucwords($this->city);
        $user->state = $this->state;
        $user->zip = $this->zip;
        return ($user->save()) ? true : false;
    }

    public function returnStripeUser()
    {
        $stripe_user_data = [
            'address' => [
                'city' => $this->user->city,
                'country' => 'us',
                'line1' => $this->user->address,
                'line2' => $this->user->unit,
                'postal_code' => $this->user->zip,
                'state' => $this->user->state,
            ],
            'email' => $this->user->email,
            'metadata' => [
                'ip_address_1' => $_SERVER['REMOTE_ADDR'] ?? 'no ip',
                'ip_address_2' => $_SERVER['HTTP_X_FORWARDED_FOR'] ?? 'no ip',
            ],
            'name' => $this->user->fullName(),
            'phone' => $this->user->phone,
        ];

        // is the user a stripe customer?
        if($this->user->hasStripeId()){
            // user is a stripe customer, update their information
            $this->stripe_user = $this->user->updateStripeCustomer($stripe_user_data);
        }else{
            // user is NOT a stripe customer
            $this->stripe_user = $this->user->createAsStripeCustomer($stripe_user_data);
        }

        return $this->stripe_user;
    }

    //////////////////////////////////////////////

    // public function createOrGetStripeCustomer()
    // {
    //     if ($this->user->hasStripeId()) {
    //         $this->stripeCustomer = $this->user->asStripeCustomer();
    //     } else {
    //         $this->stripeCustomer = $this->user->createAsStripeCustomer([
    //             //
    //         ]);
    //     }

    //     $user = User::find($this->user->id);
    //     $user->email = $this->email;
    //     $user->first_name = $this->first_name;
    //     $user->last_name = $this->last_name;
    //     $user->birthdate = $this->birthdate;
    //     $user->address = $this->address;
    //     $user->city = $this->city;
    //     $user->state = $this->state;
    //     $user->zip = $this->zip;
    //     $user->save();




    //     $this->stripeCustomer = auth()->user->createOrGetStripeCustomer();
    // }

    // public function getClientSecret()
    // {
    //     $this->client_secret = $this->user->createSetupIntent()->client_secret;
    //     return $this->client_secret;
    // }

    // public function processPayment($paymentMethod)
    // {

    //     dd($paymentMethod);
    //     if($this->user->hasStripeId()){
    //         toast()->debug('yes')->push();
    //     }else{
    //         toast()->debug('no')->push();
    //         $stripeCustomer = $this->user->createOrGetStripeCustomer([
    //             'name' => $this->user->fullName(),
    //         ]);
    //     }

    //     return;

    //     $stripeCustomer = $this->user->createOrGetStripeCustomer([
    //         '' => ''
    //     ]);
    //     dd($stripeCustomer);

    //     $this->user->addPaymentMethod($paymentMethod);

    //     dd($this->user->paymentMethods());
    // }

    // public function processPayment($paymentMethodId = 'pm_card_visa')
    // {
    //     try {
    //         // save customer to Stripe

    //         $payment = auth()->user()->charge(rand(100, 9900), $paymentMethodId);
    //         toast()->success('Success!')->push();
    //     } catch (IncompletePayment $exception) {
    //             return redirect()->route(
    //                 'cashier.payment',
    //                 [$exception->payment->id, 'redirect' => 'test']
    //             );

    //         // Get the payment intent status...
    //         // $exception->payment->status;


    //         // // Check specific conditions...
    //         // if ($exception->payment->requiresPaymentMethod()) {
    //         //     toast()->debug('true')->push();
    //         //     // ...
    //         // } elseif ($exception->payment->requiresConfirmation()) {
    //         //     toast()->debug('false')->push();
    //         //     // ...
    //         // }
    //     }
    // }
}
