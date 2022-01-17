<x-layouts.dashboard>
    <x-slot name="header">New Property</x-slot>
    <x-slot name="subheader">Fill out the information below to create a new property.</x-slot>

    <form class="space-y-8 divide-y divide-gray-300">
        <div class="space-y-8 divide-y divide-gray-300">
            <x-base.div-box class="rounded-lg">
                <div class="mb-5">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        General Information
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Fill out the general information about your property.
                    </p>
                </div>

                <div class="grid grid-cols-1 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-4">
                        <div>
                            {{-- <label for="headline" class="block text-sm font-medium text-gray-700">Property Headline</label> --}}
                            <div class="mt-1">
                                <input type="text" name="headline" id="headline" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm" placeholder="Property Headline">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <div>
                            <div class="mt-1">
                                <textarea rows="4" name="comment" id="comment" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Property Description"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="mt-1 sm:mt-0 sm:col-span-6">
                        <div class="flex justify-center max-w-lg px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                            <div class="space-y-1 text-center">
                                <svg class="w-12 h-12 mx-auto text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-gray-600">
                                    <label for="file-upload" class="relative font-medium text-indigo-600 bg-white rounded-md cursor-pointer hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500">
                                        <span>Upload a file</span>
                                        <input id="file-upload" name="file-upload" type="file" class="sr-only">
                                    </label>
                                    <p class="pl-1">or drag and drop</p>
                                </div>
                                <p class="text-xs text-gray-500">
                                    PNG, JPG, GIF up to 10MB
                                </p>
                            </div>
                        </div>
                    </div>


                </div>
            </x-base.div-box>

            <div class="pt-8">
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Personal Information
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        Use a permanent address where you can receive mail.
                    </p>
                </div>
                <div class="grid grid-cols-1 mt-6 gap-y-6 gap-x-4 sm:grid-cols-6">
                    <div class="sm:col-span-3">
                        <label for="first-name" class="block text-sm font-medium text-gray-700">
                            First name
                        </label>
                        <div class="mt-1">
                            <input type="text" name="first-name" id="first-name" autocomplete="given-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="last-name" class="block text-sm font-medium text-gray-700">
                            Last name
                        </label>
                        <div class="mt-1">
                            <input type="text" name="last-name" id="last-name" autocomplete="family-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">
                            Email address
                        </label>
                        <div class="mt-1">
                            <input id="email" name="email" type="email" autocomplete="email" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="sm:col-span-3">
                        <label for="country" class="block text-sm font-medium text-gray-700">
                            Country
                        </label>
                        <div class="mt-1">
                            <select id="country" name="country" autocomplete="country-name" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option>United States</option>
                                <option>Canada</option>
                                <option>Mexico</option>
                            </select>
                        </div>
                    </div>

                    <div class="sm:col-span-6">
                        <label for="street-address" class="block text-sm font-medium text-gray-700">
                            Street address
                        </label>
                        <div class="mt-1">
                            <input type="text" name="street-address" id="street-address" autocomplete="street-address" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="city" class="block text-sm font-medium text-gray-700">
                            City
                        </label>
                        <div class="mt-1">
                            <input type="text" name="city" id="city" autocomplete="address-level2" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="region" class="block text-sm font-medium text-gray-700">
                            State / Province
                        </label>
                        <div class="mt-1">
                            <input type="text" name="region" id="region" autocomplete="address-level1" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <label for="postal-code" class="block text-sm font-medium text-gray-700">
                            ZIP / Postal code
                        </label>
                        <div class="mt-1">
                            <input type="text" name="postal-code" id="postal-code" autocomplete="postal-code" class="block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-8">
                <div>
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Notifications
                    </h3>
                    <p class="mt-1 text-sm text-gray-500">
                        We'll always let you know about important changes, but you pick what else you want to hear about.
                    </p>
                </div>
                <div class="mt-6">
                    <fieldset>
                        <legend class="text-base font-medium text-gray-900">
                            By Email
                        </legend>
                        <div class="mt-4 space-y-4">
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="comments" name="comments" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="comments" class="font-medium text-gray-700">Comments</label>
                                    <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                </div>
                            </div>
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="candidates" name="candidates" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="candidates" class="font-medium text-gray-700">Candidates</label>
                                    <p class="text-gray-500">Get notified when a candidate applies for a job.</p>
                                </div>
                            </div>
                            <div class="relative flex items-start">
                                <div class="flex items-center h-5">
                                    <input id="offers" name="offers" type="checkbox" class="w-4 h-4 text-indigo-600 border-gray-300 rounded focus:ring-indigo-500">
                                </div>
                                <div class="ml-3 text-sm">
                                    <label for="offers" class="font-medium text-gray-700">Offers</label>
                                    <p class="text-gray-500">Get notified when a candidate accepts or rejects an offer.</p>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="mt-6">
                        <div>
                            <legend class="text-base font-medium text-gray-900">
                                Push Notifications
                            </legend>
                            <p class="text-sm text-gray-500">These are delivered via SMS to your mobile phone.</p>
                        </div>
                        <div class="mt-4 space-y-4">
                            <div class="flex items-center">
                                <input id="push-everything" name="push-notifications" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                <label for="push-everything" class="block ml-3 text-sm font-medium text-gray-700">
                                    Everything
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="push-email" name="push-notifications" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                <label for="push-email" class="block ml-3 text-sm font-medium text-gray-700">
                                    Same as email
                                </label>
                            </div>
                            <div class="flex items-center">
                                <input id="push-nothing" name="push-notifications" type="radio" class="w-4 h-4 text-indigo-600 border-gray-300 focus:ring-indigo-500">
                                <label for="push-nothing" class="block ml-3 text-sm font-medium text-gray-700">
                                    No push notifications
                                </label>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="pt-5">
            <div class="flex justify-end">
                <button type="button" class="px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Cancel
                </button>
                <button type="submit" class="inline-flex justify-center px-4 py-2 ml-3 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                    Save
                </button>
            </div>
        </div>
    </form>

    <form action="" class="grid hidden grid-cols-1 gap-6 lg:grid-cols-8">
        <div class="lg:col-span-6">
            <label for="property_name" class="block ml-px font-medium text-gray-700">Property Headline</label>
            <div class="mt-1">
                <input type="text" name="property_name" id="property_name" class="block w-full border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-300" placeholder="Ohana Burnside" aria-describedby="property_name_desc" autocomplete="{{ rand() }}">
            </div>
        </div>

        <div class="lg:col-span-6" data-controller="character-counter">
            <label for="property_description" class="block ml-px font-medium text-gray-700">Property Description</label>
            <div class="mt-1">
                <textarea rows="4" name="property_description" id="property_description" class="block w-full border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-300" placeholder="Give a good description of this property" maxlength="500"></textarea>
            </div>
            <p class="mt-1 ml-px text-xs tracking-normal text-gray-400"><span id="property_description_count">0</span> / 500 characters</p>
        </div>

        <div class="lg:col-span-5">
            <label for="asdf" class="block ml-px font-medium text-gray-700">Property Address</label>
            <div class="mt-1">
                <input type="text" name="asdf" id="asdf" class="block w-full border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-300" placeholder="123 Address Ave" aria-describedby="asdf_desc" autocomplete="{{ rand() }}">
            </div>
        </div>
        <div class="lg:col-span-1">
            <label for="asdf" class="block ml-px font-medium text-gray-700">Unit #</label>
            <div class="mt-1">
                <input type="text" name="asdf" id="asdf" class="block w-full border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-300" placeholder="Optional" aria-describedby="asdf_desc" autocomplete="{{ rand() }}">
            </div>
        </div>
        <div class="lg:col-span-3">
            <label for="asdf" class="block ml-px font-medium text-gray-700">City</label>
            <div class="mt-1">
                <input type="text" name="asdf" id="asdf" class="block w-full border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-300" placeholder="Lexington" aria-describedby="asdf_desc" autocomplete="{{ rand() }}">
            </div>
        </div>
        <div class="lg:col-span-2">
            <label for="asdf" class="block ml-px font-medium text-gray-700">State</label>
            <div class="mt-1">
                <select id="location" name="location" class="block w-full border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-300">
                    <option value="">Select a state...</option>
                    <option value="AL">Alabama</option>
                    <option value="AK">Alaska</option>
                    <option value="AZ">Arizona</option>
                    <option value="AR">Arkansas</option>
                    <option value="CA">California</option>
                    <option value="CO">Colorado</option>
                    <option value="CT">Connecticut</option>
                    <option value="DE">Delaware</option>
                    <option value="DC">District Of Columbia</option>
                    <option value="FL">Florida</option>
                    <option value="GA">Georgia</option>
                    <option value="HI">Hawaii</option>
                    <option value="ID">Idaho</option>
                    <option value="IL">Illinois</option>
                    <option value="IN">Indiana</option>
                    <option value="IA">Iowa</option>
                    <option value="KS">Kansas</option>
                    <option value="KY">Kentucky</option>
                    <option value="LA">Louisiana</option>
                    <option value="ME">Maine</option>
                    <option value="MD">Maryland</option>
                    <option value="MA">Massachusetts</option>
                    <option value="MI">Michigan</option>
                    <option value="MN">Minnesota</option>
                    <option value="MS">Mississippi</option>
                    <option value="MO">Missouri</option>
                    <option value="MT">Montana</option>
                    <option value="NE">Nebraska</option>
                    <option value="NV">Nevada</option>
                    <option value="NH">New Hampshire</option>
                    <option value="NJ">New Jersey</option>
                    <option value="NM">New Mexico</option>
                    <option value="NY">New York</option>
                    <option value="NC">North Carolina</option>
                    <option value="ND">North Dakota</option>
                    <option value="OH">Ohio</option>
                    <option value="OK">Oklahoma</option>
                    <option value="OR">Oregon</option>
                    <option value="PA">Pennsylvania</option>
                    <option value="RI">Rhode Island</option>
                    <option value="SC">South Carolina</option>
                    <option value="SD">South Dakota</option>
                    <option value="TN">Tennessee</option>
                    <option value="TX">Texas</option>
                    <option value="UT">Utah</option>
                    <option value="VT">Vermont</option>
                    <option value="VA">Virginia</option>
                    <option value="WA">Washington</option>
                    <option value="WV">West Virginia</option>
                    <option value="WI">Wisconsin</option>
                    <option value="WY">Wyoming</option>
                </select>
            </div>
        </div>
        <div class="lg:col-span-1">
            <label for="asdf" class="block ml-px font-medium text-gray-700">Zip</label>
            <div class="mt-1">
                <input type="text" name="asdf" id="asdf" class="block w-full border-gray-300 rounded focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-300" placeholder="40515" aria-describedby="asdf_desc" autocomplete="{{ rand() }}">
            </div>
        </div>
    </form>

    <script type="text/javascript">
        document.getElementById("property_description").addEventListener("input", ({
            currentTarget: target
        }) => {
            const maxLength = target.getAttribute("maxlength");
            const currentLength = target.value.length;
            document.getElementById("property_description_count").innerText = currentLength
        });
    </script>
</x-layouts.dashboard>
