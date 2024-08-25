<div class="flex items-center p-6 py-8 bg-white dark:bg-gray-900 w-full">

    <div class="container max-w-screen-md mx-auto px-4 md:px-8 ">

        {{-- Heading --}}
        <h1 class="text-xl tracking-tight text-gray-900 sm:mb-6 leding-tight dark:text-white">
            {{ $currentStepName }}
        </h1>
        @if ($currentStep == 0)
            <div>
                Wemcome to Vehicle wizerd
            </div>
        @endif
        @if ($currentStep == 1)
            <!-- Step 1: Basic Vehicle Information -->

            <div
                class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6 mb-8 mt-4">
                <div class="grid gap-4 sm:grid-cols-2">

                    <div class="sm:col-span-2 flex gap-4 items-start">

                        <div class="w-2/3">
                            <x-label for="vin" class="mt-1">Name</x-label>

                            <x-xinput id="vin" type="text" wire:model.lazy="vehicleData.name"
                                placeholder="Enter your Identifcation Number" maxlength="17"
                                title="Identification number of the vehicle" />
                        </div>
                        <div class="w-1/3">
                            <x-label for="vin" class="mt-1">Slug</x-label>

                            <x-xinput id="vin" type="text" wire:model.lazy="vehicleData.slug"
                                placeholder="Enter your Identifcation Number" maxlength="17"
                                title="Identification number of the vehicle" disabled />
                        </div>
                    </div>

                    <div class="sm:col-span-2">
                        <x-label for="location">Description</x-label>
                        <x-xinput id="location" type="text" wire:model="vehicleData.description" />
                        <x-input-error for="location" />
                    </div>
                </div>
            </div>

            {{-- Vehicle Info --}}
            <p class=" text-gray-900 dark:text-white mx-4">
                Vehicle Identification
            </p>
            <div
                class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6  mb-8 mt-4">
                <div class="grid gap-4 sm:grid-cols-2">
                    {{-- Vin and Vit --}}
                    <div class="sm:col-span-2 flex gap-4 items-start">
                        {{-- IT --}}
                        <div class="w-1/3">
                            <x-label for="vit" class="inline-flex items-center">

                                Identification type
                                <button type="button" data-tooltip-target="tooltip-vit" data-tooltip-style="dark"
                                    class="ml-1">
                                    <svg aria-hidden="true"
                                        class="ml-1 w-4 h-4 text-gray-400 dark:text-gray-500 hover:text-gray-900 dark:hover:text-white"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Vin Type details</span>
                                </button>
                                <div id="tooltip-vit" role="tooltip"
                                    class="inline-block absolute invisible z-10 py-2 px-3 max-w-sm text-xs font-normal text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    The identification type and number of the Vehicleis this is know as "VIN" on
                                    cars and motorcycles and "HIN" on Boats and watercrafts.
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </x-label>
                            <x-select wire:model="vehicleData.vin_type" name="Vehicle Identification Type"
                                title="Vehicle Identification Type">
                                @foreach ($vits as $vit => $description)
                                    <option title="{{ $description }}" value="{{ $vit }}">
                                        {{ $vit }}</option>
                                @endforeach
                            </x-select>
                        </div>
                        {{-- IN --}}
                        <div class="w-2/3">
                            <x-label for="vin" class="mt-1">Identification number</x-label>
                            <x-xinput id="vin" type="text" wire:model.lazy="vehicleData.vin_number"
                                placeholder="Enter your Identifcation Number" maxlength="17"
                                title="Identification number of the vehicle" />

                            <x-input-error for="vin" />

                        </div>
                    </div>

                    {{-- Make and Manufacturer  --}}
                    <div class="sm:col-span-2 flex gap-4">
                        <div class="w-2/4">
                            <x-label for="make">Make</x-label>
                            <x-xinput id="make" type="text" wire:model="vehicleData.make"
                                value="{{ $vehicleDetails['make'] ?? '' }}" />

                            <x-input-error for="make" />
                        </div>
                        <div class="w-2/4">
                            <x-label for="manufacturer">Manufacturer</x-label>
                            <x-xinput id="manufacturer" type="text" wire:model="vehicleData.manufacturer"
                                value="{{ $vehicleDetails['manufacturer_name'] ?? '' }}" />

                            <x-input-error for="manufacturer" />
                        </div>
                    </div>
                    <div class="sm:col-span-2 flex gap-4">
                        <div class="w-2/4">
                            <x-label for="model">Model</x-label>
                            <x-xinput id="model" type="text" wire:model="vehicleData.model"
                                value="{{ $vehicleDetails['model'] ?? '' }}" />

                            <x-input-error for="model" />
                        </div>
                        <div class="w-2/4">
                            <x-label for="year">Year of production</x-label>
                            <x-xinput id="year" type="select" wire:model="year"
                                value="{{ $vehicleDetails['model_year'] ?? '' }}" />

                            <x-input-error for="year" />
                        </div>
                    </div>
                    {{-- Location --}}
                    <div class="sm:col-span-2">
                        <x-label for="location">Location</x-label>
                        <x-xinput id="location" type="text" wire:model="location" />
                        <x-input-error for="location" />
                    </div>


                </div>
            </div>

        @endif

        @if ($currentStep == 2)
            <!-- Step 2: Location Information -->
            <div class="mb-6">
                <label for="location_city" class="block text-sm font-medium text-gray-700">City</label>
                <x-input type="text" wire:model="vehicleData.location_city" id="location_city" />
            </div>
            <div class="mb-6">
                <label for="location_state" class="block text-sm font-medium text-gray-700">State</label>
                <x-input type="text" wire:model="vehicleData.location_state" id="location_state" />
            </div>
            <div class="mb-6">
                <label for="location_country" class="block text-sm font-medium text-gray-700">Country</label>
                <x-input type="text" wire:model="vehicleData.location_country" id="location_country" />
            </div>
        @endif

        @if ($currentStep == 3)
            <!-- Step 3: Vehicle Details -->
            <div class="mb-6">
                <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                <x-input type="text" wire:model="vehicleData.type" id="type" />
            </div>
            <div class="mb-6">
                <label for="make" class="block text-sm font-medium text-gray-700">Make</label>
                <x-input type="text" wire:model="vehicleData.make" id="make" />
            </div>
            <div class="mb-6">
                <label for="manufacturer" class="block text-sm font-medium text-gray-700">Manufacturer</label>
                <x-input type="text" wire:model="vehicleData.manufacturer" id="manufacturer" />
            </div>
            <div class="mb-6">
                <label for="model" class="block text-sm font-medium text-gray-700">Model</label>
                <x-input type="text" wire:model="vehicleData.model" id="model" />
            </div>
            <div class="mb-6">
                <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                <x-input type="text" wire:model="vehicleData.year" id="year" />
            </div>
        @endif

        @if ($currentStep == 4)
            <!-- Step 4: Exterior and Interior Details -->
            <div class="mb-6">
                <label for="exterior_color" class="block text-sm font-medium text-gray-700">Exterior
                    Color</label>
                <x-input type="text" wire:model="vehicleData.exterior_color" id="exterior_color" />
            </div>
            <div class="mb-6">
                <label for="exterior_type" class="block text-sm font-medium text-gray-700">Exterior
                    Type</label>
                <x-input type="text" wire:model="vehicleData.exterior_type" id="exterior_type" />
            </div>
            <div class="mb-6">
                <label for="exterior_doors" class="block text-sm font-medium text-gray-700">Number of
                    Doors</label>
                <x-input type="number" wire:model="vehicleData.exterior_doors" id="exterior_doors" />
            </div>
            <div class="mb-6">
                <label for="exterior_windows" class="block text-sm font-medium text-gray-700">Type of
                    Windows</label>
                <x-input type="text" wire:model="vehicleData.exterior_windows" id="exterior_windows" />
            </div>
            <div class="mb-6">
                <label for="interior_seats" class="block text-sm font-medium text-gray-700">Interior
                    Seats</label>
                <x-input type="number" wire:model="vehicleData.interior_seats" id="interior_seats" />
            </div>
            <div class="mb-6">
                <label for="interior_upholstery" class="block text-sm font-medium text-gray-700">Upholstery</label>
                <x-input type="text" wire:model="vehicleData.interior_upholstery" id="interior_upholstery" />
            </div>
            <div class="mb-6">
                <label for="interior_ac" class="block text-sm font-medium text-gray-700">Air
                    Conditioning</label>
                <x-input type="text" wire:model="vehicleData.interior_ac" id="interior_ac" />
            </div>
            <div class="mb-6">
                <label for="interior_heater" class="block text-sm font-medium text-gray-700">Heater</label>
                <x-input type="text" wire:model="vehicleData.interior_heater" id="interior_heater" />
            </div>
        @endif

        @if ($currentStep == 5)
            <!-- Step 5: Vehicle Images -->
            <div class="mb-6">
                <label for="vehicleImages" class="block text-sm font-medium text-gray-700">Upload Vehicle
                    Images</label>
                <x-input type="file" wire:model="vehicleImages" multiple id="vehicleImages" />
            </div>
        @endif

        @if ($currentStep == 6)
            <!-- Step 6: Vehicle Documents -->
            <div class="mb-6">
                <label for="vehicleDocuments" class="block text-sm font-medium text-gray-700">Upload
                    Vehicle
                    Documents</label>
                <x-input type="file" wire:model="vehicleDocuments" multiple id="vehicleDocuments" />
            </div>
        @endif

        @if ($currentStep == 7)
            <!-- Step 7: Insurance Documents -->
            <div class="mb-6">
                <label for="insuranceDocuments" class="block text-sm font-medium text-gray-700">Upload
                    Insurance
                    Documents</label>
                <x-input type="file" wire:model="insuranceDocuments" multiple id="insuranceDocuments" />
            </div>
        @endif

        @if ($currentStep == 8)
            <!-- Step 8: Final Confirmation and Submission -->
            <div class="mb-6">
                <p class="text-gray-700">Review your information before submission.</p>
                <!-- You can add a summary of the entered data here for the user to review -->
            </div>
        @endif
        
        {{-- Steps Navigation --}}

        <x-steps-navigation />

    </div>

    <div
        class="hidden relative w-full min-h-[750px] max-w-[340px] py-12 px-8 lg:block bg-gray-100 dark:bg-gray-800 text-gray-500 rounded-2xl border border-gray-200 dark:border-gray-700">

        <ul class="space-y-6 relative z-10">
            {{-- Welcome --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(0)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 0 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 0 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="m10.051 8.102-3.778.322-1.994 1.994a.94.94 0 0 0 .533 1.6l2.698.316m8.39 1.617-.322 3.78-1.994 1.994a.94.94 0 0 1-1.595-.533l-.4-2.652m8.166-11.174a1.366 1.366 0 0 0-1.12-1.12c-1.616-.279-4.906-.623-6.38.853-1.671 1.672-5.211 8.015-6.31 10.023a.932.932 0 0 0 .162 1.111l.828.835.833.832a.932.932 0 0 0 1.111.163c2.008-1.102 8.35-4.642 10.021-6.312 1.475-1.478 1.133-4.77.855-6.385Zm-2.961 3.722a1.88 1.88 0 1 1-3.76 0 1.88 1.88 0 0 1 3.76 0Z" />
                        </svg>
                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 0 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Get Started</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Get your vehicle listed in 24hrs</p>
                </div>
            </li>
            {{-- Role --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(1)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 1 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 1 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 1 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Your Goal</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">What do you want to do</p>
                </div>
            </li>
            {{--  --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(2)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 2 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 2 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round"
                                stroke-width="2"
                                d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 2 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Your Goal</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">What do you want to do</p>
                </div>
            </li>
            {{-- Vehicle Safety --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(3)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 3 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 3 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                        </svg>

                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 3 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Safety</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Safety and Security features</p>
                </div>
            </li>
            {{-- Vehicle Engine and Fuel transmission --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(4)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 4 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 4 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                        </svg>

                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 4 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Personal Details</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Help us get to know you</p>
                </div>
            </li>
            {{-- Gallery Upload --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(5)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 5 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 5 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M11.644 3.066a1 1 0 0 1 .712 0l7 2.666A1 1 0 0 1 20 6.68a17.694 17.694 0 0 1-2.023 7.98 17.406 17.406 0 0 1-5.402 6.158 1 1 0 0 1-1.15 0 17.405 17.405 0 0 1-5.403-6.157A17.695 17.695 0 0 1 4 6.68a1 1 0 0 1 .644-.949l7-2.666Zm4.014 7.187a1 1 0 0 0-1.316-1.506l-3.296 2.884-.839-.838a1 1 0 0 0-1.414 1.414l1.5 1.5a1 1 0 0 0 1.366.046l4-3.5Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 5 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Upload photos</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Upload your vehicle's recent gallery</p>
                </div>
            </li>
            {{-- Upload Documents --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(6)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 6 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 6 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 6 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Vehicle Documents</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Upload all vehicle documentations</p>
                </div>
            </li>
            {{-- Insurance --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(7)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 7 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 7 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 7 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Insurance</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Add you Vehicle Insurance Details</p>
                </div>
            </li>
            {{-- Review --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(8)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 8 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 8 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Submission</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Cross check Vehicle information</p>

                </div>
            </li>
        </ul>

        <div class="flex justify-between items-center mt-8 mb-12 absolute bottom-0">
            <a wire:click="backToIntro" type="button"
                class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300 hover:cursor-pointer">&larr;
                Introduction
            </a>
        </div>
    </div>

</div>
