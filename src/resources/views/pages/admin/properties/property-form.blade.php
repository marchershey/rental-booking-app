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
            {{-- Rates & Fees --}}
            <div class="panel space-y-3">
                <x-heading heading="Rates & Fees" description="Adjust the nightly rate and fees of your property" class="col-span-full" />
                <div class="grid grid-cols-1 gap-5">
                    <div class="gap-x-2 grid grid-cols-2">
                        <x-form.text wireid="nightlyRate" label="Nightly Rate" description="Charge each guest ${{ number_format($nightlyRate ?? 0, 2) }} per night" />
                        <x-form.text wireid="taxRate" label="Tax Percentage" description="Charge each guest {{ $taxRate ?? 0 }}% of the total cost" />
                    </div>
                    @if ($fees)
                        <div class="flex flex-col space-y-5">
                            {{-- <div class="bg-primary-lightest text-primary-darker sm:text-sm flex items-center p-3 space-x-2 text-xs rounded-md">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <line x1="12" y1="8" x2="12.01" y2="8"></line>
                                        <polyline points="11 12 12 12 12 16 13 16"></polyline>
                                    </svg>
                                </div>
                                <p class="">
                                    <strong>Please note:</strong> All percentage fees are applied only to the total nightly rate.
                                </p>
                            </div> --}}

                            @foreach ($fees as $key => $value)
                                <div class="flex space-x-2">
                                    <x-form.text wireid="fees.{{ $key }}.name" inputid="fees_{{ $key }}_name" label="Name" class="w-full" placeholder="Cleaning fee" description="Charge each guest {{ $fees[$key]['type'] == 'fixed'? 'a flat fee of $' . ($fees[$key]['amount'] ?? 0): 'a ' . ($fees[$key]['amount'] ?? 0) . '% fee of the total nightly rate' }}" />
                                    <label class="relative block">
                                        <span class=" text-sm font-semibold capitalize">Amount</span>
                                        <div class="relative mt-1">
                                            <input wire:model.debounce.1s="fees.{{ $key }}.amount" id="fees_{{ $key }}_amount" type="text" class="focus:border-gray-500 focus:bg-white focus:ring-0 bg-muted-lightest placeholder-muted-light block w-full pr-16 mt-1 border-transparent rounded-md" placeholder="0.00">
                                            <div class="absolute inset-y-0 right-0 flex items-center">
                                                <label class="sr-only">Currency</label>
                                                <select wire:model="fees.{{ $key }}.type" id="fees_{{ $key }}_type" class="focus:outline-none focus:border-transparent focus:shadow-none focus:ring-0 pr-7 w-fit sm:text-sm h-full py-0 pl-2 text-xs text-right bg-transparent border-transparent rounded-md">
                                                    <option value="fixed">Fixed</option>
                                                    <option value="percent">%</option>
                                                </select>
                                            </div>
                                        </div>
                                    </label>
                                    <div class="mt-10">
                                        <button wire:click.prevent="removeFee({{ $key }})">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="text-muted w-5 h-5" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                    <div>
                        <x-form.button class="" color="muted" wire:click.prevent="addFee()">Add addition fees</x-form.button>
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
