<div class="hover:bg-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 z-50 p-5 overflow-hidden bg-white border-l-8 rounded-md shadow cursor-pointer pointer-events-auto select-none" x-bind:class="{
                    'border-blue-700': toast.type === 'info',
                    'border-green-700': toast.type === 'success',
                    'border-yellow-700': toast.type === 'warning',
                    'border-red-700': toast.type === 'danger'
                  }">
    <div class="flex items-center justify-between space-x-5">
        <div class="flex-1 mr-2">
            <div class="font-large dark:text-gray-100 mb-1 text-lg font-black tracking-widest text-gray-900 uppercase" x-show="toast.title !== undefined" x-html="toast.title"></div>

            <div class="dark:text-gray-200 text-gray-900" x-show="toast.message !== undefined" x-html="toast.message"></div>
        </div>

        @include('tall-toasts::includes.icon')
    </div>
</div>
