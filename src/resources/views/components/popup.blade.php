<div @showpopup.window="popupOpen = true; $dispatch('lockbody')" @hidepopup.window="popupOpen = false; $dispatch('unlockbody')">
    <div class="absolute inset-0 z-40 flex items-end pt-20 overflow-hidden bg-black bg-opacity-75" x-show="popupOpen" x-transition:enter="transition ease-out duration-300" -transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
        <div class="w-full max-h-full overflow-y-auto bg-white rounded-t-xl" x-on:click.outside="popupOpen = false; $dispatch('unlockbody')" x-show="popupOpen" x-transition:enter="transition ease-out duration-500" x-transition:enter-start="transform translate-y-full" x-transition:enter-end="transform translate-y-0" x-transition:leave="transition ease-out duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
            <div class="p-5 pb-0">
                {{ $header }}
            </div>
            <div class="min-h-full p-5">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>