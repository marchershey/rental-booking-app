<x-admin-layout>
    <x-slot name="headerTitle">
        Dashboard
    </x-slot>

    <div class="panel">
        <x-heading heading="Recent Reservations" description="View all of your recent reservations" />
        <div class="-mx-5 -mb-5 overflow-hidden">

            <div class="hide-scrollbar mb-2 overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-muted-lightest text-xs font-medium tracking-wider text-left text-gray-500 uppercase">
                        <tr>
                            <th scope="col" class="px-6 py-3">Property</th>
                            <th scope="col" class="px-6 py-3">Client</th>
                            <th scope="col" class="px-6 py-3">Dates</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-muted-lighter divide-y">
                        <tr>
                            <td class="whitespace-nowrap px-6 py-4">Jane Cooper</td>
                            <td class="whitespace-nowrap px-6 py-4">Regional Paradigm Technician</td>
                            <td class="whitespace-nowrap px-6 py-4">jane.cooper@example.com</td>
                            <td class="whitespace-nowrap px-6 py-4">Admin</td>
                            <td class="whitespace-nowrap px-6 py-4">
                                <div class="flex items-end space-x-3">
                                    <a href="#" class="">Approve</a>
                                    <a href="#" class="">Reject</a>
                                </div>
                            </td>
                        </tr>

                        <!-- More people... -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</x-admin-layout>
