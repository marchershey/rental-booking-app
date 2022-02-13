<x-admin-layout>
    <x-slot name="pageTitle">
        Edit property
    </x-slot>

    @livewire('admin.properties.property-form', ['property_id' => $property_id])
</x-admin-layout>
