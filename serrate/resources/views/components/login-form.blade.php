<div>
    @if ($errors->any())
        <div class="bg-red-500 text-white p-3 rounded-lg text-center">
            <span>{{ $errors->first() }}</span>
        </div>
    @endif
    <form wire:submit.prevent="{{ $submitType }}" method="POST" action="#" class="space-y-5">
        @csrf
        <div class="bg-white rounded-lg -space-y-px">
            <div class="flex -space-x-px">
                <div class="w-1/2 flex-1 min-w-0">
                    <label for="first_name" class="sr-only">First Name</label>
                    <input wire:model="first_name" type="text" name="first_name" id="first_name" class="relative block w-full rounded-none rounded-tl-lg bg-white text-xl border-gray-300 focus:ring-blue-600 focus:border-blue-600 focus:z-10 text-blue-900 capitalize @error('first_name') border-red-500 z-10 @enderror" placeholder="First Name" value="{{ old('first_name') }}" required>
                </div>
                <div class="flex-1 min-w-0">
                    <label for="last_name" class="sr-only">Last Name</label>
                    <input wire:model="last_name" type="text" name="last_name" id="last_name" class="relative block w-full rounded-none rounded-tr-lg bg-white text-xl border-gray-300 focus:ring-blue-600 focus:border-blue-600 focus:z-10 text-blue-900 capitalize @error('last_name') border-red-500 z-10 @enderror" placeholder="Last Name" value="{{ old('last_name') }}" required>
                </div>
            </div>
            <div>
                <label for="email" class="sr-only">Email Address</label>
                <input wire:model="email" type="email" name="email" id="email" class="relative block w-full rounded-none rounded-b-lg bg-white text-xl border-gray-300 focus:ring-blue-600 focus:border-blue-600 focus:z-10 lowercase placeholder:capitalize text-blue-900 @error('email') border-red-500 z-10 @enderror" placeholder="Email Address" value="{{ old('email') }}" required>
            </div>
        </div>
        <div x-data="{show: @entangle('askPassword')}" x-show="show" x-cloak>
            <div class="mb-2 text-center">Enter your password to continue.</div>
            <input wire:model="password" type="password" name="password" id="password" class="relative block w-full rounded-lg bg-white text-xl border-gray-300 focus:ring-blue-600 focus:border-blue-600 focus:z-10  text-blue-900 @error('password') border-red-500 z-10 @enderror" placeholder="Password">
        </div>
        <div class="flex flex-col -space-y-px" x-data="{show: @entangle('createPassword')}" x-show="show" x-cloak>
            <div class="mb-2 text-center">Create a password to continue.</div>
            <input wire:model="password" type="password" name="password" id="password" class="relative block w-full rounded-t-lg bg-white text-xl border-gray-300 focus:ring-blue-600 focus:border-blue-600 focus:z-10 text-blue-900 @error('password') border-red-500 z-10 @enderror" placeholder="Password">
            <input wire:model="password_confirmation" type="password" name="password_confirmation" id="password_confirmation" class="relative block w-full rounded-b-lg bg-white text-xl border-gray-300 focus:ring-blue-600 focus:border-blue-600 focus:z-10 text-blue-900 @error('password') border-red-500 z-10 @enderror" placeholder="Password again">
        </div>
        <div class="text-center">
            <button type="submit" class="w-full bg-blue-600 text-white text-xl font-semibold py-3 px-3 sm:px-6 rounded-lg">Continue</a>
        </div>
        <div class="text-center">
            <a href="/" class="block bg-gray-200 text-xl font-semibold py-3 px-3 sm:px-6 rounded-lg w-full sm:w-auto">Go Back</a>
        </div>
    </form>
</div>
