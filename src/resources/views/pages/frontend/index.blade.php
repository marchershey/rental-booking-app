<x-layouts.frontend>

    <div>
        <section class="full-screen relative bg-center bg-cover" style="background-image: url(https://images.unsplash.com/photo-1551524164-687a55dd1126?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1325&q=80)">
            <div class="absolute inset-0 bg-black bg-opacity-75">
                <div class="flex flex-col items-center justify-center h-full space-y-10">

                    <h1 class="tracking-tight text-center text-white">
                        <span class="text-primary-lighter drop-shadow-xl block text-3xl font-extrabold">Welcome to</span>
                        <span class="block text-5xl font-bold">Serrate Rentals</span>
                    </h1>
                    <div class="flex space-x-5">
                        <a href="{{ route('frontend.properties') }}" class="bg-primary px-6 py-2 font-bold text-white rounded">View Properties</a>
                        <button class="px-6 py-2 font-bold text-white bg-transparent rounded">Get in touch</button>
                    </div>
                </div>
            </div>
            <div class="text-muted absolute bottom-0 w-full">
                <div class="flex justify-center -mt-10">
                    <svg class="animate-bounce w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </div>
            </div>
        </section>

        <!-- This example requires Tailwind CSS v2.0+ -->
        <section class="overflow-hidden bg-white">
            <div class="sm:px-6 lg:px-8 lg:py-20 sm:max-w-3xl lg:max-w-screen-lg relative max-w-md px-4 pt-20 pb-12 mx-auto">
                <svg class="top-full translate-x-80 lg:hidden absolute left-0 transform -translate-y-24" width="784" height="404" fill="none" viewBox="0 0 784 404" aria-hidden="true">
                    <defs>
                        <pattern id="e56e3f81-d9c1-4b83-a3ba-0d0ac8c32f32" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="784" height="404" fill="url(#e56e3f81-d9c1-4b83-a3ba-0d0ac8c32f32)" />
                </svg>

                <svg class="lg:block right-full top-1/2 absolute hidden transform translate-x-1/2 -translate-y-1/2" width="404" height="784" fill="none" viewBox="0 0 404 784" aria-hidden="true">
                    <defs>
                        <pattern id="56409614-3d62-4985-9a10-7ca758a8f4f0" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="784" fill="url(#56409614-3d62-4985-9a10-7ca758a8f4f0)" />
                </svg>

                <div class="lg:flex lg:items-center relative">
                    <div class="lg:block lg:flex-shrink-0 hidden">
                        <img class="xl:h-80 xl:w-80 w-64 h-64 rounded-full" src="https://i.imgur.com/eg6630g.jpg" alt="">
                    </div>

                    <div class="relative p-5">
                        <svg class="h-36 w-36 absolute top-0 left-0 text-indigo-200 transform -translate-x-8 -translate-y-24 opacity-50" stroke="currentColor" fill="none" viewBox="0 0 144 144" aria-hidden="true">
                            <path stroke-width="2" d="M41.485 15C17.753 31.753 1 59.208 1 89.455c0 24.664 14.891 39.09 32.109 39.09 16.287 0 28.386-13.03 28.386-28.387 0-15.356-10.703-26.524-24.663-26.524-2.792 0-6.515.465-7.446.93 2.327-15.821 17.218-34.435 32.11-43.742L41.485 15zm80.04 0c-23.268 16.753-40.02 44.208-40.02 74.455 0 24.664 14.891 39.09 32.109 39.09 15.822 0 28.386-13.03 28.386-28.387 0-15.356-11.168-26.524-25.129-26.524-2.792 0-6.049.465-6.98.93 2.327-15.821 16.753-34.435 31.644-43.742L121.525 15z" />
                        </svg>
                        <blockquote class="relative">
                            <div>
                                <h1 class="text-primary text-3xl font-bold">Meet your hosts</h1>
                            </div>
                            <div class="text-muted mt-2 text-lg font-medium leading-6">
                                <p>
                                    "We're such great hosts, we'll PAY YOU to stay at one of our properties. Now that's great hosting! Yeehaw"
                                </p>
                            </div>
                            <footer class="mt-8">
                                <div class="flex items-center">
                                    <div class="lg:hidden flex-shrink-0">
                                        <img class="w-20 h-20 rounded-full" src="https://i.imgur.com/eg6630g.jpg" alt="">
                                    </div>
                                    <div class="lg:ml-0 ml-4">
                                        <div class="text-lg font-semibold text-gray-600">Rob & Erin Serrate</div>
                                        <div class="text-muted text-base font-medium">Lexington, KY</div>
                                    </div>
                                </div>
                            </footer>
                        </blockquote>
                    </div>
                </div>
            </div>
        </section>


        <section class="relative bg-white">
            <div class="h-1/2 lg:block absolute inset-x-0 top-0 hidden" aria-hidden="true"></div>
            <div class="lg:bg-transparent lg:px-8 bg-primary-darker max-w-screen-lg mx-auto">
                <div class="lg:grid lg:grid-cols-12">
                    <div class="lg:col-start-1 lg:row-start-1 lg:col-span-4 lg:py-16 lg:bg-transparent relative z-10">
                        <div class="h-1/2 bg-gray-50 lg:hidden absolute inset-x-0" aria-hidden="true"></div>
                        <div class="sm:max-w-3xl sm:px-6 lg:max-w-none lg:p-0 max-w-md px-4 mx-auto">
                            <div class="aspect-w-10 aspect-h-6 sm:aspect-w-2 sm:aspect-h-1 lg:aspect-w-1">
                                <img class="rounded-3xl object-cover object-center shadow-2xl" src="https://i.imgur.com/hYpPpYW.png" alt="">
                            </div>
                        </div>
                    </div>

                    <div class="lg:col-start-3 lg:row-start-1 lg:col-span-10 lg:rounded-3xl lg:grid lg:grid-cols-10 lg:items-center bg-primary-darker relative">
                        <div class="rounded-3xl lg:block text-primary-lighter absolute inset-0 hidden overflow-hidden" aria-hidden="true">
                            <svg class="bottom-full left-full translate-y-1/3 -translate-x-2/3 xl:bottom-auto xl:top-0 xl:translate-y-0 absolute transform" width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                                <defs>
                                    <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                        <rect x="0" y="0" width="4" height="4" class="" fill="currentColor" />
                                    </pattern>
                                </defs>
                                <rect width="404" height="384" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)" />
                            </svg>
                            <svg class="top-full -translate-y-1/3 -translate-x-1/3 xl:-translate-y-1/2 absolute transform" width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                                <defs>
                                    <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                                        <rect x="0" y="0" width="4" height="4" class="" fill="currentColor" />
                                    </pattern>
                                </defs>
                                <rect width="404" height="384" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)" />
                            </svg>
                        </div>
                        <div class="sm:max-w-3xl sm:py-16 sm:px-6 lg:max-w-none lg:p-0 lg:col-start-4 lg:col-span-6 relative max-w-md px-4 py-12 mx-auto space-y-6">
                            <h2 class="text-3xl font-extrabold text-white" id="join-heading">View our properties</h2>
                            <p class="text-lg text-white">If you're ready to have the most amazing vacation of a lifetime, check out all of the vacation spots we have to offer!</p>
                            <a class="hover:bg-gray-50 sm:inline-block sm:w-auto text-primary-darker block w-full px-5 py-3 text-base font-medium text-center bg-white border border-transparent rounded-md shadow-md" href="#">View Properties</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        // First we get the viewport height and we multiple it by 1% to get a value for a vh unit
        let vh = window.innerHeight * 0.01;
        // Then we set the value in the --vh custom property to the root of the document
        document.documentElement.style.setProperty('--vh', `${vh}px`);
    </script>

</x-layouts.frontend>
