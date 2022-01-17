<x-layouts.dashboard>
    <x-slot name="header">Settings</x-slot>
    <x-slot name="subheader">This page allows you to change the configuration of the app, rental, users, and so much more.</x-slot>

    <div class="lg:grid lg:grid-cols-12 lg:gap-x-5">


        <aside class="lg:col-span-3">
            <nav class="space-y-1 font-medium">
                <a href="#" class="flex items-center px-3 py-2 bg-white rounded-lg group" aria-current="page">
                    <svg xmlns="http://www.w3.org/2000/svg" class="flex-shrink-0 w-6 h-6 mr-3 -ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="truncate">
                        General
                    </span>
                </a>

                <a href="#" class="flex items-center px-3 py-2 text-gray-500 rounded-lg group">
                    <svg class="flex-shrink-0 w-6 h-6 mr-3 -ml-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z" />
                    </svg>
                    <span class="truncate">
                        Password
                    </span>
                </a>
            </nav>
        </aside>

        <div class="mt-5 lg:mt-0 lg:col-span-9">
            <form action="">
                <x-base.div-box class="space-y-6 rounded-lg">
                    <div>
                        <h3 class="text-lg font-medium leading-6 text-gray-900">General</h3>
                        <p class="mt-1 text-sm text-gray-500">General settings related to the application.</p>
                    </div>


                    <form action="">
                        <div>
                            <label for="company_name" class="block ml-px font-medium text-gray-700">Company Name</label>
                            <div class="mt-1">
                                <input type="text" name="company_name" id="company_name" class="block w-full border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-400" placeholder="Serrate's Rentals" aria-describedby="company_name_desc" autocomplete="{{ rand() }}">
                            </div>
                            <p class="mt-1 ml-px text-xs tracking-normal text-gray-400" id="company_name_desc">What is the company name of your rental business?</p>
                        </div>
                    </form>

                </x-base.div-box>
            </form>
        </div>
    </div>

</x-layouts.dashboard>
