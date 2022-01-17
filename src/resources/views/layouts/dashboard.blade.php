<x-layouts.base class="leading-5 tracking-wide text-gray-800">
    <!--
  This example requires updating your template:

  ```
  <html class="h-full bg-gray-100">
  <body class="h-full">
  ```
-->
    <div x-data="{open: false}">
        <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
        <div class="md:hidden fixed inset-0 z-40 flex" role="dialog" aria-modal="true" x-show="open" x-transition x-cloak>
            {{-- <div class="fixed inset-0 bg-black bg-opacity-75" aria-hidden="true" x-on:click="open = false"></div> --}}
            <div class="relative flex flex-col flex-1 w-full bg-gray-800">
                <div class="flex-1 h-0 pt-4 pb-4 overflow-y-auto">
                    <div class="absolute top-0 right-0 mx-2 my-3">
                        <button type="button" class="focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white flex items-center justify-center w-10 h-10 ml-1 rounded-full" x-on:click="open = false">
                            <span class="sr-only">Close sidebar</span>
                            <svg class="hover:text-white w-8 h-8 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="px-6">
                        <h1 class="font-sans text-2xl font-bold tracking-wider text-white">Hi there, {{ ucfirst(Auth::user()->first_name) }}!</h1>
                    </div>
                    <nav class="px-2 mt-5 space-y-1">
                        <a href="{{ route('dashboard.index') }}" class="flex items-center p-3 text-xl font-semibold rounded-md group {{ request()->routeIs('dashboard.index') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <svg class="flex-shrink-0 w-8 h-8 mr-5 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </a>

                        <a href="{{ route('dashboard.notifications') }}" class="flex items-center p-3 text-xl font-semibold rounded-md group {{ request()->routeIs('dashboard.notifications') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <svg class="group-hover:text-gray-300 flex-shrink-0 w-8 h-8 mr-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            Notifications
                            <span class="bg-red-500 ml-auto inline-block py-0.5 px-3 text-sm rounded-full text-red-200">5</span>
                        </a>

                        <a href="{{ route('dashboard.properties.index') }}" class="flex items-center p-3 text-xl font-semibold rounded-md group {{ request()->routeIs('dashboard.properties.*') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-gray-300 flex-shrink-0 w-8 h-8 mr-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Properties
                            <span class="bg-gray-600 ml-auto inline-block py-0.5 px-3 text-sm rounded-full text-gray-200">2</span>
                        </a>

                        <a href="{{ route('dashboard.settings.index') }}" class="flex items-center p-3 text-xl font-semibold rounded-md group {{ request()->routeIs('dashboard.settings') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <svg class="group-hover:text-gray-300 flex-shrink-0 w-8 h-8 mr-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Settings
                        </a>
                    </nav>
                </div>
                <div class="flex flex-shrink-0 px-6 py-4 bg-gray-700">
                    <a href="#" class="group flex-shrink-0 block">
                        <div class="flex items-center">
                            <div>
                                <img class="inline-block w-12 h-12 rounded-full" src="https://ui-avatars.com/api/?background=3b82f6&color=fff&name={{ Auth::user()->fullName('+') }}" alt="">
                            </div>
                            <div class="ml-3">
                                <p class="text-lg font-medium text-white">
                                    {{ Auth::user()->fullName() }}
                                </p>
                                <p class="group-hover:text-gray-300 text-sm font-medium text-gray-400">
                                    View profile
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- <div class="w-14 flex-shrink-0">
                <!-- Force sidebar to shrink to fit close icon -->
            </div> --}}
        </div>

        <!-- Static sidebar for desktop -->
        <div class="md:flex md:w-64 md:flex-col md:fixed md:inset-y-0 hidden">
            <!-- Sidebar component, swap this element with another sidebar if you like -->
            <div class="flex flex-col flex-1 min-h-0 bg-gray-800">
                <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
                    <div class="text-center">
                        <h1 class="font-sans text-2xl font-bold tracking-wider text-white">Hi there, {{ ucfirst(Auth::user()->first_name) }}!</h1>
                    </div>
                    <nav class="flex-1 px-2 mt-5 space-y-1">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ route('dashboard.index') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md group {{ request()->routeIs('dashboard.index') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            Dashboard
                        </a>
                        <a href="{{ route('dashboard.notifications') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md group {{ request()->routeIs('dashboard.notifications') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <svg class="group-hover:text-gray-300 flex-shrink-0 w-6 h-6 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            Notifications
                            <span class="bg-red-500 ml-auto inline-block py-0.5 px-3 text-sm rounded-full text-red-200">5</span>
                        </a>
                        <a href="{{ route('dashboard.properties.index') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md group {{ request()->routeIs('dashboard.properties.*') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-gray-300 flex-shrink-0 w-6 h-6 mr-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Properties
                            <span class="bg-gray-600 ml-auto inline-block py-0.5 px-3 text-sm rounded-full text-gray-200">2</span>
                        </a>
                        <a href="{{ route('dashboard.settings.index') }}" class="flex items-center px-2 py-2 text-sm font-medium rounded-md group {{ request()->routeIs('dashboard.settings.*') ? 'text-white bg-gray-900' : 'text-gray-300 hover:bg-gray-700 hover:text-white' }}">
                            <svg class="group-hover:text-gray-300 flex-shrink-0 w-6 h-6 mr-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Settings
                        </a>
                    </nav>
                </div>
                <div class="flex flex-shrink-0 p-4 bg-gray-700">
                    <a href="#" class="group flex-shrink-0 block w-full">
                        <div class="flex items-center">
                            <div>
                                <img class="h-9 w-9 inline-block rounded-full" src="https://ui-avatars.com/api/?background=6366f1&color=fff&name={{ Auth::user()->fullName('+') }}" alt="">
                            </div>
                            <div class="ml-3">
                                <p class="group-hover:text-white text-sm font-medium text-gray-300 capitalize">
                                    {{ Auth::user()->fullName() }}
                                </p>
                                <p class="group-hover:text-white text-xs font-medium text-gray-400">
                                    View profile
                                </p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="md:pl-64 flex flex-col flex-1">

            <!-- Top Bar for Mobile -->
            <div class="md:hidden sm:pl-3 sm:pt-3 sticky top-0 z-10 flex justify-between p-2 bg-gray-800">
                <button type="button" class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none" x-on:click="open = true">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <button type="button" class="-ml-0.5 -mt-0.5 h-12 w-12 inline-flex items-center justify-center rounded-md text-gray-500 hover:text-gray-900 focus:outline-none" x-on:click="open = true">
                    <span class="sr-only">Open notifications</span>
                    <div class="relative">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                        </svg>
                        <div class="absolute top-0 right-0 w-2 h-2">
                            <span class="right-1 ring-2 ring-red-500 absolute top-0 block w-1 h-1 bg-red-500 rounded-full"></span>
                            <span class="right-1 ring-4 ring-red-500 animate-ping absolute top-0 block w-1 h-1 bg-red-500 rounded-full"></span>
                        </div>
                    </div>
                </button>
            </div>

            <!-- Content -->
            <main class="flex-1">
                <div class="max-w-screen-md py-6 space-y-6">
                    <div class="px-6 mx-auto space-y-1">
                        <h1 class="text-3xl font-medium leading-6 text-gray-900">{{ $header ?? 'SET HEADER AND SUBHEADER' }}</h1>
                        <h2 class="text-muted text-sm">{{ $subheader ?? null }}</h2>
                    </div>
                    <div class="px-6 mx-auto">
                        <div class="space-y-6">
                            {{ $slot }}
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</x-layouts.base>
