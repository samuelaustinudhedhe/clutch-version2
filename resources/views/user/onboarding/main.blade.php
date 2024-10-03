{{-- Onboarding Layout --}}
<section class="bg-white dark:bg-gray-900 lg:py-0 lg:flex" wire:loading.class="opacity-50 pointer-events-none">
    {{-- Left Side --}}
    <div
        class="hidden relative w-full min-h-[650px] max-w-md p-12 lg:h-screen lg:block bg-gray-100 dark:bg-gray-800 text-gray-500 rounded-r-2xl">
        {{-- Logo --}}
        <div class="flex items-center justify-between mb-8 space-x-4">
            <a href="#" class="flex items-center text-2xl font-semibold">
                <img class="w-10 h-10 mr-2" src="{{ app_logo() }}" />
                <span class="text-xl font-semibold">{{ app_name() }}</span>
            </a>
            {{-- Darkmode Controls --}}
            @darkModeSwitch
        </div>

        <ul class="space-y-8 relative z-10">
            {{-- Welcome --}}
            <li class="flex items-center space-x-4">
                <div class="relative">
                    <div
                        class="w-10 h-10 flex items-center justify-center {{ $currentStep >= 0 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-5 h-5 {{ $currentStep >= 0 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
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
                    <p class="text-sm font-semibold">Get Started</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Get up and running in 3 minutes </p>
                </div>
            </li>
            {{-- Role --}}
            <li class="flex items-center space-x-4">
                <div class="relative">
                    <div
                        class="w-10 h-10 flex items-center justify-center {{ $currentStep >= 1 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-5 h-5 {{ $currentStep >= 1 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
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
                    <p class="text-sm font-semibold">Your Goal</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">What do you want to do</p>
                </div>
            </li>
            {{-- Personal Details --}}
            <li class="flex items-center space-x-4">
                <div class="relative">
                    <div
                        class="w-10 h-10 flex items-center justify-center {{ $currentStep >= 2 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-5 h-5 {{ $currentStep >= 2 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 5V4a1 1 0 0 0-1-1H8.914a1 1 0 0 0-.707.293L4.293 7.207A1 1 0 0 0 4 7.914V20a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-5M9 3v4a1 1 0 0 1-1 1H4m11.383.772 2.745 2.746m1.215-3.906a2.089 2.089 0 0 1 0 2.953l-6.65 6.646L9 17.95l.739-3.692 6.646-6.646a2.087 2.087 0 0 1 2.958 0Z" />
                        </svg>

                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 2 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-sm font-semibold">Personal Details</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Help us get to know you</p>
                </div>
            </li>
            {{-- Verification --}}
            <li class="flex items-center space-x-4">
                <div class="relative">
                    <div
                        class="w-10 h-10 flex items-center justify-center {{ $currentStep >= 3 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-5 h-5 {{ $currentStep >= 3 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M11.644 3.066a1 1 0 0 1 .712 0l7 2.666A1 1 0 0 1 20 6.68a17.694 17.694 0 0 1-2.023 7.98 17.406 17.406 0 0 1-5.402 6.158 1 1 0 0 1-1.15 0 17.405 17.405 0 0 1-5.403-6.157A17.695 17.695 0 0 1 4 6.68a1 1 0 0 1 .644-.949l7-2.666Zm4.014 7.187a1 1 0 0 0-1.316-1.506l-3.296 2.884-.839-.838a1 1 0 0 0-1.414 1.414l1.5 1.5a1 1 0 0 0 1.366.046l4-3.5Z"
                                clip-rule="evenodd" />
                        </svg>


                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 3 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-sm font-semibold">Verification</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Enter your verification code</p>
                </div>
            </li>
            {{-- KYC --}}
            <li class="flex items-center space-x-4">
                <div class="relative">
                    <div
                        class="w-10 h-10 flex items-center justify-center {{ $currentStep >= 3 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-5 h-5 {{ $currentStep >= 3 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 21a9 9 0 1 0 0-18 9 9 0 0 0 0 18Zm0 0a8.949 8.949 0 0 0 4.951-1.488A3.987 3.987 0 0 0 13 16h-2a3.987 3.987 0 0 0-3.951 3.512A8.948 8.948 0 0 0 12 21Zm3-11a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>

                    </div>
                    <div
                        class="absolute w-1 h-12 {{ $currentStep >= 3 ? 'bg-blue-600' : 'bg-gray-300 dark:bg-gray-600' }} left-1/2 transform -translate-x-1/2 top-full">
                    </div>
                </div>
                <div>
                    <p class="text-sm font-semibold">KYC</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Verify your Identity</p>
                </div>
            </li>
            <li class="flex items-center space-x-4">
                <div class="relative">
                    <div
                        class="w-10 h-10 flex items-center justify-center {{ $currentStep >= 4 ? 'bg-blue-600' : 'bg-gray-200 dark:bg-gray-600' }} rounded-full">
                        <svg class="w-5 h-5 {{ $currentStep >= 4 ? 'text-white' : 'text-gray-600 dark:text-gray-300' }}"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                    </div>
                </div>
                <div>
                    <p class="text-sm font-semibold">Welcome Aboard</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400">All done</p>
                </div>
            </li>
        </ul>


        <div class="flex justify-between items-center mt-8 mb-12 absolute bottom-0">
            <a wire:click="skipOnboarding"
                class="text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-gray-300 hover:cursor-pointer">&larr;
                Back to Dashboard</a>
        </div>
    </div>

    {{-- Right Side --}}
    <div class="grid relative items-center h-screen mx-auto md:w-[46rem] min-h-[650px] px-4 md:px-8 xl:px-0">

        {{-- Logo --}}
        <div class="flex items-center justify-between absolute top-0 mb-8 mt-12 space-x-4 lg:hidden w-full">
            <a href="#" class="flex items-center text-2xl font-semibold">
                <img class="w-10 h-10 mr-2" src="{{ app_logo() }}" />
                <span class="text-gray-900 dark:text-white">{{ app_name() }}</span>
            </a>
            <a wire:click="skipOnboarding"
                class="text-sm text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 hover:cursor-pointer">
                < Back to Dashboard </a>

        </div>

        <div class="grid mx-auto w-full my-10">
            <h1 class="mb-6 text-2xl font-extrabold tracking-tight text-gray-800 leding-tight dark:text-white">
                {{ $stepNames[$currentStep] }}
            </h1>
            {{-- Onboarding content --}}
            <div class="h-[440px] overflow-y-auto px-2">

                @switch($currentStep)
                    @case(0)
                        @include('user.onboarding.introduction')
                    @break

                    @case(1)
                        @include('user.onboarding.select-role')
                    @break

                    @case(2)
                        @include('user.onboarding.personal-details')
                    @break

                    @case(3)
                        @include('user.onboarding.verification')
                    @break

                    @case(4)
                        @include('user.onboarding.kyc')
                    @break

                    @default
                        @include('user.onboarding.completed')
                @endswitch
            </div>

            <x-steps-navigation getStarted="Begain Onboarding Now" submit="Finished Onboarding" :totalSteps="$totalSteps"
                :currentStep="$currentStep" :nextStepName="$nextStepName" :prevStepName="$prevStepName" />

            @if ($currentStep < 1)
                <p class="mt-4 text-sm font-light text-gray-500 dark:text-gray-400">
                    Not read to onboard?
                    <a href="#" wire:click="skipOnboarding"
                        class="font-medium text-blue-600 hover:underline dark:text-blue-500">
                        Skip the Onboarding Process
                    </a>.
                </p>
            @endif

        </div>

        <div class="items-center justify-center w-full absolute bottom-0 right-5 left-5 md:w-[38rem] ">
            {{-- Progress Indicator --}}
            {{-- <div class="flex justify-between mt-8 mb-12 w-full">
                <div
                    class="flex-1 mx-1 h-1 {{ $currentStep >= 1 ? 'bg-blue-600 dark:bg-blue-800' : 'bg-gray-300 dark:bg-gray-500' }} rounded-full">
                </div>
                <div
                    class="flex-1 mx-1 h-1 {{ $currentStep >= 2 ? 'bg-blue-600 dark:bg-blue-800' : 'bg-gray-300 dark:bg-gray-500' }} rounded-full">
                </div>
                <div
                    class="flex-1 mx-1 h-1 {{ $currentStep >= 3 ? 'bg-blue-600 dark:bg-blue-800' : 'bg-gray-300 dark:bg-gray-500' }} rounded-full">
                </div>
                <div
                    class="flex-1 mx-1 h-1 {{ $currentStep >= 4 ? 'bg-blue-600 dark:bg-blue-800' : 'bg-gray-300 dark:bg-gray-500' }} rounded-full">
                </div>
                <div
                    class="flex-1 mx-1 h-1 {{ $currentStep >= 5 ? 'bg-blue-600 dark:bg-blue-800' : 'bg-gray-300 dark:bg-gray-500' }} rounded-full">
                </div>
            </div> --}}
        </div>
    </div>

</section>
