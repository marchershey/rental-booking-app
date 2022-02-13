<x-base-layout>
    <div x-data="{sidebar:false}">

        {{-- Mobile Sidebar --}}
        <div class="md:hidden fixed inset-0 z-40 flex" role="dialog" aria-modal="true" x-show="sidebar" x-cloak>
            <div class="fixed inset-0 bg-gray-600 bg-opacity-75" aria-hidden="true"></div>
            <div class="sm:max-w-xs relative flex flex-col flex-1 w-full bg-gray-800" x-on:click.away="sidebar = false">
                <div class="absolute top-0 right-0 pt-2 -mr-12">
                    <button x-on:click="sidebar = false" type="button" class="focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white flex items-center justify-center w-10 h-10 ml-1 rounded-full">
                        <span class="sr-only">Close sidebar</span>
                        <svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- Mobile navigation --}}
                <div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">
                    <div class="flex items-center flex-shrink-0 px-4">
                        <img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
                    </div>
                    @include('layouts.admin-nav-links')
                </div>

                {{-- Mobile profile section --}}
                @include('layouts.admin-profile')
            </div>
            <div class="w-14 flex-shrink-0">
                <!-- Force sidebar to shrink to fit close icon -->
            </div>
        </div>


        {{-- Desktop sidebar --}}
        <div class="md:flex md:w-64 md:flex-col md:fixed md:inset-y-0 hidden">

            {{-- swiper sidebar --}}
            <div class="flex flex-col flex-1 min-h-0 bg-gray-800">
                <div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">
                    {{--  --}}
                    <div class="flex items-center flex-shrink-0 px-4" x-on:click="sidebar = !sidebar">
                        <img class="w-auto h-8" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
                    </div>
                    @include('layouts.admin-nav-links')
                </div>

                {{-- Desktop profile section --}}
                @include('layouts.admin-profile')
            </div>
        </div>
        <div class="md:pl-64 flex flex-col flex-1">
            <div class="md:hidden sticky top-0 z-10 bg-gray-800">
                <button x-on:click="sidebar = true" type="button" class="hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500 px-3 py-4 text-gray-500">
                    <span class="sr-only">Open sidebar</span>
                    <svg class="w-8 h-8" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
            <main class="flex-1">
                <div class="md:px-5 flex flex-col max-w-screen-lg px-3 py-5 mx-auto space-y-5">

                    @if (isset($pageTitle) || isset($pageDesc))
                        <div class="flex items-center justify-between">
                            <div class="flex flex-col ml-1">
                                @if (isset($pageTitle))
                                    <h1 class="text-2xl font-bold capitalize">{{ $pageTitle }}</h1>
                                @endif
                                @if (isset($pageDesc))
                                    <span class="text-muted text-sm">{{ $pageDesc }}</span>
                                @endif
                            </div>
                            @if (isset($pageAction))
                                <div>
                                    {{ $pageAction }}
                                </div>
                            @endif
                        </div>
                    @endif
                    <div>
                        {{ $slot }}
                    </div>
                </div>
            </main>
        </div>
    </div>




</x-base-layout>
