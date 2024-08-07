<!-- Blade view (e.g., edit_user.blade.php) -->
<x-users.dashboard-layout>
    <x-form-section submit="updateProfileInformation">
        <x-slot name="title">
            {{ __('Profile Information') }}
        </x-slot>
    
        <x-slot name="description">
            {{ __('Update your account\'s profile information and email address.') }}
        </x-slot>
    
        <x-slot name="form">
            <!-- Profile Photo -->
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                    <!-- Profile Photo File Input -->
                    <input type="file" id="photo" class="hidden"
                                wire:model.live="photo"
                                x-ref="photo"
                                x-on:change="
                                        photoName = $refs.photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.photo.files[0]);
                                " />
    
                    <x-label for="photo" value="{{ __('Photo') }}" />
    
                    <!-- Current Profile Photo -->
                    <div class="mt-2" x-show="! photoPreview">
                        <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}" class="rounded-full h-20 w-20 object-cover">
                    </div>
    
                    <!-- New Profile Photo Preview -->
                    <div class="mt-2" x-show="photoPreview" style="display: none;">
                        <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                              x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                        </span>
                    </div>
    
                    <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                        {{ __('Select A New Photo') }}
                    </x-secondary-button>
    
                    @if ($user->profile_photo_path)
                        <x-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                            {{ __('Remove Photo') }}
                        </x-secondary-button>
                    @endif
    
                    <x-input-error for="photo" class="mt-2" />
                </div>
            @endif
    
            <!-- First Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="first_name" value="{{ __('First Name') }}" />
                <x-input id="first_name" type="text" class="mt-1 block w-full" wire:model="state.first_name" required autocomplete="first_name" />
                <x-input-error for="first_name" class="mt-2" />
            </div>
    
            <!-- Last Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="last_name" value="{{ __('Last Name') }}" />
                <x-input id="last_name" type="text" class="mt-1 block w-full" wire:model="state.last_name" required autocomplete="last_name" />
                <x-input-error for="last_name" class="mt-2" />
            </div>
    
            <!-- Email -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" type="email" class="mt-1 block w-full" wire:model="state.email" required autocomplete="username" />
                <x-input-error for="email" class="mt-2" />
    
                @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $user->hasVerifiedEmail())
                    <p class="text-sm mt-2 dark:text-white">
                        {{ __('Your email address is unverified.') }}
    
                        <button type="button" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" wire:click.prevent="sendEmailVerification">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>
    
                    @if ($verificationLinkSent)
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                @endif
            </div>
    
            <!-- Address -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="address.home.street" value="{{ __('Home Street') }}" />
                <x-input id="address.home.street" type="text" class="mt-1 block w-full" wire:model="state.address.home.street" autocomplete="address.home.street" />
                <x-input-error for="address.home.street" class="mt-2" />
            </div>
    
            <div class="col-span-6 sm:col-span-4">
                <x-label for="address.home.city" value="{{ __('Home City') }}" />
                <x-input id="address.home.city" type="text" class="mt-1 block w-full" wire:model="state.address.home.city" autocomplete="address.home.city" />
                <x-input-error for="address.home.city" class="mt-2" />
            </div>
    
            <div class="col-span-6 sm:col-span-4">
                <x-label for="address.home.state" value="{{ __('Home State') }}" />
                <x-input id="address.home.state" type="text" class="mt-1 block w-full" wire:model="state.address.home.state" autocomplete="address.home.state" />
                <x-input-error for="address.home.state" class="mt-2" />
            </div>
    
            <div class="col-span-6 sm:col-span-4">
                <x-label for="address.home.zip" value="{{ __('Home Zip') }}" />
                <x-input id="address.home.zip" type="text" class="mt-1 block w-full" wire:model="state.address.home.zip" autocomplete="address.home.zip" />
                <x-input-error for="address.home.zip" class="mt-2" />
            </div>
    
            <div class="col-span-6 sm:col-span-4">
                <x-label for="address.home.country" value="{{ __('Home Country') }}" />
                <x-input id="address.home.country" type="text" class="mt-1 block w-full" wire:model="state.address.home.country" autocomplete="address.home.country" />
                <x-input-error for="address.home.country" class="mt-2" />
            </div>
    
            <!-- Additional Address fields as needed -->
        </x-slot>
    
        <x-slot name="actions">
                {{ __('Saved.') }}
    
            <x-button wire:loading.attr="disabled" wire:target="photo">
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-form-section>
    

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAiD6pS0roHdY0sfb1BDif4QAf5vKUcsAg=&libraries=places"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        initializeGoogleMapsAutocomplete('address_input', function (address) {
            document.querySelector('form').insertAdjacentHTML('beforeend', `
                <input type="hidden" name="address[home][street]" value="${address.street}">
                <input type="hidden" name="address[home][city]" value="${address.city}">
                <input type="hidden" name="address[home][state]" value="${address.state}">
                <input type="hidden" name="address[home][zip]" value="${address.zip}">
                <input type="hidden" name="address[home][country]" value="${address.country}">
            `);
        });
    });

    function initializeGoogleMapsAutocomplete(inputId, callback) {
        var input = document.getElementById(inputId);
        var autocomplete = new google.maps.places.Autocomplete(input);

        autocomplete.addListener('place_changed', function () {
            var place = autocomplete.getPlace();
            var addressComponents = place.address_components;
            var address = {
                street: '',
                city: '',
                state: '',
                zip: '',
                country: ''
            };

            addressComponents.forEach(function (component) {
                var types = component.types;
                var value = component.long_name;

                if (types.includes('street_number')) {
                    address.street += value + ' ';
                }
                if (types.includes('route')) {
                    address.street += value;
                }
                if (types.includes('locality')) {
                    address.city = value;
                }
                if (types.includes('administrative_area_level_1')) {
                    address.state = value;
                }
                if (types.includes('postal_code')) {
                    address.zip = value;
                }
                if (types.includes('country')) {
                    address.country = value;
                }
            });

            callback(address);
        });
    }
</script>
</x-users.dashboard-layout>

