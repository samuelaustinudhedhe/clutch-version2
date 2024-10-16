<div class="flex items-start py-8 bg-white dark:bg-gray-900 w-full">

    <div class="container max-w-screen-md mx-auto px-4 md:px-8 md:max-h-[calc(100vh-200px)] md:overflow-auto ">

        {{-- Heading --}}
        <h1 class="text-xl tracking-tight text-gray-900 sm:mb-6 leding-tight dark:text-white">
            {{ $currentStepName }}
        </h1>
        @switch($currentStep)
            @case(0)
                <div>
                    Welcome to Vehicle Wizard
                </div>
            @break

            @case(1)
                @include('resources.vehicles.wizard.basic-informations')
            @break

            @case(2)
                @include('resources.vehicles.wizard.extirior-intirior')
            @break

            @case(3)
                @include('resources.vehicles.wizard.engine-transmission')
            @break

            @case(4)
                @include('resources.vehicles.wizard.safety-security')
            @break

            @case(5)
                @include('resources.vehicles.wizard.faults-modifications')
            @break

            @case(6)
                <!-- Step 6: Vehicle Documents -->
                @include('resources.vehicles.wizard.images')
            @break

            @case(7)
                <!-- Step 7: Insurance Documents -->
                @include('resources.vehicles.wizard.documents')
            @break

            @case(8)
                <!-- Step 8: Final Confirmation and Submission -->
                @include('resources.vehicles.wizard.price')
            @break
            @case(9)
                <!-- Step 8: Final Confirmation and Submission -->
                @include('resources.vehicles.wizard.review-submit')
            @break

            @default
                <!-- Additional code for default case -->
        @endswitch

        <x-steps-navigation getStarted="Get Started" submit="Submit" :totalSteps="$totalSteps" :currentStep="$currentStep" :nextStepName="$nextStepName"
            :prevStepName="$prevStepName" />

    </div>
    <div
        class="hidden xl:block relative w-full min-h-[750px] max-w-[340px] py-12 px-8 bg-gray-100 dark:bg-gray-800 text-gray-500 rounded-2xl border border-gray-200 dark:border-gray-700">
        <ul class="space-y-6 relative z-10">

            {{-- Welcome --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(0)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 0 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 0 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m10.051 8.102-3.778.322-1.994 1.994a.94.94 0 0 0 .533 1.6l2.698.316m8.39 1.617-.322 3.78-1.994 1.994a.94.94 0 0 1-1.595-.533l-.4-2.652m8.166-11.174a1.366 1.366 0 0 0-1.12-1.12c-1.616-.279-4.906-.623-6.38.853-1.671 1.672-5.211 8.015-6.31 10.023a.932.932 0 0 0 .162 1.111l.828.835.833.832a.932.932 0 0 0 1.111.163c2.008-1.102 8.35-4.642 10.021-6.312 1.475-1.478 1.133-4.77.855-6.385Zm-2.961 3.722a1.88 1.88 0 1 1-3.76 0 1.88 1.88 0 0 1 3.76 0Z" />
                        </svg>
                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 0 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Get Started</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Get your vehicle listed in today</p>
                </div>
            </li>

            {{-- Vehicle Information --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(1)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 1 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 1 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2"
                                d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 1 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Information</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Basic Vehicle Information</p>
                </div>
            </li>

            {{-- Vehicle Details --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(2)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 2 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 2 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="square" stroke-linejoin="round" stroke-width="2"
                                d="M10 19H5a1 1 0 0 1-1-1v-1a3 3 0 0 1 3-3h2m10 1a3 3 0 0 1-3 3m3-3a3 3 0 0 0-3-3m3 3h1m-4 3a3 3 0 0 1-3-3m3 3v1m-3-4a3 3 0 0 1 3-3m-3 3h-1m4-3v-1m-2.121 1.879-.707-.707m5.656 5.656-.707-.707m-4.242 0-.707.707m5.656-5.656-.707.707M12 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 2 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Basic Details</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">More about your vehicle</p>
                </div>
            </li>

            {{-- Vehicle Engine --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(3)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 3 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 3 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                        </svg>

                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 3 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Engine & Transmission</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">What keeps it going form A - B</p>
                </div>
            </li>

            {{-- Safety & Security --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(4)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 4 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 4 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                        </svg>

                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 4 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Safety</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Safety and Security features</p>
                </div>
            </li>

            {{-- Faults & Modifications --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(5)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 5 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 5 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                        </svg>

                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 5 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Faults</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Worth noting issue & Modification </p>
                </div>
            </li>

            {{-- Gallery Upload --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(6)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 6 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 6 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M11.644 3.066a1 1 0 0 1 .712 0l7 2.666A1 1 0 0 1 20 6.68a17.694 17.694 0 0 1-2.023 7.98 17.406 17.406 0 0 1-5.402 6.158 1 1 0 0 1-1.15 0 17.405 17.405 0 0 1-5.403-6.157A17.695 17.695 0 0 1 4 6.68a1 1 0 0 1 .644-.949l7-2.666Zm4.014 7.187a1 1 0 0 0-1.316-1.506l-3.296 2.884-.839-.838a1 1 0 0 0-1.414 1.414l1.5 1.5a1 1 0 0 0 1.366.046l4-3.5Z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 6 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Upload photos</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Upload your vehicle's recent gallery</p>
                </div>
            </li>

            {{-- Upload Documents --}}
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
                    <p class="text-xs font-semibold">Vehicle Documents</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Upload all vehicle documentations</p>
                </div>
            </li>

            {{-- Insurance --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(8)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 8 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 8 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2"
                                d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 8 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-xs font-semibold">Insurance</p>
                    <p class="text-xs text-gray-600 dark:text-gray-400">Add you Vehicle Insurance Details</p>
                </div>
            </li>

            {{-- Review --}}
            <li class="flex items-center space-x-4" wire:click="goToStep(9)">
                <div class="relative">
                    <div
                        class="w-8 h-8 flex items-center justify-center {{ $currentStep >= 9 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-4 h-4 {{ $currentStep >= 9 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
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
