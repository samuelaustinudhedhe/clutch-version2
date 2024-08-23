<div>
    <section class="bg-white py-8 antialiased dark:bg-gray-900">

        <form action="#" class="mx-auto max-w-screen-xl px-4 2xl:px-0" wire:submit.prevent="createVehicle">

            <h2 class="text-xl text-gray-900 dark:text-white sm:text-2xl">Create New Vehicle</h2>

            <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-6">
                <div class="mt-6 min-w-0 flex-1 space-y-6 sm:mt-8 lg:mt-0 ">


                    {{-- Vehicle Status --}}
                    <div
                        class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <div class="mb-2 flex items-center gap-1">
                            <p class="text-lg text-gray-900 dark:text-white">
                                Vehicle Status
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
                                Select a Vehicle type to create a new Vehicle.
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        </div>
                        <div class="mb-6 mb-6 gap-4 text-sm sm:grid-cols-2 2xl:grid-cols-3 grid">
                            <x-radio id="active" name="status" value="active" wire:model="status" color="green">

                                <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span class="w-full">Active</span>
                            </x-radio>

                            <x-radio id="inactive" name="status" value="inactive" wire:model="status"
                                color="dark:peer-checked:text-zinc-100 peer-checked:border-zinc-300 peer-checked:text-zinc-300">
                                <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="M7.757 12h8.486M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span class="w-full">Inactive</span>
                            </x-radio>

                            <x-radio id="suspended" name="status" value="suspended" wire:model="status" color="pink">
                                <svg class="w-6 h-6 mr-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                        d="m6 6 12 12m3-6a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                </svg>
                                <span class="w-full">Underservice</span>
                            </x-radio>
                        </div>
                        <x-input-error for="status" />
                    </div>

                    {{-- Vehicle Basic details  --}}
                    <div
                        class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <p class="text-xl text-gray-900 dark:text-white">Vehicle Details</p>
                        <div class="grid gap-4 sm:grid-cols-2">

                            {{-- Vin and Vit --}}
                            <div class="mb-4 sm:col-span-2 flex gap-4 items-start">
                                {{-- IT --}}
                                <div class="w-1/3">
                                    <x-label for="vit" class="inline-flex items-center">

                                        Identification type
                                        <button type="button" data-tooltip-target="tooltip-vit"
                                            data-tooltip-style="dark" class="ml-1">
                                            <svg aria-hidden="true"
                                                class="ml-1 w-4 h-4 text-gray-400 dark:text-gray-500 hover:text-gray-900 dark:hover:text-white"
                                                fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
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
                                    <x-select wire:model="vit" name="Vehicle Identification Type"
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
                                    <x-xinput id="vin" type="text" wire:model.lazy="vin"
                                        placeholder="Enter your Identifcation Number" maxlength="17"
                                        title="Identification number of the vehicle" />

                                    <x-input-error for="vin" />

                                </div>
                            </div>

                            {{-- Make and Manufacturer  --}}
                            <div class="sm:col-span-2 flex gap-4">
                                <div class="mb-4 w-2/4">
                                    <x-label for="make">Make</x-label>
                                    <x-xinput id="make" type="text" wire:model="make"
                                        value="{{ $vehicleDetails['make'] ?? '' }}" />

                                    <x-input-error for="make" />
                                </div>
                                <div class="mb-4 w-2/4">
                                    <x-label for="manufacturer">Manufacturer</x-label>
                                    <x-xinput id="manufacturer" type="text" wire:model="manufacturer"
                                        value="{{ $vehicleDetails['manufacturer_name'] ?? '' }}" />

                                    <x-input-error for="manufacturer" />
                                </div>
                            </div>
                            <div class="sm:col-span-2 flex gap-4">
                                <div class="mb-4 w-2/4">
                                    <x-label for="model">Model</x-label>
                                    <x-xinput id="model" type="text" wire:model="model"
                                        value="{{ $vehicleDetails['model'] ?? '' }}" />

                                    <x-input-error for="model" />
                                </div>
                                <div class="mb-4 w-2/4">
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

                    {{-- Vehicle Details --}}
                    <div
                        class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">

                        <p class="text-lg text-gray-900 dark:text-white">Exterior</p>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="mb-4">
                                <x-label for="exterior_color">Exterior Color</x-label>
                                <x-xinput id="exterior_color" type="text" name="exterior[color]" />
                                <x-input-error for="exterior_color" />
                            </div>

                            <div class="mb-4">
                                <x-label for="exterior_type">Exterior Type</x-label>
                                <x-select name="exterior[type]" wire:model="exterior_type" id="exterior_type">
                                    @if ($vehicleDetails)
                                        <option selected value="{{ $vehicleDetails['body_class'] }}">
                                            {{ $vehicleDetails['body_class'] }}</option>
                                    @endif
                                    @foreach ($vehicleTypes['cars'] as $vehicleType => $type)
                                        <option value="{{ $type }}">{{ $type }}</option>
                                    @endforeach
                                </x-select>
                                <x-input-error for="exterior_type" />
                            </div>
                            {{-- add a condition here based on the Vehicle type --}}

                            <div class="mb-4">
                                <x-label for="exterior_doors">Number of Doors</x-label>
                                <x-select name="exterior[doors]" wire:model="exterior_doors" id="exterior_doors"
                                    value="{{ $vehicleDetails['doors'] ?? '' }}">
                                    <option selected value="0">No Door</option>
                                    <option value="1">1 Door</option>
                                    <option value="2">2 Doors</option>
                                    <option value="3">3 Doors</option>
                                    <option value="4">4 Doors</option>
                                    <option value="5">5 Doors</option>
                                    <option value="6">6 Doors</option>
                                </x-select>
                                <x-input-error for="exterior_doors" />
                            </div>

                            <div class="mb-4">
                                <x-label for="exterior_windows">Number of Windows</x-label>
                                <x-select name="exterior[windows]" wire:model="exterior_windows"
                                    id="exterior_windows">
                                    <option selected value="0">No Window</option>
                                    <option value="1">1 Window</option>
                                    <option value="2">2 Windows</option>
                                    <option value="3">3 Windows</option>
                                    <option value="4">4 Windows</option>
                                    <option value="5">5 Windows</option>
                                    <option value="6">6 Windows</option>
                                    {{-- Add an if statement to reduce the number of windows based on the Vehicle model and type --}}
                                    <option value="7">7 Windows</option>
                                    <option value="8">8 Windows</option>
                                    <option value="9">9 Windows</option>
                                    <option value="10">10 Windows</option>
                                    <option value="11">11Windows</option>
                                    <option value="12">12 Windows</option>
                                </x-select>
                                <x-input-error for="exterior_windows" />
                            </div>
                        </div>

                        {{-- Interior Details --}}
                        <p class="text-lg text-gray-900 dark:text-white">Interior</p>

                        <div class="grid gap-4 sm:grid-cols-2">
                            <div class="mb-4">
                                <x-label for="interior_color">Interior Color</x-label>
                                <x-xinput id="interior_color" type="text" name="interior[color]" />
                                <x-input-error for="interior_color" />
                            </div>

                            <div class="mb-4">
                                <x-label for="interior_upholstery">Upholstery</x-label>
                                <x-select name="interior[upholstery]" wire:model="interior_upholstery"
                                    id="interior_upholstery">
                                    <option value="cloth_fabric">Cloth Fabric</option>
                                    <option value="vinyl">Vinyl</option>
                                    <option selected value="leather">Leather</option>
                                    <option value="leatherette">Leatherette (Synthetic Leather)</option>
                                    <option value="suede_alcantara">Suede/Alcantara</option>
                                    <option value="neoprene">Neoprene</option>
                                    <option value="microfiber">Microfiber</option>
                                    <option value="tweed">Tweed</option>
                                    <option value="velour">Velour</option>
                                    <option value="mesh">Mesh</option>
                                </x-select>
                                <x-input-error for="interior_type" />
                            </div>
                            {{-- add a condition here based on the Vehicle type --}}

                            <div class="mb-4">
                                <x-label for="interior_seats">Number of Seats</x-label>
                                <x-select name="interior[seats]" wire:model="interior_seats" id="interior_seats"
                                    value="{{ $vehicleDetails['number_of_seats'] ?? '' }}">
                                    <option value="1">1 Seat</option>
                                    <option value="2">2 Seats</option>
                                    <option value="3">3 Seats</option>
                                    <option selected value="4">4 Seats</option>
                                    <option value="5">5 Seats</option>
                                    <option value="6">6 Seats</option>
                                </x-select>
                                <x-input-error for="exterior_doors" />
                            </div>

                            <div class="mb-4">
                                <x-label for="interior_ac">Number of ac</x-label>
                                <x-select name="interior[ac]" wire:model="interior_ac" id="interior_ac">
                                    <option selected value="1">Yes</option>
                                    <option value="0">no</option>

                                </x-select>
                                <x-input-error for="interior_ac" />
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Right Content --}}
                <div class="w-full space-y-4 sm:space-y-6 lg:max-w-sm xl:max-w-lg">

                    {{-- Vehicle Gallery --}}
                    <div
                        class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                        <div class="mb-2 flex items-center gap-1">
                            <p class="text-lg text-gray-900 dark:text-white">
                                Vehicle Gallery
                            </p>
                        </div>

                        <div class="mb-4">
                            {{-- fix responsiveness and implement drag and drop functionality --}}
                            <div class="grid grid-cols-3 gap-4 mb-4">
                                @foreach ($images as $index => $image)
                                    @php
                                        // Get image dimensions
                                        $dimensions = getimagesize($image->getRealPath());

                                        // Get image file size in bytes
                                        $fileSizeInBytes = filesize($image->getRealPath());

                                        // Convert size to a more readable format (KB)
                                        $fileSize = number_format($fileSizeInBytes / 1024, 2) . ' KB'; // or use MB for larger sizes
                                    @endphp

                                    <div class="relative rounded-lg sm:w-36 sm:h-36 dark:bg-gray-700 {{ $featuredImageIndex === $index ? 'border-4 border-blue-500' : 'border-4 border-transparent' }}"
                                        title="{{ $featuredImageIndex === $index ? 'Featured Image' : 'Dimensions: ' . ($dimensions ? $dimensions[0] . ' x ' . $dimensions[1] . ' px' : 'Dimensions not available') . ', Size: ' . ($fileSize ? $fileSize : 'Size not available') }}"
                                        wire:click="setFeaturedImage({{ $index }})">
                                        <img src="{{ $image->temporaryUrl() }}"
                                            alt="Vehicle Image {{ $index + 1 }}"
                                            class="w-full  rounded-lg h-full object-cover">

                                        <button type="button" wire:click="removeImage({{ $index }})"
                                            class="absolute text-red-600 dark:text-red-500 hover:text-red-500 dark:hover:text-red-400 bottom-1 left-1">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Remove image</span>
                                        </button>
                                    </div>
                                @endforeach
                            </div>

                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-image"
                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                            <span class="font-semibold">Click to upload</span> or drag and drop
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF
                                            (MAX. 1MB)</p>
                                    </div>
                                    <input id="dropzone-image" type="file" wire:model="newImages" multiple
                                        class="hidden">
                                </label>
                            </div>
                        </div>
                        <x-input-error for="images" />
                    </div>

                    {{-- Vehicle Documents  --}}
                    <div>
                        <div
                            class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                            <div class="mb-2 flex items-center gap-1">
                                <p class="text-lg text-gray-900 dark:text-white">
                                    PDF Document Upload
                                </p>
                            </div>

                            <div class="grid grid-cols-3 gap-4 mb-4">
                                @foreach ($documents as $document)
                                    <div
                                        class="relative overflow-hidden rounded-lg sm:w-36 sm:h-36 dark:bg-gray-700 border-4 border-transparent">
                                        @if (str_contains($document['mime_type'], 'pdf'))
                                            <embed src="{{ Storage::url($document['path']) }}" type="application/pdf"
                                                class="max-w-[156px] max-h-[156px] min-w-[156px] min-h-[156px] rounded-lg"
                                                width="156px" height="156px" />
                                        @else
                                            <img src="{{ Storage::url($document['path']) }}" alt="PDF Document"
                                                class="max-w-[144px] max-h-[144px] min-w-[144px] min-h-[144px] object-cover" />
                                        @endif

                                        <button type="button" wire:click="removeDocument({{ $loop->index }})"
                                            class="absolute text-rose-600 dark:text-rose-500 hover:text-rose-500 dark:hover:text-rose-400 bottom-1 left-1 p-1 bg-[#00000063] rounded-lg ">
                                            <svg aria-hidden="true" class="w-4 h-4" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                            <span class="sr-only">Remove document</span>
                                        </button>
                                    </div>
                                @endforeach
                            </div>

                            <div class="flex items-center justify-center w-full">
                                <label for="dropzone-file"
                                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                                        </svg>
                                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400">
                                            <span class="font-semibold">Click to upload</span> or drag and drop
                                        </p>
                                        <p class="text-xs text-gray-500 dark:text-gray-400">PDF (MAX. 5MB)</p>
                                    </div>
                                    <input id="dropzone-file" type="file" wire:model="newDocuments" multiple
                                        class="hidden">
                                </label>
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
    </section>

</div>
