<!-- This example requires Tailwind CSS v2.0+ -->
<nav class="mb-10 bg-gray-800" x-data="{mobileNavOpen: false}">
    <div class="sm:px-6 lg:px-8 max-w-screen-lg px-4 mx-auto">
        <div class="flex items-center justify-between h-16">
            <div class="flex-shrink-0">
                <img class="lg:hidden block w-auto h-8" src="https://tailwindui.com/img/logos/workflow-mark-indigo-500.svg" alt="Workflow">
                <img class="lg:block hidden w-auto h-8" src="https://tailwindui.com/img/logos/workflow-logo-indigo-500-mark-white-text.svg" alt="Workflow">
            </div>
            <div class="sm:block sm:ml-6 hidden">
                <div class="flex space-x-4">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="#" class="block px-3 py-2 text-base font-medium text-white bg-gray-900 rounded-md">Dashboard</a>
                    <a href="#" class="hover:bg-gray-700 hover:text-white block px-3 py-2 text-base font-medium text-gray-200 rounded-md">Team</a>
                    <a href="#" class="hover:bg-gray-700 hover:text-white block px-3 py-2 text-base font-medium text-gray-200 rounded-md">Projects</a>
                    <a href="#" class="hover:bg-gray-700 hover:text-white block px-3 py-2 text-base font-medium text-gray-200 rounded-md">Calendar</a>
                </div>
            </div>
            <div class="sm:hidden flex -mr-2">
                <!-- Mobile menu button -->
                <button x-on:click="mobileNavOpen = !mobileNavOpen" type="button" class="hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white inline-flex items-center justify-center p-2 text-gray-400 rounded-md" aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="block w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="hidden w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu" x-show="mobileNavOpen" x-cloak>
        <div class="px-2 pt-2 pb-3 space-y-1">
            <a href="#" class="block px-3 py-2 text-base font-medium text-white bg-gray-900 rounded-md">Dashboard</a>
            <a href="#" class="hover:bg-gray-700 hover:text-white block px-3 py-2 text-base font-medium text-gray-300 rounded-md">Team</a>
            <a href="#" class="hover:bg-gray-700 hover:text-white block px-3 py-2 text-base font-medium text-gray-300 rounded-md">Projects</a>
            <a href="#" class="hover:bg-gray-700 hover:text-white block px-3 py-2 text-base font-medium text-gray-300 rounded-md">Calendar</a>
        </div>
    </div>
</nav>
