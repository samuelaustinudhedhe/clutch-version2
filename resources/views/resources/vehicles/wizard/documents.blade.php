<div>

    <x-div>
        <div class="mb-4">
            <x-label for="registration"
                class="!text-base dark:!text-gray-200 !text-gray-800 font-normal">Registration</x-label>
            <div class="flex items-center gap-6">
                <div class="w-full sm:w-1/2">
                    <x-date id="issued_date" wire:model.lazy="storeData.documents.registration.issued_date" placeholder="issued date" max="{{ now()->format('m/d/Y') }}" min="{{ now()->subYears(1)->format('m/d/Y') }}" loadJS=true/>
                    <x-input-error for="storeData.documents.registration.issued_date" />
                </div>
                <div class="w-full sm:w-1/2">
                    @php
                        $issuedDate = \Carbon\Carbon::parse($storeData['documents']['registration']['issued_date'] ?? now());
                        $expirationMinDate = $issuedDate->copy()->addMonths(2)->format('m/d/Y');
                        $expirationMaxDate = $issuedDate->copy()->addMonths(13)->format('m/d/Y');
                    @endphp
                    <x-date id="expiration_date" wire:model="storeData.documents.registration.expiration_date" placeholder="expiration date" max="{{ $expirationMaxDate }}" min="{{ $expirationMinDate }}" />
                    <x-input-error for="storeData.documents.registration.expiration_date" />
                </div>
            </div>
        </div>

        <div class="items-center w-full sm:flex space-x-6">
            @if ($registration['uploaded'])
                <div
                    class="overflow-hidden rounded-lg w-[84px] h-[84px] dark:bg-gray-700 border-4 border-green transition-transform duration-500 transform translate-x-0">
                    @if (str_contains($registration['uploaded']['mime_type'], 'image'))
                        <img class="min-w-20 min-h-20 max-w-20 max-h-20 rounded-lg object-cover"
                            src="{{ $registration['uploaded'] ? Storage::url($registration['uploaded']['path']) : '' }}"
                            alt="User Registration">
                    @else
                        <embed src="{{ Storage::url($registration['uploaded']['path']) }}" type="application/pdf"
                            class="max-w-[98px] max-h-[98px] min-w-[98px] min-h-[98px] rounded-lg mt-[-2px] ml-[-2px]"
                            width="98px" height="98px" />
                    @endif
                </div>
            @endif

            <div class="{{ $registration['uploaded'] ? 'sm:w-[calc(100%-120px)]' : 'w-full' }}">
                <x-xinput id="registration" wire:model="registration.new" class="w-full text-sm cursor-pointer !p-0"
                    type="file" accept=".webp,.jpg,.jpeg,.png,.pdf" />

                <p class="mt-1 mx-2 text-2xs font-normal text-gray-500 dark:text-gray-300" id="registration_help">
                    WEBP,
                    PNG, JPG or PDF (MAX. 800x400px).</p>
                <x-input-error for="registration.new" />
            </div>
        </div>
    </x-div>


    <x-div>
        <x-label for="proofOfOwnership" class="!text-base dark:!text-gray-200 !text-gray-800 font-normal">Proof Of
            Ownership</x-label>

        <div class="items-center w-full sm:flex space-x-6">
            @if ($proofOfOwnership['uploaded'])
                <div
                    class="overflow-hidden rounded-lg w-[84px] h-[84px] dark:bg-gray-700 border-4 border-green transition-transform duration-500 transform translate-x-0">
                    @if (str_contains($proofOfOwnership['uploaded']['mime_type'], 'image'))
                        <img class="min-w-20 min-h-20 max-w-20 max-h-20 rounded-lg object-cover"
                            src="{{ $proofOfOwnership['uploaded'] ? Storage::url($proofOfOwnership['uploaded']['path']) : '' }}"
                            alt="User Proof Of Ownership">
                    @else
                        <embed src="{{ Storage::url($proofOfOwnership['uploaded']['path']) }}" type="application/pdf"
                            class="max-w-[98px] max-h-[98px] min-w-[98px] min-h-[98px] rounded-lg mt-[-2px] ml-[-2px]"
                            width="98px" height="98px" />
                    @endif
                </div>
            @endif

            <div class="{{ $proofOfOwnership['uploaded'] ? 'sm:w-[calc(100%-120px)]' : 'w-full' }}">
                <x-xinput id="proofOfOwnership" wire:model="proofOfOwnership.new"
                    class="w-full text-sm cursor-pointer !p-0" type="file" accept=".webp,.jpg,.jpeg,.png,.pdf" />

                <p class="mt-1 text-2xs font-normal text-gray-500 dark:text-gray-300" id="proofOfOwnership_help">
                    WEBP,
                    PNG, JPG or PDF (MAX. 800x400px).</p>
                <x-input-error for="proofOfOwnership.new" />
            </div>
        </div>
    </x-div>


    {{-- Insurance --}}
    <x-div>
        <x-tooltip id="insurance-Question" icon=true class="mb-2" taClass="bg-gray-200 dark:bg-gray-700">
            <x-slot name="trigger">
                Insurance Coverage?
            </x-slot>
            <x-slot name="content">
                Is your vehicle 🛡protected by an insurance company?
            </x-slot>
        </x-tooltip>

        <div class="mb-2 gap-4 text-sm sm:grid-cols-2 grid">
            <x-radio id="noInsurance" name="has_insurance" value="invalid" wire:model.live="storeData.documents.insurance.status"
                showIcon="false" class="!p-2">
                <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="w-full">No i do not</span>
            </x-radio>
            <x-radio id="yesInsurance" name="has_insurance" value="valid" wire:model.live="storeData.documents.insurance.status"
                checked showIcon="false" class="!p-2">
                <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="none" viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <span class="w-full">I have an insurance coverage</span>
            </x-radio>
            <x-input-error for="role" />
        </div>


        @if (isset($storeData['documents']['insurance']['status']) && $storeData['documents']['insurance']['status'] === 'valid')

        <hr class="my-6 border-gray-300 dark:border-gray-600">
            <div class="items-center w-full sm:flex space-x-6 mb-2 mt-6">
                @if ($insurance['uploaded'])
                    <div
                        class="overflow-hidden rounded-lg w-[84px] h-[84px] dark:bg-gray-700 border-4 border-green transition-transform duration-500 transform translate-x-0">
                        @if (str_contains($insurance['uploaded']['mime_type'], 'image'))
                            <img class="min-w-20 min-h-20 max-w-20 max-h-20 rounded-lg object-cover"
                                src="{{ $insurance['uploaded'] ? Storage::url($insurance['uploaded']['path']) : '' }}"
                                alt="User Insurance">
                        @else
                            <embed src="{{ Storage::url($insurance['uploaded']['path']) }}" type="application/pdf"
                                class="max-w-[98px] max-h-[98px] min-w-[98px] min-h-[98px] rounded-lg mt-[-2px] ml-[-2px]"
                                width="98px" height="98px" />
                        @endif
                    </div>
                @endif

                <div class="{{ $insurance['uploaded'] ? 'sm:w-[calc(100%-120px)]' : 'w-full' }}">
                    <x-xinput id="insurance" wire:model="insurance.new" class="w-full text-sm cursor-pointer !p-0"
                        type="file" accept=".webp,.jpg,.jpeg,.png,.pdf" />

                    <p class="mt-1 text-2xs font-normal text-gray-500 dark:text-gray-300" id="insurance_help">
                        WEBP,
                        PNG, JPG or PDF (MAX. 800x400px).</p>
                    <x-input-error for="insurance.new" />
                </div>
            </div>

            <hr class="my-6 border-gray-300 dark:border-gray-600">
            {{-- Insurance Note --}}
            <div class="mt-6">
                <x-label for="insurance">Insurance Note</x-label>
                <x-textarea id="insurance_details" wire:model="storeData.documents.insurance.note" height="150px"
                    placeholder="Describe your insurace coverage" />
            </div>
        @else
        <hr class="my-6 border-gray-300 dark:border-gray-600">

            <div class="text-sm ">
                We recommend all vehicles have a form of insurance.
            </div>
        @endif
    </x-div>

</div>
