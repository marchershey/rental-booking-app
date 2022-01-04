<?php

namespace App\Http\Controllers\Components;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginForm extends Component
{
    public $submitType = "checkUser";
    public $askPassword = false;
    public $createPassword = false;

    public $user;
    public $first_name = "marc";
    public $last_name = "hershey";
    public $email = "marclewishershey@gmail.com";
    public $password;
    public $password_confirmation;

    protected $rules = [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => 'required|email',
        'password' => 'required|min:6|confirmed',
    ];

    public function render()
    {
        return view('components.login-form');
    }

    public function checkUser(){

        $userData = $this->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
        ]);

        // check if user exists information
        if($this->user = User::returnIfExists($userData)){
            // user exists - ask for password
            $this->askPassword = true;
            $this->createPassword = false;
            $this->submitType = 'authUser';
        }else{
            // user doesn't exist - create password
            $this->askPassword = false;
            $this->createPassword = true;
            $this->submitType = "createUser";
        }

        return null;

    }

    public function createUser() {

        $userData = $this->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User;
        $user->first_name = $userData['first_name'];
        $user->last_name = $userData['last_name'];
        $user->email = $userData['email'];
        $user->password = Hash::make($userData['password']);

        $user = $user->save();

        if($user){
            $this->authUser();
        }else{
            $this->addError('system', 'System error. Try again');
        }
    }

    public function authUser() {
        $userData = $this->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        if (Auth::attempt($userData)) {
            return redirect('reserve');
        }else{
            $this->addError('auth', 'Authentication failed. Try again');

        }



    }
}
