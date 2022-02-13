<nav class="sm:space-y-2 flex-1 px-2 mt-5 space-y-1 text-gray-400">
    <a href="{{ route('admin.index') }}" class="hover:bg-gray-700 hover:text-white group sm:py-2 sm:text-sm flex items-center px-2 py-3 font-medium rounded-lg {{ request()->is('admin') ? 'text-white bg-gray-900' : 'text-gray-300' }}">
        <svg class="flex-shrink-0 w-6 h-6 mr-3 text-gray-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
        </svg>
        <span>Dashboard</span>
    </a>

    <div class="sm:space-y-2 sm:text-sm space-y-1 text-gray-300" x-data="{open:false}" x-on:click.away="open = false">
        <button type="button" class="group sm:py-2 hover:bg-gray-700 hover:text-white flex items-center w-full px-2 py-3 rounded-lg {{ request()->is('admin/properties/*') ? 'bg-gray-900' : '' }}" x-on:click="open = !open">
            <svg xmlns="http://www.w3.org/2000/svg" class="group-hover:text-white flex-shrink-0 w-6 h-6 mr-3 text-gray-400" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="9" cy="7" r="4"></circle>
                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
            </svg>
            <div class="group-hover:text-white flex items-center justify-between w-full">
                <span>Guests</span>
                <svg class="w-4 h-4" :class="{ 'text-gray-400 rotate-90': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
        </button>
        <div x-show="open" x-cloak>
            <a href="{{ route('admin.guests.view') }}" class="group pl-11 hover:text-white sm:py-2 hover:bg-gray-700 flex items-center w-full px-2 py-3 pr-2 rounded-lg {{ request()->is('admin/properties/all') ? 'text-white' : 'text-gray-400' }}">
                View all guests
            </a>
        </div>
    </div>

    <div class="sm:space-y-2 sm:text-sm space-y-1 text-gray-300" x-data="{open:false}" x-on:click.away="open = false">
        <button type="button" class="group sm:py-2 hover:bg-gray-700 hover:text-white flex items-center w-full px-2 py-3 rounded-lg {{ request()->is('admin/properties/*') ? 'bg-gray-900' : '' }}" x-on:click="open = !open">
            <svg class="group-hover:text-white flex-shrink-0 w-6 h-6 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
            </svg>
            <div class="group-hover:text-white flex items-center justify-between w-full">
                <span>Properties</span>
                <svg class="w-4 h-4" :class="{ 'text-gray-400 rotate-90': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </div>
        </button>
        <div x-show="open" x-cloak>
            <a href="{{ route('admin.properties.list') }}" class="group pl-11 hover:text-white sm:py-2 hover:bg-gray-700 flex items-center w-full px-2 py-3 pr-2 rounded-lg {{ request()->is('admin/properties/all') ? 'text-white' : 'text-gray-400' }}">
                View all properties
            </a>
            <a href="{{ route('admin.properties.create') }}" class="group pl-11 hover:text-white sm:py-2 hover:bg-gray-700 flex items-center w-full px-2 py-3 pr-2 rounded-lg {{ request()->is('admin/properties/new') ? 'text-white' : 'text-gray-400' }}">
                Add new property
            </a>
        </div>
    </div>

    <a href="{{ route('admin.settings') }}" class="hover:bg-gray-700 hover:text-white group sm:py-2 sm:text-sm flex items-center px-2 py-3 font-medium rounded-lg {{ request()->is('admin/settings') ? 'text-white bg-gray-900' : 'text-gray-300' }}">
        <svg class="group-hover:text-gray-300 flex-shrink-0 w-6 h-6 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
        </svg>
        <span>Settings</span>
    </a>
</nav>
