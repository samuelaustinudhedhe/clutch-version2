{{-- Onboarding Personal Details --}}
<div>
    {{-- Additional info --}}
    <x-div>
        <div class="sm:col-span-2">
            <div class="items-center w-full sm:flex">
                <img class="mb-4 min-w-20 min-h-20 max-w-20 max-h-20 rounded-full sm:mr-4 sm:mb-0 object-cover"
                    src="{{ $photo['file'] ? Storage::url($photo['file']['path']) : $user->profile_photo_url }}"
                    alt="User Profile Picture">
                <div class="w-full">
                    <x-xinput id="profile_photo" wire:model="photo.new" class="w-full text-sm cursor-pointer !p-0"
                        type="file" accept=".jpg,.jpeg,.png,.gif" />

                    <p class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-300" id="profile_photo_help">WEBP,
                        PNG, JPG or GIF (MAX. 800x400px).</p>
                </div>
            </div>
        </div>
        @error('photo')
            <span class="error">{{ $message }}</span>
        @enderror
    </x-div>

    <x-div>
        <div class="sm:col-span-2 mb-6 flex gap-6">
            <div class="w-2/5">
                <x-label for="country_code">Country Code</x-label>
                <x-select id="country_code" wire:model="storeData.phone.home.country_code">
                    <option selected>Select Code</option>                    
                    @foreach ($countries as $country)
                        <?php if (isset($country['idd']['root']) && isset($country['idd']['suffixes']) && in_array($country['cca2'], ['NG'])) { ?>
                        <option value="{{ $country['idd']['root'] . $country['idd']['suffixes'][0] }}"
                            @if ($country['cca2'] == $userCountryCode) selected @endif>
                            {{ $country['name']['common'] }}
                            ({{ $country['idd']['root'] . $country['idd']['suffixes'][0] }})
                        </option>
                        <?php }?>
                    @endforeach
                </x-select>
                <x-input-error for="country_code" />
            </div>

            <div class="w-3/5">
                <x-label for="phone">Phone</x-label>
                <x-xinput id="phone" type="number" wire:model="storeData.phone.home.number" />

                <x-input-error for="phone" />

            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <x-label for="date-of-birth">Date of Birth</x-label>

                <div class="relative w-full">
                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z" />
                        </svg>
                    </div>
                    <x-date id="date-of-birth" class="pl-10" datepicker-max-date="{{ now()->subYears(14)->format('D/M/Y') }}"
                        wire:model="storeData.date_of_birth" placeholder="Select date" loadJS=true />
                    <x-input-error for="date_of_birth" />
                </div>
            </div>
            <div>
                <x-label for="gender">Gender</x-label>
                <x-select name="gender" wire:model="storeData.gender" id="gender">
                    <option selected value="">Select gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </x-select>
                <x-input-error for="gender" />
            </div>
        </div>

    </x-div>

    {{-- Address --}}
    <x-div>        
        <x-location label="Home Address" wire:model="storeData.address.home.full" loadJS="true"  />
        <x-location label="Work Address" wire:model="storeData.address.work.full" loadJS="false"  />
    </x-div>

    <x-div>
        <p class="text-sm text-gray-500 dark:text-gray-40 mt--4">Social Accounts</p>
        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <x-label for="date-of-birth">Instagram</x-label>
                <x-xinput type="text" wire:model="storeData.social.instagram" id="instagram" name="instagram" class="w-3/4" placeholder="https://instagram.com/username" />
                <x-input-error for="date_of_birth" />
            </div>
            <div>
                <x-label for="facebook">Facebook</x-label>
                <x-xinput type="text" wire:model="storeData.social.facebook" id="facebook" name="facebook" class="w-3/4" placeholder="https://facebook.com/username" />
                <x-input-error for="facebook" />
            </div>
        </div>
    </x-div>

</div>
