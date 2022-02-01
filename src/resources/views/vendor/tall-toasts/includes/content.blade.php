<div class="group hover:shadow-2xl rounded-xl max-w-screen-md p-5 overflow-hidden text-gray-700 bg-white border border-gray-300 shadow-lg cursor-pointer pointer-events-auto select-none">
    <div class="flex items-center space-x-4">
        <div class="self-baseline">
            @include('tall-toasts::includes.icon')
        </div>
        <div class="flex flex-wrap items-baseline w-full">
            <div x-show="toast.title !== undefined" x-html="toast.title" class="font-semibold uppercase" :class="toast.title && 'mr-2'"></div>
            <div x-show="toast.message !== undefined" x-html="toast.message" class="leading-4" :class="toast.title && 'text-muted text-sm md:text-base'"></div>
        </div>
        <div class="justify-self-end">
            <svg class="text-muted group-hover:text-black w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </div>
    </div>
</div>
