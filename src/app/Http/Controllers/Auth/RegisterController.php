<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

class RegisterController extends Controller
{
    public function view()
    {
        return view('pages.auth.register');
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'string', 'max:100', 'unique:users,email'],
            'password' => ['required', 'confirmed', 'min:6', 'max:100', 'alpha_dash'],
        ], [
            'email.unique' => 'Looks like you already have an account. <a href="/login" class="font-semibold">Sign in</a> or <a href="/recover" class="font-semibold">recover your account</a>.'
        ]);

        try {
            DB::table('users')->insert([
                'name' => $credentials['name'],
                'email' => $credentials['email'],
                'password' => Hash::make($credentials['password'])
            ]);
        } catch (Throwable $e) {
            return redirect()->back()->withInput(
                $request->except('password')
            )->withErrors(
                ['server' => 'Something went wrong. Try again']
            );
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('dashboard');
        }
    }
}
