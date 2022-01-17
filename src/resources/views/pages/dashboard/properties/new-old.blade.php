<x-layouts.dashboard>
    <x-slot name="header">New Property</x-slot>
    <x-slot name="subheader">Fill out the information below to create a new property.</x-slot>

    <form method="POST" action="{{ route('dashboard.properties.post') }}" class="space-y-8 divide-y divide-gray-300" enctype="multipart/form-data">
        @csrf
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

                <div class="gap-y-6 gap-x-4 sm:grid-cols-6 grid grid-cols-1">
                    <div class="sm:col-span-4">
                        <div>
                            {{-- <label for="headline" class="block text-sm font-medium text-gray-700">Property Headline</label> --}}
                            <div class="mt-1">
                                <input type="text" name="headline" id="headline" class="focus:ring-blue-500 focus:border-blue-500 sm:text-sm block w-full border-gray-300 rounded-md shadow-sm" placeholder="Property Headline">
                            </div>
                        </div>
                    </div>
                    <div class="sm:col-span-6">
                        <div>
                            <div class="mt-1">
                                <textarea rows="4" name="description" id="description" class="focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm block w-full border-gray-300 rounded-md shadow-sm" placeholder="Property Description" maxlength="500"></textarea>
                                <p class="text-xs text-right text-gray-400" id="description_character_count_countainer"><span id="description_character_count">0</span> / 500 characters</p>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    var dropzone = new Dropzone('#demo-upload', {
                        previewTemplate: document.querySelector('#preview-template').innerHTML,
                        parallelUploads: 2,
                        thumbnailHeight: 120,
                        thumbnailWidth: 120,
                        maxFilesize: 3,
                        filesizeBase: 1000,
                        thumbnail: function(file, dataUrl) {
                            if (file.previewElement) {
                                file.previewElement.classList.remove("dz-file-preview");
                                var images = file.previewElement.querySelectorAll("[data-dz-thumbnail]");
                                for (var i = 0; i < images.length; i++) {
                                    var thumbnailElement = images[i];
                                    thumbnailElement.alt = file.name;
                                    thumbnailElement.src = dataUrl;
                                }
                                setTimeout(function() {
                                    file.previewElement.classList.add("dz-image-preview");
                                }, 1);
                            }
                        }

                    });


                    // Now fake the file upload, since GitHub does not handle file uploads
                    // and returns a 404

                    var minSteps = 6,
                        maxSteps = 60,
                        timeBetweenSteps = 100,
                        bytesPerStep = 100000;

                    dropzone.uploadFiles = function(files) {
                        var self = this;

                        for (var i = 0; i < files.length; i++) {

                            var file = files[i];
                            totalSteps = Math.round(Math.min(maxSteps, Math.max(minSteps, file.size / bytesPerStep)));

                            for (var step = 0; step < totalSteps; step++) {
                                var duration = timeBetweenSteps * (step + 1);
                                setTimeout(function(file, totalSteps, step) {
                                    return function() {
                                        file.upload = {
                                            progress: 100 * (step + 1) / totalSteps,
                                            total: file.size,
                                            bytesSent: (step + 1) * file.size / totalSteps
                                        };

                                        self.emit('uploadprogress', file, file.upload.progress, file.upload.bytesSent);
                                        if (file.upload.progress == 100) {
                                            file.status = Dropzone.SUCCESS;
                                            self.emit("success", file, 'success', null);
                                            self.emit("complete", file);
                                            self.processQueue();
                                            //document.getElementsByClassName("dz-success-mark").style.opacity = "1";
                                        }
                                    };
                                }(file, totalSteps, step), duration);
                            }
                        }
                    }
                </script>
                <form action="/target" class="dropzone" id="demo-upload">
                    <input type="file" name="file" />
                </form>

            </x-base.div-box>
        </div>

        {{-- <script>
            window.addEventListener('load', function() {
                var previewNode = document.querySelector("#template");
                previewNode.id = "";
                var previewTemplate = previewNode.parentNode.innerHTML;
                previewNode.parentNode.removeChild(previewNode);

                var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
                    url: "/target-url", // Set the url
                    thumbnailWidth: 80,
                    thumbnailHeight: 80,
                    parallelUploads: 20,
                    previewTemplate: previewTemplate,
                    autoQueue: false, // Make sure the files aren't queued until manually added
                    previewsContainer: "#previews", // Define the container to display the previews
                    clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
                });

                myDropzone.on("addedfile", function(file) {
                    // Hookup the start button
                    file.previewElement.querySelector(".start").onclick = function() {
                        myDropzone.enqueueFile(file);
                    };
                });

                // Update the total progress bar
                myDropzone.on("totaluploadprogress", function(progress) {
                    document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
                });

                myDropzone.on("sending", function(file) {
                    // Show the total progress bar when upload starts
                    document.querySelector("#total-progress").style.opacity = "1";
                    // And disable the start button
                    file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
                });

                // Hide the total progress bar when nothing's uploading anymore
                myDropzone.on("queuecomplete", function(progress) {
                    document.querySelector("#total-progress").style.opacity = "0";
                });

                // Setup the buttons for all transfers
                // The "add files" button doesn't need to be setup because the config
                // `clickable` has already been specified.
                document.querySelector("#actions .start").onclick = function() {
                    myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
                };
                document.querySelector("#actions .cancel").onclick = function() {
                    myDropzone.removeAllFiles(true);
                };
            })
        </script> --}}


    </form>

    <form action="" class="lg:grid-cols-8 grid hidden grid-cols-1 gap-6">
        <div class="lg:col-span-6">
            <label for="property_name" class="block ml-px font-medium text-gray-700">Property Headline</label>
            <div class="mt-1">
                <input type="text" name="property_name" id="property_name" class="focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-300 block w-full border-gray-300 rounded" placeholder="Ohana Burnside" aria-describedby="property_name_desc" autocomplete="{{ rand() }}">
            </div>
        </div>

        <div class="lg:col-span-6" data-controller="character-counter">
            <label for="property_description" class="block ml-px font-medium text-gray-700">Property Description</label>
            <div class="mt-1">
                <textarea rows="4" name="property_description" id="property_description" class="focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-300 block w-full border-gray-300 rounded" placeholder="Give a good description of this property" maxlength="500"></textarea>
            </div>
            <p class="mt-1 ml-px text-xs tracking-normal text-gray-400"><span id="property_description_count">0</span> / 500 characters</p>
        </div>

        <div class="lg:col-span-5">
            <label for="asdf" class="block ml-px font-medium text-gray-700">Property Address</label>
            <div class="mt-1">
                <input type="text" name="asdf" id="asdf" class="focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-300 block w-full border-gray-300 rounded" placeholder="123 Address Ave" aria-describedby="asdf_desc" autocomplete="{{ rand() }}">
            </div>
        </div>
        <div class="lg:col-span-1">
            <label for="asdf" class="block ml-px font-medium text-gray-700">Unit #</label>
            <div class="mt-1">
                <input type="text" name="asdf" id="asdf" class="focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-300 block w-full border-gray-300 rounded" placeholder="Optional" aria-describedby="asdf_desc" autocomplete="{{ rand() }}">
            </div>
        </div>
        <div class="lg:col-span-3">
            <label for="asdf" class="block ml-px font-medium text-gray-700">City</label>
            <div class="mt-1">
                <input type="text" name="asdf" id="asdf" class="focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-300 block w-full border-gray-300 rounded" placeholder="Lexington" aria-describedby="asdf_desc" autocomplete="{{ rand() }}">
            </div>
        </div>
        <div class="lg:col-span-2">
            <label for="asdf" class="block ml-px font-medium text-gray-700">State</label>
            <div class="mt-1">
                <select id="location" name="location" class="focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-300 block w-full border-gray-300 rounded">
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
                <input type="text" name="asdf" id="asdf" class="focus:ring-blue-500 focus:border-blue-500 placeholder:text-gray-300 block w-full border-gray-300 rounded" placeholder="40515" aria-describedby="asdf_desc" autocomplete="{{ rand() }}">
            </div>
        </div>
    </form>

    <script type="text/javascript">
        document.getElementById("description").addEventListener("input", ({
            currentTarget: target
        }) => {
            const maxLength = target.getAttribute("maxlength");
            const currentLength = target.value.length;
            document.getElementById("description_character_count").innerText = currentLength
            if (currentLength == maxLength) {
                document.getElementById("description_character_count_countainer").classList.remove('text-yellow-500')
                document.getElementById("description_character_count_countainer").classList.add('text-red-500')
            } else if ((maxLength - currentLength) < 50) {
                document.getElementById("description_character_count_countainer").classList.remove('text-red-500')
                document.getElementById("description_character_count_countainer").classList.add('text-yellow-500')
            } else {
                document.getElementById("description_character_count_countainer").classList.remove('text-yellow-500')
                document.getElementById("description_character_count_countainer").classList.remove('text-red-500')
            }
        });
    </script>
</x-layouts.dashboard>
