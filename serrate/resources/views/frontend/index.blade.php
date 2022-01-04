<x-app-layout>
    <main class="space-y-20 pb-10 lg:pt-10">
        <div class="z-50 p-5 sm:p-10 bg-white drop-shadow-xl lg:rounded-xl border border-gray-300">

            <div class="max-w-4xl mx-auto grid grid-cols-1 lg:max-w-5xl lg:gap-x-20 lg:grid-cols-2">
                <div class="relative p-3 col-start-1 row-start-1 flex flex-col-reverse rounded-lg bg-gradient-to-t from-black/100 via-black/0 sm:bg-none sm:row-start-2 sm:p-0 lg:row-start-1">
                    <div>
                        <span class="text-sm font-semibold text-white sm:text-blue-600 bg-blue-600 sm:bg-white px-2 py-px sm:p-0 rounded-md uppercase tracking-wide">Entire House</span>
                        <h1 class="sm:mt-2 text-3xl font-extrabold text-white sm:text-gray-900">Ohana Burnside</h1>
                    </div>
                </div>
                <div class="grid gap-4 col-start-1 col-end-3 row-start-1 sm:mb-6 sm:grid-cols-4 lg:gap-6 lg:col-start-2 lg:row-end-6 lg:row-span-6 lg:mb-0  content-start">
                    <img src="https://i.imgur.com/4JNCfzW.jpg" alt="" class="w-full h-60 object-cover rounded-lg sm:h-52 sm:col-span-2 lg:col-span-full" loading="lazy">
                    <img src="https://i.imgur.com/Iay5DrX.png" alt="" class="hidden w-full h-52 object-cover rounded-lg sm:block sm:col-span-2 md:col-span-1 lg:row-start-2 lg:col-span-2 lg:h-32" loading="lazy">
                    <img src="https://i.imgur.com/OIeM0TX.png" alt="" class="hidden w-full h-52 object-cover rounded-lg md:block lg:row-start-2 lg:col-span-2 lg:h-32" loading="lazy">
                </div>
                <div class="mt-4 flex justify-between sm:justify-start sm:space-x-4 items-center row-start-2 sm:mt-1 sm:row-start-3 md:mt-2.5 lg:row-start-2">
                    <div class="flex items-center space-x-1 text-yellow-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 20 20" fill="currentColor">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                        </svg>
                        <div>
                            <span class="font-semibold">4.92</span>
                            <span class="text-sm text-gray-300">(28)</span>
                        </div>
                    </div>
                    <div class="flex items-center space-x-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-600" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
                        </svg>
                        <div>
                            <span class="text-base text-gray-500">Burnside, KY</span>
                        </div>
                    </div>
                </div>
                <div class="mt-4 col-start-1 row-start-3 self-center sm:mt-0 sm:col-start-2 sm:row-start-2 sm:row-span-2 lg:mt-6 lg:col-start-1 lg:row-start-3 lg:row-end-4">
                    @auth
                        <div class="block text-center text-xs mb-2">Welcome back, <span class="capitalize">{{ Auth::user()->first_name }}</span>! You're still logged in.</div>
                    @endauth
                    <a href="/reserve" class="block bg-blue-600 text-white text-xl font-semibold py-3 px-3 sm:px-6 rounded-lg w-full sm:w-auto text-center">Reserve Now</a>
                </div>
                <div class="z-50 col-start-1 sm:col-span-2 lg:mt-6 lg:row-start-4 lg:col-span-1">
                    <div class="mt-4 text-base text-gray-500" x-data="{open: false}">
                        <p x-on:click="open = !open" :class="open ? 'line-clamp-none' : 'line-clamp-6'">Beautiful lake view nestled in the heart of the Daniel Boone National Forest by Lake Cumberland! Spacious 3 bedroom home with bonus basement sleeping area has large hot tub under screened in, covered porch and is located in a private gated resort community with multiple pools, tennis courts, walking/ATV trails- all within 1 mile of a boat ramp. New furniture with new TVs in every bedroom, basement game room with bar and poker table, jacuzzi in master bedroom. Nearby attractions include a state park with golf, Burnside Marina, Cumberland Falls, South Fork Scenic Railway and just a short trip to Somerset for a drive-in movie or water park. The gated resort includes multiple swimming pools (1 in the property's gate) along with tennis courts.</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
            <div class="px-10 text-center lg:text-left">
                <div>
                    <h2 class="text-base font-semibold text-blue-600 uppercase tracking-wide">Come say hi</h2>
                    <h1 class="mt-2 text-3xl font-extrabold text-gray-900">Meet the hosts</h1>
                </div>
            </div>
            <div class="p-5 bg-white drop-shadow-xl lg:rounded-xl border border-gray-300">
                <div class="flex space-x-3 justify-between">

                    <div class="flex-shrink-0">
                        <img class="h-24 w-24 rounded-full" src="https://i.imgur.com/1OCi0Sg.jpg" alt="">
                    </div>
                    <div class="flex-1 min-w-0 space-x-2 w-2/3">
                        <div class="flex flex-col justify-between">
                            <p class="text-2xl font-bold text-gray-900">
                                Rob & Erin Serrate
                            </p>
                            <p class="text-base text-gray-500 italic">
                                "We promise to make your experience here at Burnside as enjoyable as possible."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <div class="text-center">
                <h2 class="text-base font-semibold text-blue-600 uppercase tracking-wide">See for yourself</h2>
                <h1 class="mt-2 text-3xl font-extrabold text-gray-900">View the photos</h1>
            </div>

            <div class="mt-5 p-5 sm:p-10 bg-white drop-shadow-xl lg:rounded-xl border border-gray-300">
                <div class="swiper ">
                    <!-- Additional required wrapper -->
                    <div class="swiper-wrapper">
                        <!-- Slides -->
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/hYpPpYW.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/Iay5DrX.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/OIeM0TX.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/sDLOKrz.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/AWw5xlE.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/7ne3YyM.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/QnG7PQy.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/BV30yV2.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/WqPxHI3.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/SM5iV67.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/aPG3Acb.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/CMz9hiA.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/YZB3yL6.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/gsbqShZ.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/8j3Tc1c.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/AY9qulK.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/GIUFdtB.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/P1FFK6O.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/T2ZJAGl.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/oPkyt2V.png" alt="">
                        </div>
                        <div class="swiper-slide">
                            <img class="rounded-lg" src="https://i.imgur.com/9MmNcnw.png" alt="">
                        </div>
                    </div>
                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                    <!-- If we need navigation buttons -->
                    <div class="swiper-button-prev !text-white"></div>
                    <div class="swiper-button-next !text-white"></div>

                    <!-- If we need scrollbar -->
                    <div class="swiper-scrollbar"></div>
                </div>

                <script>
                    window.addEventListener('load', function() {
                        const swiper = new Swiper('.swiper', {
                            autoHeight: true,
                            slidesPerView: 1,
                            spaceBetween: 10,
                            navigation: {
                                nextEl: ".swiper-button-next",
                                prevEl: ".swiper-button-prev",
                            },
                            pagination: {
                                el: ".swiper-pagination",
                                clickable: false,
                                dynamicBullets: true,
                            },
                            breakpoints: {
                                "@0.00": {
                                    slidesPerView: 1,
                                    spaceBetween: 10,
                                },
                                "@0.75": {
                                    slidesPerView: 2,
                                    spaceBetween: 20,
                                },
                                "@1.00": {
                                    slidesPerView: 3,
                                    spaceBetween: 40,
                                },
                                "@1.50": {
                                    slidesPerView: 4,
                                    spaceBetween: 50,
                                },
                            },
                        });
                    })
                </script>
            </div>

        </div>

        <div class="p-5 sm:p-10 bg-white drop-shadow-xl lg:rounded-xl border border-gray-300">
            <div class="lg:grid lg:grid-cols-3 lg:gap-x-8">
                <div class="text-center lg:text-left">
                    <h2 class="text-base font-semibold text-blue-600 uppercase tracking-wide">Everything you need</h2>
                    <h1 class="mt-2 text-3xl font-extrabold text-gray-900">About Ohana</h1>
                    <p class="mt-4 text-lg text-gray-500">Take a second to look through all the features we have to offer!</p>
                </div>
                <div class="mt-12 lg:mt-0 lg:col-span-2">
                    <dl class="space-y-10 sm:space-y-0 sm:grid sm:grid-cols-2 sm:grid-rows-4 sm:grid-flow-col sm:gap-x-6 sm:gap-y-10 lg:gap-x-8">
                        <div class="relative">
                            <dt>
                                <!-- Heroicon name: outline/check -->
                                <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <p class="ml-9 text-lg leading-6 font-medium text-gray-900">Spacious... really spacious.</p>
                            </dt>
                            <dd class="mt-2 ml-9 text-base text-gray-500">
                                This house is approx. 3400 sq. ft, so there's plenty of space for you and your family.
                            </dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <!-- Heroicon name: outline/check -->
                                <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <p class="ml-9 text-lg leading-6 font-medium text-gray-900">Plenty of bathrooms.</p>
                            </dt>
                            <dd class="mt-2 ml-9 text-base text-gray-500">
                                There are 4 bathrooms in total. 3 full baths and a half bath as well in the welcome area.
                            </dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <!-- Heroicon name: outline/check -->
                                <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <p class="ml-9 text-lg leading-6 font-medium text-gray-900">Enjoy your meal with family</p>
                            </dt>
                            <dd class="mt-2 ml-9 text-base text-gray-500">
                                After you cook your meal in the kitchen, sit down with friends and family in the dinning room.
                            </dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <!-- Heroicon name: outline/check -->
                                <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <p class="ml-9 text-lg leading-6 font-medium text-gray-900">Relax in the hot tub</p>
                            </dt>
                            <dd class="mt-2 ml-9 text-base text-gray-500">
                                Relax your body in the warm hotub while your muscles are massaged back into shape.
                            </dd>
                        </div>

                        {{-- ============ --}}

                        <div class="relative">
                            <dt>
                                <!-- Heroicon name: outline/check -->
                                <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <p class="ml-9 text-lg leading-6 font-medium text-gray-900">Sleeps 14 people.</p>
                            </dt>
                            <dd class="mt-2 ml-9 text-base text-gray-500">
                                With 3 bedrooms, 6 beds and extra pull out couches, this house sleeps 14 people.
                            </dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <!-- Heroicon name: outline/check -->
                                <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <p class="ml-9 text-lg leading-6 font-medium text-gray-900">Full course meals</p>
                            </dt>
                            <dd class="mt-2 ml-9 text-base text-gray-500">
                                With all of the amazing applicances, theres no need to worry about how to cook.
                            </dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <!-- Heroicon name: outline/check -->
                                <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <p class="ml-9 text-lg leading-6 font-medium text-gray-900">Settle down peacefully</p>
                            </dt>
                            <dd class="mt-2 ml-9 text-base text-gray-500">
                                After a relaxing day, top it off by enjoying the sunset outside on the balcony.
                            </dd>
                        </div>

                        <div class="relative">
                            <dt>
                                <!-- Heroicon name: outline/check -->
                                <svg class="absolute h-6 w-6 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <p class="ml-9 text-lg leading-6 font-medium text-gray-900">...or just enjoy some 'smores</p>
                            </dt>
                            <dd class="mt-2 ml-9 text-base text-gray-500">
                                Get cozy with your other by the warm fire as the day comes to an end.
                            </dd>
                        </div>
                    </dl>
                </div>
            </div>
            <div class="mt-10 text-center text-blue-600">
                <button>View all details</button>
            </div>
        </div>



    </main>

</x-app-layout>
