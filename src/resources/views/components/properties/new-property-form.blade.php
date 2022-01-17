<div class="max-w-screen-sm space-y-5">
    <x-base.div-box class="-mx-6 rounded-none">
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
    </div>
</div>
