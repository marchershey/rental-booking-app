@extends('layouts.app')

@section('content')

{{-- Book button --}}
@livewire('landing.reservation-button')



{{-- mb-20 for book button --}}
<div class="w-full mx-auto mb-20 bg-white shadow-xl">

    {{-- Slider --}}
    <div class="bg-black shadow-xl rounded-b-xl swiper-container mySwiper">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="https://a0.muscache.com/im/pictures/cbe28ee2-2c5f-46ae-81d4-0784cbe10c4f.jpg?im_w=480" alt="">
            </div>
            <div class="swiper-slide">
                <img src="https://a0.muscache.com/im/pictures/4c3ffa7a-94d3-474e-ba2a-950fb569f651.jpg?im_w=480" alt="">
            </div>
            <div class="swiper-slide">
                <img src="https://a0.muscache.com/im/pictures/564c376a-8fe7-4d4a-957a-aaa60d36e4f2.jpg?im_w=480" alt="">
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>

    {{-- house data --}}
    <div class="p-5">
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold">Ohana Burnside</h1>

                <div class="flex items-center space-x-4 text-xs">
                    <div class="flex space-x-1 text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <span class="text-sm font-bold">4.89</span>
                    </div>
                    <div class="flex items-center space-x-1 text-muted">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        <span>Burnside, Kentucky</span>
                    </div>
                </div>
            </div>
            <div class="flex flex-col text-right">
                <h1 class="text-2xl font-bold text-primary">$323</h1>
                <span class="text-xs text-muted">per night</span>
            </div>
        </div>
    </div>

    {{-- section break / hr --}}
    <div class="relative mx-5">
        <div class="absolute inset-0 flex items-center" aria-hidden="true">
            <div class="w-full border-t border-gray-200"></div>
        </div>
    </div>

    {{-- About section --}}
    <div class="p-5 space-y-2">
        <h3 class="font-semibold">About</h3>
        <p class="text-sm text-muted">One of the best views on the lake nestled in the Daniel Boone National Forest. Spacious 3 BR home w/bonus basement sleeping area w/Queen memory foam mattress. Large hot tub under covered screen porch & located in a private gated resort community w/multiple pools, tennis courts, walking/ATV trails- all within 1 mile of boat ramp. New furniture & TVs in every bedroom, basement game room with bar/poker table, jacuzzi tub in master. Terrific lake views from every room! Excellent WiFi for working.</p>
    </div>

    <div class="p-5 space-y-2">
        <h3 class="font-semibold">Things to know</h3>
        <p class="text-sm text-muted">Blah blah blah...</p>
    </div>
    <div class="p-5 space-y-2">
        <h3 class="font-semibold">Things to know</h3>
        <p class="text-sm text-muted">Blah blah blah...</p>
    </div>
    <div class="p-5 space-y-2">
        <h3 class="font-semibold">Things to know</h3>
        <p class="text-sm text-muted">Blah blah blah...</p>
    </div>
    <div class="p-5 space-y-2">
        <h3 class="font-semibold">Things to know</h3>
        <p class="text-sm text-muted">Blah blah blah...</p>
    </div>
    <div class="p-5 space-y-2">
        <h3 class="font-semibold">Things to know</h3>
        <p class="text-sm text-muted">Blah blah blah...</p>
    </div>
    <div class="p-5 space-y-2">
        <h3 class="font-semibold">Things to know</h3>
        <p class="text-sm text-muted">Blah blah blah...</p>
    </div>
</div>
@endsection