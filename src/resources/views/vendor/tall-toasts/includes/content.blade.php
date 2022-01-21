<div class="group max-w-screen-sm p-5 mx-auto overflow-hidden text-gray-700 bg-white border border-gray-300 rounded shadow-lg cursor-pointer pointer-events-auto select-none">
    <div class="flex items-center space-x-4">
        <div>
            @include('tall-toasts::includes.icon')
        </div>
        <div class="flex flex-wrap items-baseline w-full">
            <div x-show="toast.title !== undefined" x-html="toast.title" class="font-semibold uppercase" :class="toast.title && 'mr-2'"></div>
            <div x-show="toast.message !== undefined" x-html="toast.message" class="leading-4" :class="toast.title && 'text-muted text-sm md:text-base'"></div>
        </div>
        <div class="justify-self-end">
            <svg class="text-muted group-hover:text-black w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </div>
    </div>
</div>
