<x-app-layout>
    <main class="space-y-20 lg:pt-10 max-w-screen-sm mx-auto">
        <div class="z-50 p-5 sm:p-10 bg-white drop-shadow-xl lg:rounded-xl border border-gray-300 space-y-5">
            <div class="w-full">
                <div>
                    <h2 class="text-base font-semibold text-blue-600 uppercase tracking-wide">Hey there, {{ Auth::user()->first_name }}</h2>
                    <h1 class="my-2 text-2xl font-extrabold text-gray-900">Your Reservation</h1>
                    <p>Now, let's open the calendar and select the dates you would like to stay.</p>
                </div>
            </div>


        </div>
    </main>
</x-app-layout>
