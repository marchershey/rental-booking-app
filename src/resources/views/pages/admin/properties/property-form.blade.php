<div wire:init="load" class="">

    <div class="lg:grid-cols-3 relative grid grid-cols-1">
        {{-- Right column --}}
        <div class="lg:mt-0 lg:ml-10 order-2 h-full mt-10">
            <div class="top-10 sticky">
                <x-form.button wire:click="submit">Save Property</x-form.button>
                @if ($showDeleteButton)
                    <x-form.button color="red" class="mt-3" wire:click="delete">Delete Property</x-form.button>
                @endif
            </div>
        </div>

        {{-- Left column --}}
        <div class="order-1 col-span-2 space-y-10">
            {{-- Property details --}}
            <div class="panel space-y-3">
                <x-heading heading="Property Details" description="Details about your property" class="col-span-full" />
                <div class="lg:grid-cols-2 grid gap-5">
                    <x-form.text wireid="name" label="Property Name" description="This is the property name, not the listing title so keep it short and simple" />
                    <x-form.select wireid="type" label="Property Type" description="The type helps people understand if this is a full house, or a spare bedroom. You can edit property types <span class='text-primary'>here</span>" :options="['Full House' => 'Full House', 'Apartment' => 'Apartment', 'Condo' => 'Condo', 'Spare Room' => 'Spare Room', 'Other' => 'Other']" />
                    <x-form.text wireid="title" label="Property Title" description="This is a descriptive title to show the clients in the property list." class="col-span-full" />
                    <x-form.textarea wireid="description" label="Property Description" description="The property description is displayed to clients, so explain throughly" class="col-span-full" />
                </div>
            </div>
            {{-- Location --}}
            <div class="panel space-y-3">
                <x-heading heading="Location" description="This address will be given to clients upon checkout" class="col-span-full" />
                <x-form.text wire:ignore inputid="address_search" placeholder=" " label="Property Address" description="Start typing the property's address, then select the correct address from the dropdown" class="col-span-full" />
            </div>
            {{-- Pricing --}}
            <div class="panel space-y-3">
                <x-heading heading="Pricing" description="Details about your property" class="col-span-full" />
                <div class="lg:grid-cols-2 grid gap-4">
                    <x-form.text wireid="rate" label="Rate" description="The rate is the cost per night excluding all other fees" />
                    <div>
                        <x-form.button class="lg:mt-7" color="muted">Add addition fees</x-form.button>
                    </div>
                </div>
            </div>
            {{-- Photos --}}
            <div class="panel space-y-3">
                <x-heading heading="Photos" description="Upload photos of the property" class="col-span-full" />
                <div x-data="{ progress: 0 }" x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <div class="md:flex-row md:space-x-5 md:space-y-0 md:items-center md:justify-between flex flex-col space-y-2">
                        <div class="flex-shrink-none">
                            <input type="file" accept="image/*" wire:model="stagedPhotos" multiple class="focus:outline-none focus:ring">
                        </div>
                        <div wire:loading.remove wire:target="stagedPhotos" class="text-muted text-xs">
                            Max 30 photos, 20MB
                        </div>
                        <div class="bg-blue-50 relative w-full h-5 overflow-hidden rounded-full" wire:loading wire:target="stagedPhotos">
                            <div class="whitespace-nowrap absolute p-1 text-xs font-medium leading-none text-center text-white bg-blue-600 rounded-l-full" :style="{ 'width': progress + '%'}"> <span x-text="progress" class=""></span> %</div>
                        </div>
                    </div>
                </div>
                <div>
                    <ul role="list" class="sm:grid-cols-3 sm:gap-5 lg:grid-cols-4 xl:grid-cols-5 grid grid-cols-2 gap-3">
                        @if ($photos)
                            @foreach ($photos as $key => $photo)
                                <li class="group relative" wire:key="photos_{{ $loop->index }}">
                                    <div class="aspect-w-3 aspect-h-2 block w-full overflow-hidden bg-gray-100 border border-transparent rounded-lg">
                                        <img src="{{ '/storage/' . $photo['path'] }}" alt="" class="group-hover:scale-105 group-hover:-rotate-1 object-cover object-center w-full transition-transform duration-500 ease-in-out pointer-events-none @if ($loop->iteration > $maxPhotos) opacity-25 @endif">
                                    </div>
                                    <div class="flex items-center justify-between mt-1">
                                        <div class="truncate">
                                            <p class="block w-full text-sm font-medium truncate pointer-events-none">{{ $photo['filename'] }}</p>
                                            <div class="text-muted text-xs">
                                                @if ($loop->iteration > $maxPhotos)
                                                    <span class="italic">This will not be uploaded</span>
                                                @else
                                                    <span>{{ number_format($photo['size'] / 1000 / 1000, 3) }} MB</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="p-1 pr-0 mt-1 cursor-pointer" wire:click="removeUploadedPhoto({{ $photo['id'] }})">
                                            <svg class="hover:text-red-500 w-7 h-7 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                        @if ($stagedPhotos)
                            @foreach ($stagedPhotos as $key => $photo)
                                <li class="group relative" wire:key="stagedPhotos_{{ $loop->index }}">
                                    <div class="aspect-w-3 aspect-h-2 block w-full overflow-hidden bg-gray-100 border border-transparent rounded-lg">
                                        <img src="{{ $photo->temporaryUrl() }}" alt="" class="group-hover:scale-105 group-hover:-rotate-1 object-cover object-center w-full transition-transform duration-500 ease-in-out pointer-events-none @if ($loop->iteration > $maxPhotos) opacity-25 @endif">
                                    </div>
                                    <div class="flex items-center justify-between mt-1">
                                        <div class="truncate">
                                            <p class="block w-full text-sm font-medium truncate pointer-events-none">{{ $photo->getClientOriginalName() }}</p>
                                            <div class="text-muted text-xs">
                                                @if ($loop->iteration > $maxPhotos)
                                                    <span class="italic">This will not be uploaded</span>
                                                @else
                                                    <span>{{ number_format($photo->getSize() / 1000 / 1000, 3) }} MB</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="p-1 pr-0 mt-1 cursor-pointer" wire:click="removeStagedPhoto({{ $key }})">
                                            <svg class="hover:text-red-500 w-7 h-7 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        let autocomplete;
        let address_search_field = document.getElementById('address_search')

        window.addEventListener('load', function() {
            initAutocomplete()
        });

        function initAutocomplete() {
            google.load().then((google) => {
                var sessionToken = new google.maps.places.AutocompleteSessionToken();
                var autocomplete = new google.maps.places.Autocomplete(
                    address_search_field, {
                        fields: ['formatted_address', 'geometry'],
                        types: ["address"],
                        sessionToken: sessionToken
                    }
                );
                autocomplete.addListener('place_changed', function() {
                    const address = autocomplete.getPlace();
                    @this.address = address.formatted_address
                })
            }).catch(e => {
                console.log(e);
                // do something
            });
        }

        // update address search field
        window.addEventListener('address-updated', event => {
            address_search_field.value = event.detail.newAddress
        })
    </script>
@endpush
