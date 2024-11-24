<x-guest-layout>

    {{-- Hero --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl text-center lg:py-16 lg:px-12">
            <a href="{{ route('user.dashboard') }}"
                class="inline-flex justify-between items-center py-1 px-1 pr-4 mb-7 text-sm text-gray-700 bg-gray-100 rounded-full dark:bg-gray-800 dark:text-white hover:bg-gray-200 dark:hover:bg-gray-700"
                role="alert">
                <span class="text-xs bg-blue-600 rounded-full text-white px-4 py-1.5 mr-3">New</span> <span
                    class="text-sm font-medium">Clutch V2 is out! See what's new</span>
                <svg class="ml-2 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd"
                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                        clip-rule="evenodd"></path>
                </svg>
            </a>
            <h1
                class="mb-4 text-4xl font-extrabold tracking-tight leading-none text-gray-900 md:text-5xl lg:text-6xl dark:text-white">
                Start a car sharing business</h1>
            <p class="mb-8 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">
                Clutch is your gateway to entrepreneurial success, offering the tools and support you need to launch a
                lucrative car sharing venture.
            </p>
            <div class="flex flex-col mb-8 lg:mb-16 space-y-4 sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4">
                <a href="{{ getUser() ? route('user.vehicles') : route('register') }}"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Get Started
                    <svg class="ml-2 -mr-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                {{-- <a href="#"
                    class="inline-flex justify-center items-center py-3 px-5 text-base font-medium text-center text-gray-900 rounded-lg border border-gray-300 hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    <svg class="mr-2 -ml-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z">
                        </path>
                    </svg>
                    Watch video
                </a> --}}
            </div>

            {{-- Insurance Provider --}}
            <div class="px-4 mx-auto text-center md:max-w-screen-md lg:max-w-screen-lg lg:px-36">
                <span class="font-semibold text-gray-400 uppercase">Insurance Provider </span>
                <div class="flex flex-wrap justify-center items-center mt-8 text-gray-500 sm:justify-between">
                    <a href="#" class="mr-5 mb-5 lg:mb-0 hover:text-gray-800 dark:hover:text-gray-400">
                        <svg version="1.0" xmlns="http://www.w3.org/2000/svg" width="242.000000pt" height="68.000000pt"
                            viewBox="0 0 242.000000 68.000000">
                            <metadata>
                                Created by https://github.com/samuelaustinudhedhe 11/24/2024
                            </metadata>
                            <g transform="translate(0.000000,68.000000) scale(0.100000,-0.100000)" fill="currentColor"
                                stroke="none">
                                <path d="M402 534 c-41 -28 -27 -132 26 -187 31 -32 103 -56 149 -50 56 9 82
                       61 42 86 -12 8 -27 6 -53 -7 -27 -13 -41 -14 -56 -6 -28 15 -35 54 -16 82 22
                       31 20 45 -9 73 -28 29 -51 31 -83 9z m60 -64 c-1 -19 -3 -50 -3 -69 l0 -33
                       -20 21 c-29 31 -38 62 -26 94 7 21 15 27 31 25 17 -2 21 -9 18 -38z m105 -106
                       c33 16 38 16 52 1 23 -23 2 -49 -41 -53 -26 -2 -43 4 -67 23 -37 32 -41 52 -5
                       29 24 -16 27 -16 61 0z" />
                                <path d="M580 511 c0 -15 6 -21 21 -21 14 0 19 5 17 17 -5 26 -38 29 -38 4z" />
                                <path d="M247 502 c-10 -10 -17 -22 -17 -26 0 -5 8 2 18 14 34 42 82 0 82 -71
                       0 -33 -40 -78 -71 -80 -11 -1 -23 -3 -29 -4 -5 -1 -14 -3 -19 -4 -39 -5 -54
                       -76 -23 -104 62 -57 174 36 174 142 -1 57 -24 114 -56 136 -27 20 -39 19 -59
                       -3z m68 -189 c-2 -10 -4 -24 -4 -30 -1 -7 -4 -12 -8 -11 -5 1 -21 -6 -36 -16
                       -24 -16 -30 -17 -38 -5 -5 8 -6 20 -4 28 5 11 3 12 -10 1 -9 -8 -15 -8 -15 -2
                       0 15 13 22 68 37 26 7 48 13 49 14 1 0 0 -7 -2 -16z" />
                                <path d="M710 320 c0 -64 3 -80 15 -80 11 0 15 13 15 53 0 63 10 80 41 75 22
                       -3 24 -8 27 -65 2 -46 7 -63 17 -63 10 0 15 17 17 63 3 62 3 62 33 62 30 0 30
                       0 33 -62 2 -47 7 -63 17 -63 21 0 20 108 -1 138 -17 25 -56 29 -74 7 -11 -13
                       -14 -13 -27 0 -18 18 -45 19 -62 3 -11 -10 -14 -10 -18 0 -3 6 -11 12 -19 12
                       -11 0 -14 -18 -14 -80z" />
                                <path d="M980 337 c0 -49 4 -68 18 -80 20 -19 67 -23 77 -7 12 20 21 9 17 -20
                       -4 -28 -7 -30 -48 -30 -29 0 -44 -4 -44 -12 0 -9 17 -12 60 -10 l60 4 0 109
                       c0 90 -3 109 -15 109 -12 0 -15 -13 -15 -60 0 -55 -2 -62 -25 -72 -37 -17 -53
                       3 -57 70 -2 33 -8 57 -15 60 -10 3 -13 -14 -13 -61z" />
                                <path d="M1185 375 c-33 -32 -34 -83 -2 -113 29 -28 87 -29 110 -4 21 23 22
                       42 2 42 -8 0 -15 -4 -15 -10 0 -5 -9 -14 -21 -20 -45 -25 -94 51 -57 88 17 17
                       65 15 76 -4 5 -9 18 -14 28 -12 17 3 17 6 -8 31 -35 35 -80 36 -113 2z" />
                                <path d="M1371 383 c-33 -27 -38 -82 -11 -116 27 -34 89 -38 120 -7 31 31 27
                       93 -6 119 -33 26 -75 27 -103 4z m87 -25 c7 -7 12 -27 12 -45 0 -45 -37 -64
                       -75 -39 -26 17 -32 45 -15 77 12 22 59 26 78 7z" />
                                <path d="M1520 391 c0 -6 12 -42 26 -81 24 -64 29 -71 51 -68 20 2 28 15 48
                       73 29 81 29 85 12 85 -7 0 -23 -31 -36 -70 -12 -38 -24 -70 -26 -70 -3 0 -14
                       32 -26 70 -13 43 -26 70 -35 70 -8 0 -14 -4 -14 -9z" />
                                <path d="M1716 379 c-33 -26 -37 -88 -6 -119 23 -23 77 -27 105 -7 29 22 9 40
                       -21 20 -20 -13 -30 -14 -49 -5 -14 7 -25 18 -25 27 0 12 13 15 60 15 54 0 60
                       2 60 20 0 28 -44 70 -73 70 -13 0 -36 -9 -51 -21z m82 -21 c21 -21 13 -28 -33
                       -28 -43 0 -58 14 -38 33 11 11 58 8 71 -5z" />
                                <path d="M1877 393 c-4 -3 -7 -40 -7 -80 0 -65 2 -74 17 -71 14 3 17 12 14 51
                       -3 52 10 77 40 77 11 0 19 7 19 15 0 18 -21 20 -39 3 -11 -10 -14 -10 -18 0
                       -5 13 -16 16 -26 5z" />
                                <path d="M2065 375 c-32 -31 -34 -86 -5 -115 23 -23 79 -27 99 -7 11 10 14 10
                       18 0 7 -18 43 -16 43 2 0 8 -4 15 -10 15 -6 0 -10 28 -10 65 0 65 -6 75 -28
                       53 -9 -9 -15 -9 -24 0 -19 19 -57 14 -83 -13z m93 -17 c17 -17 15 -64 -4 -82
                       -33 -34 -84 -8 -84 43 0 34 17 51 50 51 14 0 31 -5 38 -12z" />
                                <path d="M2250 320 c0 -64 3 -80 15 -80 12 0 15 16 15 80 0 64 -3 80 -15 80
                       -12 0 -15 -16 -15 -80z" />
                                <path d="M1970 275 c-15 -18 -5 -35 21 -35 12 0 19 7 19 19 0 24 -25 34 -40
                       16z" />
                                <path d="M353 251 c-81 -59 -98 -161 -26 -161 24 0 46 35 35 55 -4 6 -8 1 -10
                       -10 -6 -29 -17 -38 -41 -30 -50 16 5 115 64 115 36 0 78 -24 94 -53 25 -48 99
                       -40 115 11 19 58 -42 102 -137 102 -44 0 -62 -6 -94 -29z m147 -4 c0 -4 4 -6
                       9 -3 11 7 34 -20 38 -44 1 -11 -2 -22 -7 -25 -17 -10 -56 6 -65 28 -6 12 -21
                       24 -35 28 l-25 6 25 11 c29 12 60 11 60 -1z" />
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{--  --}}
    <section class="bg-white dark:bg-gray-800">
        <div class="py-8 px-4 mx-auto space-y-12 max-w-screen-xl lg:space-y-20 sm:py-16 lg:px-6">
            <!-- Row -->
            <div class="gap-8 items-center lg:grid lg:grid-cols-2 xl:gap-16 flex flex-col max-lg:flex-col-reverse">
                <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Empower
                        Yourself</h2>
                    <p class="mb-8 font-light lg:text-xl">Start your own car sharing enterprise. Set your own schedule
                        and manage your business from anywhere.</p>
                    <!-- List -->
                    <ul role="list" class="pt-8 my-7 space-y-5 border-t border-gray-200 dark:border-gray-700">
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Enjoy Full
                                Autonomy</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Tailor Your
                                Experience</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">Drive Your
                                Ambition</span>
                        </li>
                    </ul>
                    <p class="mb-8 font-light lg:text-xl">Scale to your goals, share as many cars as you want, and grow
                        your income as you see fit. Start small, dream big. No need for a huge investment. Use a car you
                        already own to begin earning.</p>
                </div>
                <img class="mb-4 w-full lg:mb-0 lg:flex rounded-lg h-[32rem] max-md:max-h-[24rem] object-cover object-left-top"
                    src="{{ asset('assets/images/banners/car_host.jpg') }}" alt="office feature image">
            </div>
            <!-- Row -->
            <div class="gap-8 items-center lg:grid lg:grid-cols-2 xl:gap-16 ">
                <img class="mb-4 w-full lg:mb-0 lg:flex rounded-lg h-[32rem] max-md:max-h-[24rem] object-cover object-left-top"
                    src="{{ asset('assets/images/banners/car_entrepreneur.jpg') }}" alt="office feature image 2">
                <div class="text-gray-500 sm:text-lg dark:text-gray-400">
                    <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Unlock Your
                        Entrepreneurial Potential</h2>
                    <p class="mb-8 font-light lg:text-xl">Embrace opportunities at every level of entrepreneurship.
                        Start with a single vehicle and expand at your own pace, whether you're seeking additional
                        income or aiming to establish a successful fleet.</p>
                    <!-- List -->
                    <ul role="list" class="pt-8 my-7 space-y-5 border-t border-gray-200 dark:border-gray-700">
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">₦3.9
                                Million - Average annual income with 1 car</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">₦11.71
                                Million - Average annual income with 3 cars</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">₦19.52
                                Million - Average annual income with 5 cars</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">₦27 Million
                                - Average annual income with 7 cars</span>
                        </li>
                        <li class="flex space-x-3">
                            <!-- Icon -->
                            <svg class="flex-shrink-0 w-5 h-5 text-blue-600 dark:text-blue-500" fill="currentColor"
                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-base font-medium leading-tight text-gray-900 dark:text-white">₦35 Million
                                - Average annual income with 9 cars</span>
                        </li>
                    </ul>
                    <p class="font-light lg:text-xl">Deliver great service experiences fast - without the complexity of
                        traditional ITSM solutions.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Start Strong --}}
    <section class="bg-gray-100 dark:bg-gray-900">
        <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
            <div class="max-w-screen-md mb-8 lg:mb-16">
                <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">
                    Start strong with Clutch
                </h2>
                <p class="text-gray-500 sm:text-xl dark:text-gray-400">
                    Clutch's marketplace integration provides car owners with essential tools to excel in car-sharing.
                    Manage your fleet, optimize rentals, and enhance customer satisfaction with our streamlined
                    features.
                </p>
            </div>
            <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Insurance covered </h3>
                    <p class="text-gray-500 dark:text-gray-400">
                        Enjoy peace of mind knowing all listed vehicles are 100% comprehensively insured and User
                        liability also covered.
                    </p>
                </div>
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Safety & support
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400">Get access to 24/7 customer support for any on-trip
                        challenges and we provide business coaching to help car owners build a successful business .</p>
                </div>
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z"
                                clip-rule="evenodd"></path>
                            <path
                                d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Communication</h3>
                    <p class="text-gray-500 dark:text-gray-400">Our built-in chat feature enables seamless
                        communication between hosts and renters, allowing for secure location sharing and ensuring
                        Clutch protects your interests.</p>
                </div>
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z">
                            </path>
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Vehicle Security</h3>
                    <p class="text-gray-500 dark:text-gray-400">
                        Gain real-time insights with continuous telematics monitoring, allowing you to track location,
                        speed, mileage, and vehicle health for optimal performance and security.

                    </p>
                </div>
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Enterprise UX/UI Design</h3>
                    <p class="text-gray-500 dark:text-gray-400">Manage your business and your bookings seamlessly on
                        the go — manage trips, tweak your pricing, message your guests, and more, all from your phone.
                    </p>
                </div>
                <div>
                    <div
                        class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-blue-100 lg:h-12 lg:w-12 dark:bg-blue-900">
                        <svg class="w-5 h-5 text-blue-600 lg:w-6 lg:h-6 dark:text-blue-300" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold dark:text-white">Demand generation </h3>
                    <p class="text-gray-500 dark:text-gray-400">Get instant access to Thousands of active guests from
                        around Nigeria, plus marketing and advertising support from Clutch, the Nigerian’s largest car
                        sharing marketplace.

                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact us  --}}
    @include('pages.components.still-have-question')
</x-guest-layout>
