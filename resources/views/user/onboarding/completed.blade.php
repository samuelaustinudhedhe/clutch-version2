<div class="max-w-screen-xl m-auto">


    {{-- Basic info --}}
    <x-div class="rounded-xl !px-2 !pb-2">

        <h3 class="lg:text-xl text-lg font-medium lg:font-normal mb-4 px-4">Basic info</h3>
        <p class="lg:text-base text-sm text-gray-600 dark:text-gray-400 mb-4 px-4">
            Some info may be visible to other people using our services.
            <a href="#" class="text-blue-500">Learn more</a>
        </p>

        {{-- main --}}
        <div class="flex items-center justify-between border-b border-inherit py-4 px-4">
            <div class="lg:flex w-full">
                <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Profile picture
                </div>
                <div class="w-full lg:w-3/5 text-sm">
                    {{ $photo['file'] ? 'Your personalized profile picture' : 'Add a profile picture to personalize your account' }}
                </div>
            </div>
            <img class="mb-4 min-w-14 min-h-14 max-w-14 max-h-14 rounded-full border-2 border-gray-200 dark:border-white sm:ml-4 sm:mb-0 object-cover"
                src="{{ $photo['file'] ? Storage::url($photo['file']['path']) : $user->profile_photo_url }}"
                alt="User Profile Picture">
        </div>

        <div class="flex items-center justify-between border-b border-inherit py-4 px-4">
            <div class="lg:flex w-full">
                <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Name</div>
                <div class="w-full lg:w-3/5 text-right ">{{ $storeData['name'] ?? $this->user->name }}</div>
            </div>


        </div>
        <div class="flex items-center justify-between border-b border-inherit py-4 px-4">
            <div class="lg:flex w-full">
                <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Birthday</div>
                <div class="w-full lg:w-3/5  text-right ">
                    {{ $storeData['date_of_birth'] ?? $this->user->date_of_birth }}</div>
            </div>


        </div>
        <div class="flex items-center justify-between border-inherit py-4 px-4">
            <div class="lg:flex w-full">
                <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Gender</div>
                <div class="w-full lg:w-3/5 capitalize  text-right ">{{ $storeData['gender'] ?? $this->user->gender }}
                </div>
            </div>


        </div>

    </x-div>

    {{-- Contact info --}}
    <x-div class="rounded-xl !px-2 !pb-2">

        <h3 class="lg:text-xl text-lg font-medium lg:font-normal mb-4 px-4">Contact info</h3>

        {{-- main --}}
        <div class="flex items-center justify-between border-b border-inherit py-4 px-4">
            <div class="lg:flex w-full">
                <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Email</div>
                <div class="w-full lg:w-3/5 text-right {{ $this->user->hasVerifiedEmail() ? 'text-green-300' : 'text-red-300' }}"
                    title="{{ $this->user->hasVerifiedEmail() ? 'Verified' : 'Unverified Email' }}">
                    {{ $this->user->email }}</div>
            </div>

        </div>
        <div class="flex items-center justify-between border-inherit py-4 px-4">
            <div class="lg:flex w-full">
                <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Phone</div>
                <div class="grid w-full lg:w-3/5 text-right ">
                    <a
                        href="tel:{{ formatPhone($storeData['phone'], type: 'home') }}">{{ formatPhone($storeData['phone'], type: 'home', format: true) }}</a>
                    @isset($storeData['phone']['work'])
                        <a
                            href="tel:{{ formatPhone($storeData['phone'], type: 'work') }}">{{ formatPhone($storeData['phone'], type: 'work', format: true) }}</a>
                    @endisset
                </div>
            </div>

        </div>

    </x-div>

    {{-- Addresses --}}
    @if($storeData['address']['home'] || $storeData['address']['work'])

        <x-div class="rounded-xl !px-2 !pb-2">

            <h3 class="lg:text-xl text-lg font-medium lg:font-normal mb-4 px-4">Address</h3>
            <p class="lg:text-base text-sm text-gray-600 dark:text-gray-400 mb-4 px-4">
                Manage your addresses associated with your Account.
                <a href="#" class="text-blue-500">Learn more about addresses saved to your account</a>
            </p>

            {{-- add user addresses in db and update helper function  --}}
            @isset($storeData['address']['home'])
                <div class="flex items-center justify-between border-b border-inherit py-4 px-4">
                    <div class="lg:flex w-full">
                        <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Home</div>
                        <div class="w-full lg:w-3/5 text-right ">
                            {{ formatAddress($storeData['address']['home'], 'street, city, state,') }}</div>
                    </div>
                </div>
            @endisset

            @isset($storeData['address']['work'])
                <div class="flex items-center justify-between border-inherit py-4 px-4">
                    <div class="lg:flex w-full">
                        <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Work</div>
                        <div class="w-full lg:w-3/5 text-right ">
                            {{ formatAddress($storeData['address']['work'], 'street, city, state,') }}</div>
                    </div>
                </div>
            @endisset

        </x-div>

    @endif

    {{-- Documents --}}
    @if (null !== ($this->proofOfAddress['file'] ?? null) ||
            null !== ($this->driversLicense['file'] ?? null) ||
            null !== ($this->internationalPassport['file'] ?? null) ||
            null !== ($this->nin['file'] ?? null))
        <x-div class="rounded-xl !px-2 !pb-2">

            <h3 class="lg:text-xl text-lg font-medium lg:font-normal mb-4 px-4">Uploaded Documents</h3>
            <p class="lg:text-base text-sm text-gray-600 dark:text-gray-400 mb-4 px-4">
                Personal documents you recently uploaded
            </p>

            {{-- Documents --}}
            @isset($this->nin['file'])
                <div class="flex items-center justify-between py-4 px-4">
                    <div class="lg:flex w-full">
                        <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">NIN
                        </div>
                        <div class="w-full lg:w-3/5 text-sm font-bold">
                            {{ $storeData['nin'] }}
                        </div>
                    </div>

                    @if (str_contains($this->nin['file']['mime_type'], 'image'))
                        <img class="mb-4 min-w-20 min-h-14 max-w-20 max-h-14 rounded border-2 border-gray-200 dark:border-white sm:mb-0 object-cover"
                            src="{{ isset($this->nin['file']) ? Storage::url($this->nin['file']['path']) : '' }}"
                            alt="Uploaded Proof of Address">
                    @else
                        <div
                            class="overflow-hidden  rounded border-2 border-gray-200 dark:border-white w-20 h-14 transition-transform duration-500 transform translate-x-0">

                            <embed src="{{ Storage::url($this->nin['file']['path']) }}" type="application/pdf"
                                class="max-w-[94px] max-h-[70px] min-w-[94px] min-h-[70px] mt-[-2px] ml-[-2px]"
                                width="94px" height="70px" />
                        </div>
                    @endif
                </div>
            @endisset


            {{-- Passport --}}
            @isset($this->internationalPassport['file'])
                <div class="flex items-center justify-between border-t border-inherit py-4 px-4">
                    <div class="lg:flex w-full">
                        <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">International
                            Passport
                        </div>
                        <div class="w-full lg:w-3/5 text-xs">
                            {{ isset($this->internationalPassport['file']) ? 'Address verification Once Approved' : 'Upload a Utility Bill or statement to verify your address' }}
                        </div>
                    </div>
                    @if (str_contains($this->internationalPassport['file']['mime_type'], 'image'))
                        <img class="mb-4 min-w-20 min-h-14 max-w-20 max-h-14 rounded border-2 border-gray-200 dark:border-white sm:mb-0 object-cover"
                            src="{{ isset($this->internationalPassport['file']) ? Storage::url($this->internationalPassport['file']['path']) : '' }}"
                            alt="Uploaded International Passport">
                    @else
                        <div
                            class="overflow-hidden  rounded border-2 border-gray-200 dark:border-white w-20 h-14 transition-transform duration-500 transform translate-x-0">

                            <embed src="{{ Storage::url($this->internationalPassport['file']['path']) }}"
                                type="application/pdf"
                                class="max-w-[94px] max-h-[70px] min-w-[94px] min-h-[70px] mt-[-2px] ml-[-2px]"
                                width="94px" height="70px" />
                        </div>
                    @endif
                </div>
            @endisset

            {{-- Drivers License --}}
            @isset($this->driversLicense['file'])
                <div class="flex items-center justify-between border-t border-inherit py-4 px-4">
                    <div class="lg:flex w-full">
                        <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Drivers License
                        </div>
                        <div class="w-full lg:w-3/5 text-xs">
                            {{ isset($this->driversLicense['file']) ? 'Address verification Once Approved' : 'Upload a Utility Bill or statement to verify your address' }}
                        </div>
                    </div>
                    @if (str_contains($this->driversLicense['file']['mime_type'], 'image'))
                        <img class="mb-4 min-w-20 min-h-14 max-w-20 max-h-14 rounded border-2 border-gray-200 dark:border-white sm:mb-0 object-cover"
                            src="{{ isset($this->driversLicense['file']) ? Storage::url($this->driversLicense['file']['path']) : '' }}"
                            alt="Uploaded Drivers License">
                    @else
                        <div
                            class="overflow-hidden  rounded border-2 border-gray-200 dark:border-white w-20 h-14 transition-transform duration-500 transform translate-x-0">

                            <embed src="{{ Storage::url($this->driversLicense['file']['path']) }}" type="application/pdf"
                                class="max-w-[94px] max-h-[70px] min-w-[94px] min-h-[70px] mt-[-2px] ml-[-2px]"
                                width="94px" height="70px" />
                        </div>
                    @endif
                </div>
            @endisset

            {{-- Proof Of Address --}}
            @isset($this->proofOfAddress['file'])
                <div class="flex items-center justify-between border-t border-inherit py-4 px-4">
                    <div class="lg:flex w-full">
                        <div class="w-full lg:w-2/5 text-sm font-medium text-gray-600 dark:text-gray-400">Proof Of Address
                        </div>
                        <div class="w-full lg:w-3/5 text-xs">
                            {{ isset($this->proofOfAddress['file']) ? 'Address verification Once Approved' : 'Upload a Utility Bill or statement to verify your address' }}
                        </div>
                    </div>
                    @if (str_contains($this->proofOfAddress['file']['mime_type'], 'image'))
                        <img class="mb-4 min-w-20 min-h-14 max-w-20 max-h-14 rounded border-2 border-gray-200 dark:border-white sm:mb-0 object-cover"
                            src="{{ isset($this->proofOfAddress['file']) ? Storage::url($this->proofOfAddress['file']['path']) : '' }}"
                            alt="Uploaded Proof of Address">
                    @else
                        <div
                            class="overflow-hidden  rounded border-2 border-gray-200 dark:border-white w-20 h-14 transition-transform duration-500 transform translate-x-0">

                            <embed src="{{ Storage::url($this->proofOfAddress['file']['path']) }}" type="application/pdf"
                                class="max-w-[94px] max-h-[70px] min-w-[94px] min-h-[70px] mt-[-2px] ml-[-2px]"
                                width="94px" height="70px" />
                        </div>
                    @endif
                </div>
            @endisset
        </x-div>
    @endif


</div>
