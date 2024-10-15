@props([
    'disabled' => false,
    'id' => 'address',
    'label' => 'Address',
    'labelClass' => '',
    'errorClass' => '',
    'address' => 'address',
    'loadJS' => false,
])

<div class="mb-4"
    @if ($loadJS == true) 
        x-data="{
            initAddressAutocomplete(input) {
                // Remove existing pac-container
                const existingPacContainers = document.querySelectorAll('.pac-container');
                existingPacContainers.forEach(container => container.remove());

                // Initialize Google Maps Autocomplete
                const autocomplete = new google.maps.places.Autocomplete(input);
                autocomplete.setOptions({
                    types: ['geocode'],
                    strictBounds: false
                });

                // Event listener for when a place is selected from autocomplete suggestion
                autocomplete.addListener('place_changed', () => {
                    const place = autocomplete.getPlace();
                    this.handlePlaceChange(place, input);
                });

                // Event listener for manual typing (blur event or Enter key)
                input.addEventListener('blur', async () => {
                    const inputValue = input.value;
                    if (inputValue && !autocomplete.getPlace()) {
                        const geocoder = new google.maps.Geocoder();
                        const result = await this.geocodeAddress(geocoder, inputValue);
                        if (result) {
                            this.handlePlaceChange(result, input);
                        }
                    }
                    // Close suggestion box on blur
                    this.closeSuggestionBox();
                });

                // Ensure that suggestion box does not reopen on focusout
                input.addEventListener('focusout', (event) => {
                    this.closeSuggestionBox(); // Close suggestion box when clicking outside the input field
                });

                // Optional: handle Enter key press
                input.addEventListener('keypress', async (event) => {
                    if (event.key === 'Enter') {
                        event.preventDefault();  // Prevent form submission on Enter
                        const inputValue = input.value;
                        if (inputValue && !autocomplete.getPlace()) {
                            const geocoder = new google.maps.Geocoder();
                            const result = await this.geocodeAddress(geocoder, inputValue);
                            if (result) {
                                this.handlePlaceChange(result, input);
                            }
                        }
                    }
                });
            },

            // Function to close the Google suggestion box manually
            closeSuggestionBox() {
                const pacContainer = document.querySelector('.pac-container');
                if (pacContainer) {
                    pacContainer.style.display = 'none';
                }
            },

            async geocodeAddress(geocoder, address) {
                return new Promise((resolve, reject) => {
                    geocoder.geocode({ 'address': address }, (results, status) => {
                        if (status === 'OK' && results[0]) {
                            resolve(results[0]);
                        } else {
                            reject(new Error('Geocode was not successful: ' + status));
                        }
                    });
                });
            },

            handlePlaceChange(place, input) {
                // Extract address components
                let street = '',
                    city = '',
                    state = '',
                    country = '',
                    postal_code = '',
                    latitude = '',
                    longitude = '';

                if (place.address_components) {
                    place.address_components.forEach(component => {
                        const addressType = component.types[0];
                        const longName = component.long_name;
                        switch (addressType) {
                            case 'street_number':
                                street = longName + ' ' + street;
                                break;
                            case 'route':
                                street += longName;
                                break;
                            case 'locality':
                            case 'sublocality_level_1':
                                city = longName;
                                break;
                            case 'administrative_area_level_1':
                                state = component.short_name;
                                break;
                            case 'country':
                                country = longName;
                                break;
                            case 'postal_code':
                                postal_code = longName;
                                break;
                        }
                    });

                    street = street || 'Street not available';
                    city = city || 'City not available';
                    state = state || 'State not available';
                    postal_code = postal_code || 'Postal Code not available';
                    country = country || 'Country not available';
                }

                if (place.geometry) {
                    latitude = place.geometry.location.lat();
                    longitude = place.geometry.location.lng();
                }

                const address = {
                    street,
                    city,
                    state,
                    country,
                    postal_code,
                    latitude,
                    longitude
                };

                // Log extracted address details for debugging
                //console.log('Extracted address:', address);

                // Get the model name dynamically and Pass the object directly to Livewire without stringifying it
                Array.from(input.attributes).forEach(attr => {
                    if (attr.name.startsWith('wire:')) {
                        const strippedValue = attr.value.replace('.full', '');
                        @this.set(`${strippedValue}`, address);
                    }
                });

                // Trigger the input event to ensure the value is recognized
                const event = new Event('input', {
                    bubbles: true,
                    cancelable: true
                });
                input.dispatchEvent(event);
            }
        }" 
    @endif >
    <label class="block font-medium text-sm text-gray-700 dark:text-gray-300 mb-1 {{ $labelClass }}"
        for="{{ $id }}">
        {{ $label }}
    </label>
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
        'class' => 'bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg 
                    focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 
                    dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500',
    ]) !!} address="{{ $address }}" autocomplete="off"
        x-init="initAddressAutocomplete($el)">

    @error($id)
        <p class="text-sm text-red-600 dark:text-red-400 {{ $errorClass }}">{{ $message }}</p>
    @enderror

</div>
