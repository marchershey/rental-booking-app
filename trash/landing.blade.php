@extends('layouts.app')

@section('content')

<div class="fixed inset-0 overflow-hidden">
    <div class="w-full h-full pb-20 overflow-x-hidden overflow-y-auto">
        {{-- Top image container --}}
        <div class="z-10">
            <div class="bg-black shadow-lg swiper-container mySwiper">
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
        </div>

        {{-- Content container --}}
        <div class="z-20 -mt-5">
            <div class="p-5 space-y-5 bg-white rounded-t-3xl">

                {{-- Meta data --}}
                <div class="flex justify-between w-full">
                    <div>
                        <h1 class="text-2xl font-bold">Ohana Burnside</h1>
                        <div>
                            <span class="text-sm font-semibold text-gray-300">Cumberland, KY</span>
                            <div class="flex items-center space-x-2 text-yellow-500">
                                <div class="flex">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                                <span class="font-bold text-md">5.0</span>
                            </div>
                        </div>
                    </div>
                    <div class="text-right">
                        <h2 class="text-2xl font-bold text-primary">$129</h2>
                        <span class="text-sm font-semibold text-gray-300">per night</span>
                    </div>
                </div>

                <div class="-mx-5 overflow-hidden text-xs font-semibold">
                    <div class="flex items-center w-full px-5 space-x-2 overflow-x-auto overflow-y-hidden no-scrollbar whitespace-nowrap">
                        <div class="px-2 py-1 bg-gray-200 rounded-full">Wifi</div>
                        <div class="px-2 py-1 bg-gray-200 rounded-full">Swimming Pool</div>
                        <div class="px-2 py-1 bg-gray-200 rounded-full">Lake Access</div>
                        <div class="px-2 py-1 bg-gray-200 rounded-full">...</div>
                        <div class="px-2 py-1 bg-gray-200 rounded-full">...</div>
                        <div class="px-2 py-1 bg-gray-200 rounded-full">...</div>
                        <div class="px-2 py-1 bg-gray-200 rounded-full">...</div>
                        <div class="px-2 py-1 bg-gray-200 rounded-full">...</div>
                        <div class="px-2 py-1 bg-gray-200 rounded-full">...</div>
                        <div class="px-2 py-1 bg-gray-200 rounded-full">...</div>
                        <div class="px-2 py-1 bg-gray-200 rounded-full">...</div>
                    </div>
                </div>

                <hr class="border-gray-200">

                <div class="space-y-2">
                    <h2 class="block font-semibold">Description</h2>
                    <span class="block text-sm text-gray-400">This is the description of the rental property. You can replace this text with whatever you would like.</span>
                </div>
                <div class="space-y-2">
                    <h2 class="block font-semibold">Photos</h2>
                    <span class="block text-sm text-gray-400">This is the description of the rental property. You can replace this text with whatever you would like.</span>
                </div>

            </div>
        </div>
    </div>

    {{-- Book now button --}}
    <div class="fixed bottom-0 w-full">
        <div class="p-5 bg-transparent">
            <a href="/book" class="block w-full py-2 text-lg font-bold text-center text-white bg-primary rounded-xl">Book Now</a>
        </div>
    </div>

</div>


<div class="fixed inset-0 hidden bg-cover" style="background-image: url(/images/falls.jpg)">
    <div class="flex items-center justify-center w-full h-full bg-black bg-opacity-75">

        <div class="w-full max-w-md m-5 space-y-5">
            <div class="text-center text-white">
                <h1 class="text-4xl font-bold text-white">{{config('app.name')}}</h1>
            </div>

            <div class="p-2 bg-white rounded-lg shadow-xl ring-1 ring-gray-800">
                Welcome to OhanaBurnside
            </div>
        </div>

    </div>
</div>

@endsection