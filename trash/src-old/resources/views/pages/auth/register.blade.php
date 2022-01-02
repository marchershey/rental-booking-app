@extends('layouts.app')

@section('content')

<div class="p-5 bg-gray-100 screen-center">

    <div class="flex flex-col w-full max-w-lg -mt-20 space-y-5">
        <div class="text-center">
            <h1 class="text-xl font-semibold text-gray-600">Create your new account</h1>
        </div>

        <div class="card">
            <form class="" action="#" method="POST">
                @csrf
                <div class="form-block">
                    <div class="space-y-4 input-block">
                        <div>
                            <label for="name" class="label">
                                Your name
                            </label>
                            <div class="mt-1">
                                <input id="name" name="name" type="name" autocomplete="name" placeholder="Your Name" required class="capitalize text-input" value="{{ old('name') }}">
                            </div>
                        </div>

                        <div>
                            <label for="email" class="label">
                                Email address
                            </label>
                            <div class="mt-1">
                                <input id="email" name="email" type="email" autocomplete="email" placeholder="Email Address" required class="text-input" value="{{ old('email') }}">
                            </div>
                        </div>

                        <div>
                            <label for="password" class="label">
                                Password
                            </label>
                            <div class="mt-1 space-y-2">
                                <input id="password" name="password" type="password" autocomplete="current-password" placeholder="Password" required class="text-input">
                                <input id="password_confirmation" name="password_confirmation" type="password" autocomplete="" placeholder="Retype Password" required class="text-input">
                            </div>
                        </div>
                    </div>

                    @if($errors->all())
                    <div class="alert alert-danger">{!!$errors->first()!!}</div>
                    @endif

                    <div class="button-block">
                        <button type="submit" class="button button-primary">
                            Create account
                        </button>
                        <a href="{{ route('login') }}" class="button button-light">
                            I already have an account
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

@endsection