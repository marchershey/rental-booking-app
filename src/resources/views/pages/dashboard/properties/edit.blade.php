<x-layouts.dashboard>
    <x-slot name="header">Edit Property</x-slot>
    <x-slot name="subheader">Edit your property below.</x-slot>

    <livewire:backend.properties.edit-property-form :propertyId="$propertyId" />
</x-layouts.dashboard>
