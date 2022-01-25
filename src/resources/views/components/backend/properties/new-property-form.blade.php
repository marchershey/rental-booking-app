<div class="max-w-screen-sm">

    <div class="space-y-5">
        <x-base.div-box class="">
            <x-base.heading title="Location" desc="Where is your property located?" />
            <div class="grid grid-cols-12 gap-5">
                <x-form.text-field wireId="address" title="Address" placeholder="1834 Wake Forest Rd" class="col-span-8" />
                <x-form.text-field wireId="unit" title="Unit" placeholder="1A" optional class="col-span-4" />
                <x-form.text-field wireId="city" title="City" placeholder="Winston-Salem" class="col-span-12" />
                <x-form.dropdown wireId="state" title="State" placeholder="Select a state..." class="col-span-8" default="AK" :options="['AL' => 'Alabama', 'AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas', 'CA' => 'California', 'CO' => 'Colorado', 'CT' => 'Connecticut', 'DE' => 'Delaware', 'FL' => 'Florida', 'GA' => 'Georgia', 'HI' => 'Hawaii', 'ID' => 'Idaho', 'IL' => 'Illinois', 'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas', 'KY' => 'Kentucky', 'LA' => 'Louisiana', 'ME' => 'Maine', 'MD' => 'Maryland', 'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota', 'MS' => 'Mississippi', 'MO' => 'Missouri', 'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada', 'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NY' => 'New York', 'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio', 'OK' => 'Oklahoma', 'OR' => 'Oregon', 'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina', 'SD' => 'South Dakota', 'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah', 'VT' => 'Vermont', 'VA' => 'Virginia', 'WA' => 'Washington', 'WV' => 'West Virginia', 'WI' => 'Wisconsin', 'WY' => 'Wyoming']" />
                <x-form.text-field wireId="zip" title="Zip" placeholder="27109" class="col-span-4" />
            </div>
        </x-base.div-box>

        <x-base.div-box>
            <x-base.heading title="Property Details" desc="Add details about your property" />
            <div class="space-y-5">
                <x-form.dropdown wireId="type" title="Property Type" placeholder="Select a type..." :options="['house' => 'House', 'apartment' => 'Apartment', 'other' => 'Other', ]" />
                <x-form.ticker wireId="guests" title="Guests" desc="Amount of guests your property can house" default="1" min="1" max="16" />
                <x-form.ticker wireId="bedrooms" title="Bedrooms" desc="Number of bedrooms your property has" default="1" min="0" />
                <x-form.ticker wireId="beds" title="Beds" desc="Number of beds your property has" default="1" min="0" />
                <x-form.ticker wireId="bathrooms" title="Bathrooms" desc="Number of bathrooms your property has" default="0" min="0" step="0.5" />
            </div>
        </x-base.div-box>
        <x-base.div-box>
            <x-base.heading title="Listing Details" desc="Edit your listing below" />
            <div class="space-y-5">
                <x-form.text-field wireId="listing_headline" title="Listing Headline" placeholder="Cheerful 5-bedroom residential home with hot tub" max="100" />
                <x-form.textarea wireId="listing_desc" title="Listing Description" placeholder="Come relax with the whole family at this peaceful place to stay" max="500" />
                <div class="grid grid-cols-2 gap-5">
                    <x-form.text-field wireId="listing_rating" title="Rating" desc="Enter the current rating" placeholder="4.9" optional />
                    <x-form.text-field wireId="listing_rating_count" title="Ratings Count" desc="Enter the amount of ratings" placeholder="259" optional />
                </div>
            </div>
        </x-base.div-box>

        <x-base.div-box>
            <x-base.heading title="Photos" desc="Upload some of your photos of the property" />
            <div class="space-y-5">
                <div x-data="{ progress: 0 }" x-on:livewire-upload-progress="progress = $event.detail.progress">
                    <div class="md:flex-row md:space-x-5 md:space-y-0 md:items-center md:justify-between flex flex-col space-y-2">
                        <div class="flex-shrink-none">
                            <input type="file" accept="image/*" wire:model="stagedPhotos" multiple class="focus:outline-none focus:ring">
                        </div>
                        <div wire:loading.remove wire:target="stagedPhotos" class="text-muted text-xs">
                            Max 30 photos, 20MB
                        </div>
                        <div class="bg-blue-50 relative w-full h-5 overflow-hidden rounded-full" wire:loading wire:target="photos">
                            <div class="whitespace-nowrap absolute p-1 text-xs font-medium leading-none text-center text-white bg-blue-600 rounded-l-full" :style="{ 'width': progress + '%'}"> <span x-text="progress" class=""></span> %</div>
                        </div>
                    </div>
                </div>
                @if ($stagedPhotos)
                    <div>
                        <ul role="list" class="sm:grid-cols-3 sm:gap-5 lg:grid-cols-3 grid grid-cols-2 gap-3">
                            @foreach ($stagedPhotos as $key => $photo)
                                <li class="group relative cursor-pointer" wire:click="removeImage({{ $key }})">
                                    <div class="aspect-w-3 aspect-h-2 group-hover:border-red-500 block w-full overflow-hidden bg-gray-100 border border-transparent rounded-lg">
                                        <img src="{{ $photo->temporaryUrl('test') }}" alt="" class="group-hover:scale-105 group-hover:-rotate-1 object-cover object-center w-full transition-transform duration-1000 ease-in-out pointer-events-none @if ($loop->iteration > $maxPhotos) opacity-25 @endif">
                                    </div>
                                    <div class="flex items-center justify-between mt-1">
                                        <div class="truncate">
                                            <p class="group-hover:text-red-500 block w-full text-sm font-medium truncate pointer-events-none">{{ $photo->getClientOriginalName() }}</p>
                                            <div class="text-muted text-xs">
                                                <p class="group-hover:hidden block">
                                                    @if ($loop->iteration > $maxPhotos)
                                                        <span class="italic">This will not be uploaded</span>
                                                    @else
                                                        <span>{{ number_format($photo->getSize() / 1000 / 1000, 3) }} MB</span>
                                                    @endif
                                                </p>
                                                <p class="group-hover:block hidden">Remove this photo...</p>
                                            </div>
                                        </div>
                                        <div class="p-1 pr-0 mt-1">
                                            <svg class="group-hover:text-red-500 w-7 h-7 sm:w-5 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </x-base.div-box>

        @if (count($errors->all()) > 0)
            <div class="bg-red-50 p-4 rounded-md">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="w-5 h-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">
                            Please fix the following error(s):
                        </h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul role="list" class="pl-5 space-y-1 list-disc">
                                @foreach ($errors->all() as $error)
                                    <li>
                                        {{ $error }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <div>
            <button wire:click.prevent="submit" type="button" class="disabled:bg-gray-400 w-full px-3 py-2 space-x-2 font-medium leading-6 text-white bg-blue-600 rounded" @if ($errors->any()) disabled @endif>
                <span>Save Property</span>
            </button>
        </div>
    </div>
</div>
