<div x-data="{ role: @entangle('storeData.drive') }" x-init="$watch('role', value => { if (value === 'true') { showUpload = true } else { showUpload = false } })">
    <p class="font-light text-gray-600 dark:text-gray-300">
        Please upload your ID card and or International Passport,
        @if ((isset($storeData['drive']) && $storeData['drive'] === 'true'))            
         Driver's license,
        @endif
        and any Utility document that proves your address (not older than 2 months).
    </p>
    <x-div>
        <div class="sm:col-span-2 flex gap-6">
            <div class="w-2/5">
                <x-label for="nin">NIN*</x-label>
                <x-xinput type="text" wire:model="storeData.nin" id="nin" name="nin" />        
                <x-input-error for="storeData.nin" class="mt-2"/>

            </div>
            <div class="w-3/5">
                <x-label for="nin">Upload Your NIN*</x-label>
                <x-xinput type="file" wire:model="nin.new" id="nin_upload" name="nin_upload" title="Upload Your NIN"
                    accept=".jpg,.jpeg,.png,.pdf" class="!py-0" />        
                    <x-input-error for="nin.file.path" class="mt-2"/>
            </div>
        </div>           
    </x-div>

    <x-div>
        <div class="mb-2 flex items-center gap-1">
            <p class="text-gray-900 dark:text-white">How would you like to use the vehicle?</p>
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
                Select a Vehicle type to create a new Vehicle.
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
        <div class="mb-6 gap-4 text-sm sm:grid-cols-2 grid">
            <x-radio id="driver" name="drive" value="true" wire:model.lazy="storeData.drive" showIcon="false"
                class="!p-2">
                <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="w-full">I want to drive it myself.</span>
            </x-radio>

            <x-radio id="chauffeured" name="drive" value="false" wire:model.lazy="storeData.drive" checked
                showIcon="false" class="!p-2">
                <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="w-full">I prefer to be chauffeured</span>
            </x-radio>
        </div>
        <x-input-error for="role" />
    </x-div>

    <x-div x-show="role === 'true'" x-transition:enter="transition ease-out duration-300" class="grid gap-6"
        x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100"
        x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100"
        x-transition:leave-end="opacity-0 transform scale-90">
        @foreach (['internationalPassport', 'driversLicense', 'proofOfAddress'] as $document)
            <div class="items-center w-full sm:flex sm:gap-6 ">
                <x-label class="sm:hidden" for="{{ $document }}">Upload {{ ucfirst($document) }}</x-label>
                @if ($$document['file'])
                    <div class="overflow-hidden rounded-lg w-full sm:w-[84px] h-[84px] dark:bg-gray-700 border-4 border-green transition-transform duration-500 transform translate-x-0">
                        @if (str_contains($$document['file']['mime_type'], 'image'))
                            <img class="w-full min-w-20 min-h-20 sm:max-w-20 max-h-20 rounded-lg object-cover"
                                src="{{ $$document['file'] ? Storage::url($$document['file']['path']) : '' }}"
                                alt="User {{ ucfirst($document) }}">
                        @else
                            <embed src="{{ Storage::url($$document['file']['path']) }}" type="application/pdf"
                                class="sm:max-w-[98px] max-h-[98px] min-w-[98px] min-h-[98px] rounded-lg mt-[-2px] ml-[-2px]"
                                width="100%" height="98px" />
                        @endif
                    </div>
                @endif
                <div class="{{ $$document['file'] ? 'sm:w-[calc(100%-100px)]' : 'w-full' }} mt-2 sm:mt-0">
                    <x-label class="hidden sm:block" for="{{ $document }}">Upload {{ ucfirst($document) }}</x-label>
                    <x-xinput id="{{ $document }}" wire:model="{{ $document }}.new" name="{{ $document }}" title="Upload {{ ucfirst($document)}}"
                        class="w-full text-sm cursor-pointer !p-0" type="file" accept=".jpg,.jpeg,.png,.pdf" />
                    <p class="mt-1 text-2xs font-normal text-gray-500 dark:text-gray-300" id="{{ $document }}_help">
                        WEBP, PNG, JPG or PDF (MAX. 800x400px).
                    </p>
                    <x-input-error for="{{ $document }}.new" />
                    <x-input-error for="{{ $document }}.file.path" class="mt-2"/>

                </div>
            </div>
        @endforeach
    </x-div>
</div>
