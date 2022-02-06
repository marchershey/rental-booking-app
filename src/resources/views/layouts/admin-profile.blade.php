<div class="flex flex-shrink-0 p-4 bg-gray-700">
    <a href="#" class="group flex-shrink-0 block w-full">
        <div class="flex items-center">
            <div>
                <img class="inline-block w-10 h-10 rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
            </div>
            <div class="ml-3">
                <p class="md:text-sm text-base font-medium text-white capitalize">
                    {{ auth()->user()->name }}
                </p>
                <p class="group-hover:text-gray-300 md:text-xs text-sm font-medium text-gray-400">
                    Edit profile
                </p>
            </div>
        </div>
    </a>
</div>
