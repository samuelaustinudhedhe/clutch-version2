<section class="bg-white py-8 antialiased dark:bg-gray-900">

    <form action="#" class="mx-auto max-w-screen-xl px-4 2xl:px-0" wire:submit.prevent="createUser">

        <h2 class="text-xl text-gray-900 dark:text-white sm:text-2xl">Create New User</h2>

        <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-6">
            <div class="mt-6 min-w-0 flex-1 space-y-6 sm:mt-8 lg:mt-0 ">

                {{-- User Personal details form --}}
                <div
                    class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <p class="text-xl text-gray-900 dark:text-white">User Details</p>
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div class="sm:col-span-2 py-4">
                            <div class="items-center w-full sm:flex">
                                <img class="mb-4 w-20 h-20 rounded-full sm:mr-4 sm:mb-0 object-cover"
                                    src="{{ $profile_photo ? $profile_photo->temporaryUrl() : 'https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/helene-engels.png' }}"
                                    alt="User Profile Picture">
                                <div class="w-full">
                                    <x-xinput id="profile_photo" wire:model="profile_photo"
                                        class="w-full text-sm cursor-pointer !p-0" aria-describedby="profile_photo_help" type="file" />
                                    <p class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-300"
                                        id="profile_photo_help">WEBP, PNG, JPG or GIF (MAX. 800x400px).</p>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <x-label for="firstName">First Name</x-label>
                            <x-xinput id="firstName" type="text" wire:model="firstName" />
                            
                            <x-input-error for="firstName" />
                        </div>
                        <div class="mb-4">
                            <x-label for="lastName">Last Name</x-label>
                            <x-xinput id="lastName" type="text" wire:model="lastName" />
                            
                            <x-input-error for="lastName" />

                        </div>

                        <div class="mb-4 sm:col-span-2 flex gap-4 items-start">
                            <div class="w-1/3">
                                <x-label for="email-status" class="inline-flex items-center">
                                    Email Status
                                    <button type="button" data-tooltip-target="tooltip-email-status" data-tooltip-style="dark" class="ml-1">
                                        <svg aria-hidden="true" class="ml-1 w-4 h-4 text-gray-400 dark:text-gray-500 hover:text-gray-900 dark:hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg>
                                        <span class="sr-only">Email status details</span>
                                    </button>
                                    <div id="tooltip-email-status" role="tooltip" class="inline-block absolute invisible z-10 py-2 px-3 max-w-sm text-xs font-normal text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                        As an administrator, you can view the status of a user's email. The status indicates whether a user's email is verified or not.
                                        <div class="tooltip-arrow" data-popper-arrow></div>
                                    </div>
                                </x-label>
                                <select id="email-status" wire:model="email_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option selected="not verified">Not verified</option>
                                    <option value="verified">Verified</option>
                                </select>
                            </div>
                            <div class="w-2/3">
                                <x-label for="email" class="mt-1">Email</x-label>
                                <x-xinput id="email" type="email" wire:model="email" />

                                <x-input-error for="email" />

                            </div>
                        </div>
                        <div class="sm:col-span-2 mb-4 flex gap-4">
                            <div class="w-1/3">
                                <x-label for="country_code">Country Code</x-label>
                                <select id="country_code"  wire:model="country_code" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option>Select a Code</option>
                                    @foreach($countries as $country)
                                        @if(isset($country['idd']['root']) && isset($country['idd']['suffixes']))
                                            <option value="{{ $country['idd']['root'] . $country['idd']['suffixes'][0] }}">
                                                {{ $country['name']['common'] }} ({{ $country['idd']['root'] . $country['idd']['suffixes'][0] }})
                                            </option>
                                        @endif
                                    @endforeach                                    
                                </select>
                                <x-input-error for="country_code" />
                            </div>

                            <div class="w-2/3">
                                <x-label for="phone">Phone</x-label>
                                <x-xinput id="phone" type="number" wire:model="phone" />

                                <x-input-error for="phone" />

                            </div>
                        </div>

                        <div class="mb-4">
                            <x-label for="password">Password</x-label>
                            <x-xinput id="password" type="password" wire:model="password" />

                            <x-input-error for="password" />
                        </div>

                        <div class="mb-4">
                            <x-label for="password_confirmation">Confirm Password</x-label>
                            <x-xinput id="password_confirmation" type="password" wire:model="password_confirmation"/>
                            
                            <x-input-error for="password_confirmation" />

                        </div>
                    </div>
                </div>

                <div
                    class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <p class="text-xl text-gray-900 dark:text-white">Personal Details</p>

                    {{-- Additional info --}}
                    <div class="grid gap-4 sm:grid-cols-2">
                        <div>
                            <x-label for="date-of-birth">Date of Birth</x-label>
                            
                            <div class="relative w-full">
                                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <x-xinput datepicker type="text" id="date-of-birth" class="pl-10" wire:model="date_of_birth" placeholder="Select date" />
                                <x-input-error for="date_of_birth" />
                            </div>
                        </div>
                        <div>
                            <x-label for="gender">Gender</x-label> 
                            <x-select name="gender" wire:model="gender" id="gender" >
                                <option selected value="">Select gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </x-select>
                            <x-input-error for="gender" />
                        </div>
                    </div>
                    <script src="https://unpkg.com/flowbite@1.5.3/dist/datepicker.js"></script>

                    <p class="text-xl text-gray-900 dark:text-white">Address</p>

                    <div class="mb-4">
                        <x-label for="street-address">Street</x-label>
                        <x-xinput type="text" wire:model="street" id="street-address" name="street-address" />
                        <x-input-error for="street" />
                    </div>

                    <div class="mb-4">
                        <x-label for="apt-unit">Apt/Unit Number</x-label>
                        <x-xinput type="text" wire:model="house" id="apt-unit" name="apt-unit" />
                        <x-input-error for="house" />
                    </div>
                    <div class="sm:col-span-2 mb-4 flex gap-4">

                        <div class="w-2/4">
                            <x-label for="city">City</x-label>
                            <x-xinput type="text" wire:model="city" id="city" name="city" />
                            <x-input-error for="city" />
                        </div>

                        <div class="w-2/4">
                            <x-label for="state">State/Province</x-label>
                            <x-xinput type="text"  wire:model="state" id="state" name="state" />
                            <x-input-error for="state" />
                        </div>
                    </div>
                    <div class="sm:col-span-2 mb-4 flex gap-4">
                        <div class="w-2/4">
                            <x-label for="postal-code">Postal/Zip Code</x-label>
                            <x-xinput type="text" wire:model="zip_code" id="postal-code" name="postal-code"  />
                            <x-input-error for="postal-code" />
                        </div>

                        <div class="w-2/4">
                            <x-label for="country">Country</x-label>
                            <x-xinput type="text" wire:model="country" id="country" name="country" />
                            <x-input-error for="country" />
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right Content --}}
            <div class="w-full space-y-4 sm:space-y-6 lg:max-w-sm xl:max-w-lg">
                
                {{-- User Type --}}
                <div
                    class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <div class="mb-2 flex items-center gap-1">
                        <p class="text-lg text-gray-900 dark:text-white">
                            User Type
                        </p>
                        <svg class="h-4 w-4 text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            data-tooltip-target="role-type-desc-1" data-tooltip-trigger="hover" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        <div id="role-type-desc-1" role="tooltip"
                            class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                            Select a user type to create a new user.
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>

                    {{-- Roles Radio --}}
                    <div id="roles" class="grid grid-cols-1 gap-4">
                        @foreach ($roles as $role)
                            <div data-tooltip-target="{{ $role->slug . 'tooltip' . $role->id }}" data-tooltip-trigger="hover">

                                <x-radio id="{{ $role->slug }}" wire:model="role" name="role" value="{{ $role->slug }}" >
                                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="w-full">{{ $role->name }}</span>
                                </x-radio>

                            </div>
                            <div id="{{ $role->slug . 'tooltip' . $role->id }}" role="tooltip"
                                class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                {{ $role->description ?? 'Change user type to ' . $role->name }}
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        @endforeach
                        <x-input-error for="role" />
                    </div>
                </div>

                
                {{-- User Status --}}
                <div
                    class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <div class="mb-2 flex items-center gap-1">
                        <p class="text-lg text-gray-900 dark:text-white">
                            User Status
                        </p>
                        <svg class="h-4 w-4 text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            data-tooltip-target="role-type-desc-1" data-tooltip-trigger="hover" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        <div id="role-type-desc-1" role="tooltip"
                            class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                            Select a user type to create a new user.
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>
                    <div class="mb-6 mb-6 gap-4 text-sm sm:grid-cols-2 grid">
                        <x-radio id="active" name="status" value="active" wire:model="status" color="green" >
                            <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>               
                            <span class="w-full">Active</span>
                        </x-radio>

                        <x-radio id="inactive" name="status" value="inactive"  wire:model="status" color="dark:peer-checked:text-zinc-100 peer-checked:border-zinc-300 peer-checked:text-zinc-300" >
                            <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                            </svg>
                            <span class="w-full">Inactive</span>
                        </x-radio>

                        <x-radio id="suspended" name="status" value="suspended"  wire:model="status" color="pink">
                            <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>
                              </svg>
                            <span class="w-full">Suspended</span>
                        </x-radio>
                    </div>
                    <x-input-error for="status" />
                </div>
                <div class="space-y-4 sm:space-y-6">
                    <div
                        class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">

                        <p class="text-lg text-gray-900 dark:text-white">Social Account</p>

                        {{-- Social Links --}}
                        <div class="grid gap-4 mt-6">
                            <div class="mb-4 flex items-center gap-4">
                                <x-label for="facebook" class="w-1/4">Facebook:</x-label>
                                <x-xinput type="text" wire:model="facebook" id="facebook" name="facebook" class="w-3/4" placeholder="https://facebook.com/username" />
                            </div>
                            <div class="mb-4 flex items-center gap-4">
                                <x-label for="twitter" class="w-1/4">X (Twitter):</x-label>
                                <x-xinput type="text" wire:model="twitter" id="twitter" name="twitter" class="w-3/4" placeholder="https://x.com/username" />
                            </div>
                            <div class="mb-4 flex items-center gap-4">
                                <x-label for="instagram" class="w-1/4">Instagram:</x-label>
                                <x-xinput type="text" wire:model="instagram" id="instagram" name="instagram" class="w-3/4"  placeholder="https://instagram.com/username"/>
                            </div>
                            <div class="mb-4 flex items-center gap-4">
                                <x-label for="linkedin" class="w-1/4">LinkedIn:</x-label>
                                 <x-xinput type="text" wire:model="linkedin" id="linkedin" name="linkedin" class="w-3/4"  placeholder="https://linkedin.com/username"/>
                            </div>
                        </div>
                    </div>
                </div>

                <div
                    class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </form>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDHrouXMU1tozzlEpqq5IYFT1fEczaYFMk&libraries=places"></script>
    <script>
        function initAutocomplete() {
          var autocomplete = new google.maps.places.Autocomplete(document.getElementById('street-address'), {
            types: ['address']
          });
      
          autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
      
            // Initialize empty variables
            var streetAddress = '';
            var city = '';
            var state = '';
            var postalCode = '';
            var country = '';
      
            if (place.address_components) {
              place.address_components.forEach(function(component) {
                var componentType = component.types[0];
                
                if (componentType === 'street_number') {
                  streetAddress += component.long_name + ' ';
                } else if (componentType === 'route') {
                  streetAddress += component.long_name;
                } else if (componentType === 'locality') {
                  city = component.long_name;
                } else if (componentType === 'administrative_area_level_1') {
                  state = component.short_name;
                } else if (componentType === 'postal_code') {
                  postalCode = component.long_name;
                } else if (componentType === 'country') {
                  country = component.long_name;
                }
              });
            }
      
            document.getElementById('street-address').value = streetAddress.trim();
            document.getElementById('city').value = city;
            document.getElementById('state').value = state;
            document.getElementById('postal-code').value = postalCode;
            document.getElementById('country').value = country;
          });
      
          var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: { lat: -34.397, lng: 150.644 } // Default center
          });
      
          autocomplete.addListener('place_changed', function() {
            var place = autocomplete.getPlace();
            if (!place.geometry) {
              return;
            }
      
            if (place.geometry.viewport) {
              map.fitBounds(place.geometry.viewport);
            } else {
              map.setCenter(place.geometry.location);
              map.setZoom(17);  // Adjust the zoom level as needed
            }
      
            new google.maps.Marker({
              map: map,
              position: place.geometry.location
            });
          });
        }
      
        google.maps.event.addDomListener(window, 'load', initAutocomplete);
      
    </script>
      
    
</section>
