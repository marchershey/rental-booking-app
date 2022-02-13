<div wire:init="load">
    <x-slot name="pageTitle">
        Guests
    </x-slot>

    <div class="panel">
        <x-heading heading="Your Guests" description="A list of all of your registered guests" />
        @if ($guests)
            <div class="-mx-5 -mb-5 overflow-hidden">
                <div class="hide-scrollbar mb-2 overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="text-muted px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Name</th>
                                <th scope="col" class="text-muted px-6 py-3 text-xs font-medium tracking-wider text-left uppercase">Address</th>
                                <th scope="col" class="text-muted px-6 py-3 text-xs font-medium tracking-wider text-center uppercase">Status</th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($guests as $guest)
                                <tr>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="text-sm font-medium">{{ $guest['name'] }}</div>
                                        <div class="text-muted text-sm">{{ $guest['email'] }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="text-sm text-gray-900">{{ $guest['address'] }}</div>
                                        <div class="text-sm text-gray-500">{{ $guest['city'] }}, {{ $guest['state'] }} {{ $guest['zip'] }}</div>
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-center">
                                        @if ($guest['status'])
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-green-800 bg-green-100 rounded-full"> Active </span>
                                        @else
                                            <span class="inline-flex px-2 text-xs font-semibold leading-5 text-red-800 bg-red-100 rounded-full"> Disabled </span>
                                        @endif
                                    </td>
                                    <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-right">
                                        <a href="#" class="hover:text-indigo-900 text-indigo-600">Edit</a>
                                    </td>
                                </tr>
                            @endforeach

                            <!-- More people... -->
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
