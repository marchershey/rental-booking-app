<x-app-layout>

    {{-- Header --}}
    <div class="relative overflow-hidden bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32 relative z-10 pb-8 bg-white">
                <svg class="lg:block text-primary absolute inset-y-0 right-0 hidden w-48 h-full transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none" aria-hidden="true">
                    <polygon points="50,0 100,0 50,100 0,100" />
                </svg>

                <div x-data="{open:false}">
                    {{-- Desktop menu --}}
                    <div class="sm:px-6 lg:px-8 relative px-4 pt-6">
                        <nav class="sm:h-10 lg:justify-start relative flex items-center justify-between" aria-label="Global">
                            <div class="lg:flex-grow-0 flex items-center flex-grow flex-shrink-0">
                                <div class="md:w-auto flex items-center justify-between w-full">
                                    <a href="#">
                                        <span class="sr-only">Workflow</span>
                                        <img class="sm:h-10 w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg">
                                    </a>
                                    <div class="md:hidden flex items-center -mr-2">
                                        <button x-on:click="open = true" type="button" class="hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md" aria-expanded="false">
                                            <span class="sr-only">Open main menu</span>
                                            <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="md:block md:ml-10 md:pr-4 md:space-x-8 hidden">
                                <a href="#" class="hover:text-gray-900 font-medium text-gray-500">Product</a>

                                <a href="#" class="hover:text-gray-900 font-medium text-gray-500">Features</a>

                                <a href="#" class="hover:text-gray-900 font-medium text-gray-500">Marketplace</a>

                                <a href="#" class="hover:text-gray-900 font-medium text-gray-500">Company</a>

                                <a href="#" class="hover:text-primary-dark text-primary font-semibold">Log in</a>
                            </div>
                        </nav>
                    </div>
                    {{-- Mobile Menu --}}
                    <div class="md:hidden absolute inset-x-0 top-0 z-10 p-2 transition origin-top-right transform" x-show="open" x-cloak>
                        <div class="ring-1 ring-black ring-opacity-5 overflow-hidden bg-white rounded-lg shadow-md">
                            <div class="flex items-center justify-between px-5 pt-4">
                                <div>
                                    <img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-600.svg" alt="">
                                </div>
                                <div class="-mr-2">
                                    <button x-on:click="open = false" type="button" class="hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-primary inline-flex items-center justify-center p-2 text-gray-400 bg-white rounded-md">
                                        <span class="sr-only">Close main menu</span>
                                        <!-- Heroicon name: outline/x -->
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="px-2 pt-2 pb-3 space-y-1">
                                <a href="#" class="hover:text-gray-900 hover:bg-gray-50 block px-3 py-2 text-base font-medium text-gray-700 rounded-md">Product</a>

                                <a href="#" class="hover:text-gray-900 hover:bg-gray-50 block px-3 py-2 text-base font-medium text-gray-700 rounded-md">Features</a>

                                <a href="#" class="hover:text-gray-900 hover:bg-gray-50 block px-3 py-2 text-base font-medium text-gray-700 rounded-md">Marketplace</a>

                                <a href="#" class="hover:text-gray-900 hover:bg-gray-50 block px-3 py-2 text-base font-medium text-gray-700 rounded-md">Company</a>
                            </div>
                            <a href="#" class="bg-gray-50 hover:bg-gray-100 text-primary-dark block w-full px-5 py-3 font-medium text-center"> Sign up </a>

                        </div>
                    </div>
                </div>

                <main class="sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28 max-w-5xl px-4 mx-auto mt-10">
                    <div class="sm:text-center lg:text-left">
                        <h1 class="sm:text-5xl md:text-6xl flex flex-col text-4xl font-extrabold tracking-tight text-gray-900">
                            <span class="xl:inline block">Let us host your</span>
                            <span class="xl:inline text-primary-dark block">next vacation</span>
                        </h1>
                        <p class="sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0 mt-3 text-base text-gray-500">Anim aute id magna aliqua ad ad non deserunt sunt. Qui irure qui lorem cupidatat commodo. Elit sunt amet fugiat veniam occaecat fugiat aliqua.</p>
                        <div class="sm:mt-8 sm:flex sm:justify-center lg:justify-start mt-5">
                            <div class="rounded-md shadow">
                                <a href="#" class="hover:bg-indigo-700 md:py-4 md:text-lg md:px-10 bg-primary-dark flex items-center justify-center w-full px-8 py-3 text-base font-medium text-white border border-transparent rounded-md">
                                    Get started
                                </a>
                            </div>
                            <div class="sm:mt-0 sm:ml-3 mt-3">
                                <a href="#" class="hover:bg-indigo-200 md:py-4 md:text-lg md:px-10 flex items-center justify-center w-full px-8 py-3 text-base font-medium text-indigo-700 bg-indigo-100 border border-transparent rounded-md">
                                    Get in touch
                                </a>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="sm:h-72 md:h-96 lg:w-full lg:h-full object-cover w-full h-56" src="https://images.unsplash.com/photo-1568605114967-8130f3a36994?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80" alt="">
        </div>
    </div>

    <div class="bg-primary">
        <div class="sm:pt-16 lg:pt-24 pt-12">
            <div class="sm:px-6 lg:px-8 max-w-5xl px-4 mx-auto text-center">
                <div class="lg:max-w-none max-w-3xl mx-auto space-y-2">
                    <h2 class="text-lg font-semibold leading-6 tracking-wider text-gray-300 uppercase">Properties</h2>
                    <p class="sm:text-4xl lg:text-5xl text-3xl font-extrabold text-white">Check out our rentals</p>
                    <p class="text-xl text-gray-300">Below are some of our most popular rentals</p>
                </div>
            </div>
        </div>
        <div class="sm:mt-12 sm:pb-16 lg:mt-16 lg:pb-24 pb-12 mt-8 bg-gray-100">
            <div class="relative">
                <div class="h-3/4 bg-primary absolute inset-0"></div>
                <div class="sm:px-6 lg:px-8 relative z-10 max-w-5xl px-4 mx-auto">
                    <div class="lg:max-w-5xl lg:grid lg:grid-cols-2 lg:gap-5 lg:space-y-0 max-w-md mx-auto space-y-4">

                        {{-- Properties --}}
                        @foreach (\App\Models\Property::all()->take(2) as $property)
                            <div class="flex flex-col overflow-hidden rounded-lg shadow-lg">
                                <div class="">
                                    <div class="bg-center bg-cover h-[300px]" style="background-image: url('/storage/{{ $property->photos->first()->path }}')"></div>
                                </div>
                                <div class="sm:p-10 sm:pb-6 h-full px-6 py-8 bg-white">
                                    <div>
                                        <h3 class="text-primary-dark bg-primary-lightest inline-flex px-4 py-1 text-sm font-semibold tracking-wide uppercase rounded-full" id="tier-standard">
                                            {{ $property->name }}
                                        </h3>
                                    </div>
                                    <div class="flex items-baseline mt-4">
                                        <span class="text-4xl font-extrabold">${{ $property->rate }}</span>
                                        <span class="ml-1 text-2xl font-medium text-gray-500"> / night </span>
                                    </div>
                                    <div class="place-self-end flex mt-4 space-x-2">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            3400 sq. ft
                                        </span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            3 bedrooms
                                        </span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            6 beds
                                        </span>
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            Sleeps 14
                                        </span>
                                    </div>
                                    <p class="line-clamp-6 mt-5 text-lg text-gray-500">{{ $property->title }}</p>
                                </div>
                                <div class="bg-gray-50 sm:p-10 sm:pt-6 flex flex-col justify-between flex-1 px-6 pt-6 pb-8 space-y-6">
                                    <ul role="list" class="text-muted-darker space-y-4">
                                        <li class="flex items-start">
                                            <svg class="text-muted-light w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            <p class="ml-2 text-base">Swimming Pool</p>
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="text-muted-light w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            <p class="ml-2 text-base">TV & Internet</p>
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="text-muted-light w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            <p class="ml-2 text-base">Washer & Dryer</p>
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="text-muted-light w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            <p class="ml-2 text-base">Hot Tub</p>
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="text-muted-light w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            <p class="ml-2 text-base">Fireplace</p>
                                        </li>
                                        <li class="flex items-start">
                                            <svg class="text-muted-light w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                                            </svg>
                                            <p class="ml-2 text-base">...and so much more!</p>
                                        </li>
                                    </ul>
                                    <div class="rounded-md shadow">
                                        <a href="{{ route('frontend.property', ['id' => $property->id]) }}" class="hover:bg-gray-900 flex items-center justify-center px-5 py-3 text-base font-medium text-white bg-gray-800 border border-transparent rounded-md" aria-describedby="tier-standard"> View {{ $property->name }} </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="sm:px-6 lg:px-8 lg:mt-5 relative max-w-5xl px-4 mx-auto mt-4">
                <div class="lg:max-w-5xl max-w-md mx-auto">
                    <div class="sm:p-10 lg:flex lg:items-center px-6 py-8 bg-gray-200 rounded-lg">
                        <div class="flex-1">
                            <div class="text-lg text-gray-600"><span class="font-semibold">Do you want more?</span> Check out the rest of our rentals</div>
                        </div>
                        <div class="lg:mt-0 lg:ml-10 lg:flex-shrink-0 mt-6 rounded-md shadow">
                            <a href="#" class="hover:bg-gray-50 flex items-center justify-center px-5 py-3 text-base font-medium text-gray-900 bg-white border border-transparent rounded-md"> View All Rentals </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="bg-primary lg:pb-0 lg:z-10 lg:relative pb-16">
        <div class="lg:mx-auto lg:max-w-5xl lg:px-8 lg:grid lg:grid-cols-3 lg:gap-8">
            <div class="lg:-my-8 relative">
                <div aria-hidden="true" class="h-1/2 lg:hidden absolute inset-x-0 top-0 bg-white"></div>
                <div class="sm:max-w-3xl sm:px-6 lg:p-0 lg:h-full max-w-md px-4 mx-auto">
                    <div class="aspect-w-10 aspect-h-6 rounded-xl sm:aspect-w-16 sm:aspect-h-7 lg:aspect-none lg:h-full overflow-hidden shadow-xl">
                        <img class="lg:h-full lg:w-full object-cover object-top" src="https://i.imgur.com/OwRL3ih.jpeg" alt="">
                    </div>
                </div>
            </div>
            <div class="lg:m-0 lg:col-span-2 lg:pl-8 mt-12">
                <div class="sm:max-w-2xl sm:px-6 lg:px-0 lg:py-20 lg:max-w-none max-w-md px-4 mx-auto">
                    <blockquote>
                        <div>
                            <svg class="text-primary-darkest w-12 h-12 opacity-25" fill="currentColor" viewBox="0 0 32 32" aria-hidden="true">
                                <path d="M9.352 4C4.456 7.456 1 13.12 1 19.36c0 5.088 3.072 8.064 6.624 8.064 3.36 0 5.856-2.688 5.856-5.856 0-3.168-2.208-5.472-5.088-5.472-.576 0-1.344.096-1.536.192.48-3.264 3.552-7.104 6.624-9.024L9.352 4zm16.512 0c-4.8 3.456-8.256 9.12-8.256 15.36 0 5.088 3.072 8.064 6.624 8.064 3.264 0 5.856-2.688 5.856-5.856 0-3.168-2.304-5.472-5.184-5.472-.576 0-1.248.096-1.44.192.48-3.264 3.456-7.104 6.528-9.024L25.864 4z"></path>
                            </svg>
                            <p class="mt-6 text-2xl font-medium text-white">
                                Placeholder of your quote to your guests
                            </p>
                        </div>
                        <footer class="mt-6">
                            <p class="text-primary-light text-base font-medium">Your hosts,</p>
                            <p class="text-base font-medium text-white">Rob & Erin Serrate</p>
                        </footer>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>





</x-app-layout>
