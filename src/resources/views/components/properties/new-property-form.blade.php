<div class="max-w-screen-sm">

    {{-- <form wire:submit.prevent="submit" method="POST"> --}}
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
                <x-form.ticker wireId="bedrooms" title="Bedrooms" desc="Number of bedrooms your property has" default="0" min="0" />
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
                <div>
                    <div class="z-10 w-full h-48 border-2 border-gray-300 border-dashed rounded">
                        {{-- <form action="" id="dropzone">
                            <input type="file" name="file" />
                            <div class="flex flex-col items-center justify-center h-full">
                                <div class="font-semibold">Drag and drop photos here</div>
                                <div class="text-muted text-sm">or tap here to select your photos</div>
                            </div>
                        </form> --}}
                        <form id="dropzone" method="post" enctype="multipart/form-data" class="dropzone dz-clickable" id="image-upload">
                            @csrf
                            <div class="dz-preview dz-file-preview">
                                <div class="dz-details">
                                    <div class="dz-filename"><span data-dz-name></span></div>
                                    <div class="dz-size" data-dz-size></div>
                                    <img data-dz-thumbnail />
                                </div>
                                <div class="dz-progress"><span class="dz-upload" data-dz-uploadprogress></span></div>
                                <div class="dz-success-mark"><span>✔</span></div>
                                <div class="dz-error-mark"><span>✘</span></div>
                                <div class="dz-error-message"><span data-dz-errormessage></span></div>
                            </div>
                        </form>
                    </div>
                    <script>
                        window.addEventListener('load', function() {
                            let myDropzone = new Dropzone("#dropzone", {
                                paramName: "CHANGEME",
                                url: "{{ route('upload') }}",

                            });
                            myDropzone.on("addedfile", file => {
                                console.log(`File added: ${file.name}`);
                            });
                        })
                    </script>
                </div>
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
            <button type="submit" class="w-full px-3 py-2 space-x-2 font-medium leading-6 text-white bg-blue-600 rounded">
                <span>Save Property</span>
            </button>
        </div>
    </div>

    {{-- </form> --}}


    {{-- <x-base.div-box class="-mx-6 rounded-none">
        <div class="space-y-5">
            <x-base.heading title="Location" desc="Where is your property located?" />
            <div class="grid grid-cols-3 gap-5">
                <x-form.text-field wireId="address" title="Address" placeholder="1834 Wake Forest Rd" class="col-span-2" />
                <x-form.text-field wireId="unit" title="Unit" placeholder="321" optional />
            </div>
            <div class="grid grid-cols-2 gap-5">
                <x-form.text-field wireId="city" title="City" placeholder="Winston-Salem" />
                <x-form.dropdown wireId="state" title="State" placeholder="Select a state..." :options="['AL' => 'Alabama', 'AK' => 'Alaska', 'AZ' => 'Arizona', 'AR' => 'Arkansas', 'CA' => 'California', 'CO' => 'Colorado', 'CT' => 'Connecticut', 'DE' => 'Delaware', 'FL' => 'Florida', 'GA' => 'Georgia', 'HI' => 'Hawaii', 'ID' => 'Idaho', 'IL' => 'Illinois', 'IN' => 'Indiana', 'IA' => 'Iowa', 'KS' => 'Kansas', 'KY' => 'Kentucky', 'LA' => 'Louisiana', 'ME' => 'Maine', 'MD' => 'Maryland', 'MA' => 'Massachusetts', 'MI' => 'Michigan', 'MN' => 'Minnesota', 'MS' => 'Mississippi', 'MO' => 'Missouri', 'MT' => 'Montana', 'NE' => 'Nebraska', 'NV' => 'Nevada', 'NH' => 'New Hampshire', 'NJ' => 'New Jersey', 'NM' => 'New Mexico', 'NY' => 'New York', 'NC' => 'North Carolina', 'ND' => 'North Dakota', 'OH' => 'Ohio', 'OK' => 'Oklahoma', 'OR' => 'Oregon', 'PA' => 'Pennsylvania', 'RI' => 'Rhode Island', 'SC' => 'South Carolina', 'SD' => 'South Dakota', 'TN' => 'Tennessee', 'TX' => 'Texas', 'UT' => 'Utah', 'VT' => 'Vermont', 'VA' => 'Virginia', 'WA' => 'Washington', 'WV' => 'West Virginia', 'WI' => 'Wisconsin', 'WY' => 'Wyoming']" />
                <x-form.text-field wireId="zip" title="Zip / Postal Code" placeholder="27109" />
                <x-form.dropdown wireId="country" title="Country" :options="['US' => 'United States', '' => 'Other']" />
            </div>
        </div>
    </x-base.div-box>
    <x-base.div-box>
        <x-base.heading title="Property Details" desc="Add details about your property" />
        <div class="space-y-5">
            <x-form.dropdown wireId="type" title="Property Type" placeholder="Select a type..." :options="['house' => 'House', 'apartment' => 'Apartment', 'other' => 'Other', ]" />
            <x-form.ticker wireId="guests" title="Guests" desc="Number of guests" default="1" min="1" max="16" />
            <x-form.ticker wireId="bedrooms" title="Bedrooms" desc="Number of bedrooms" default="1" min="1" />
            <x-form.ticker wireId="bathrooms" title="Bathrooms" desc="Number of bathrooms" default="1" min="1" />
        </div>
    </x-base.div-box>
    <x-base.div-box class="space-y-5">
        <x-base.heading title="Listing Details" desc="Edit your listing below" />
        <x-form.text-field wireId="headline" title="Listing Headline" placeholder="Cheerful 5-bedroom residential home with hot tub" />
        <x-form.textarea wireId="desc" title="Listing Description" placeholder="Come relax with the whole family at this peaceful place to stay" />
    </x-base.div-box>
    <div>
        <button wire:click="submit" type="button" class="w-full px-3 py-2 font-medium leading-6 text-white bg-blue-600 rounded">Save Property</button>
    </div> --}}
</div>
