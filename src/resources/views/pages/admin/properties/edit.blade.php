<x-admin-layout>
    <x-slot name="headerTitle">
        Edit property
    </x-slot>

    @livewire('admin.properties.property-form', ['property_id' => $property_id])
</x-admin-layout>
