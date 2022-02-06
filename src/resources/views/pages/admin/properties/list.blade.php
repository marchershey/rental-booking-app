<x-admin-layout>
    <x-slot name="headerTitle">
        Properties
    </x-slot>
    <x-slot name="headerAction">
        <a href="{{ route('admin.properties.create') }}" class="text-primary">Add property</a>
    </x-slot>

    @livewire('admin.properties.list-table')
</x-admin-layout>
