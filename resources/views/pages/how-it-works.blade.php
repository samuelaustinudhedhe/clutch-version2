<x-guest-layout>
    {{-- Hero --}}
    <section class="bg-white dark:bg-gray-900">
        <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
            <div class="mr-auto place-self-center lg:col-span-7">
                <h1
                    class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">
                    Get started with {{ app_name() }} </h1>
                <p class="max-w-2xl mb-6 font-light text-gray-500 lg:mb-8 md:text-lg lg:text-xl dark:text-gray-400">
                    Clutch is a peer-to-peer car-sharing platform that allows car owners to earn extra income by renting out their vehicles for short-term use, offering renters a wide range of options from standard to luxury models.
                </p>
                <a href="{{ route('register') }}"
                    class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900">
                    Get started
                    <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
                <a href="{{ route('pages.contact') }}"
                    class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-gray-900 border border-gray-300 rounded-lg hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 dark:text-white dark:border-gray-700 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
                    Speak to Sales
                </a>
            </div>
            <div class=" lg:mt-0 lg:col-span-5 lg:flex">
                <img class="mb-4 w-full lg:mb-0 lg:flex rounded-lg h-[32rem] max-md:max-h-[24rem] object-cover object-left-top opacity-80"
                src="{{ asset('assets/images/banners/bmw-a-nobg.png') }}" alt="office feature image">            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="bg-gray-100 dark:bg-gray-800">
        <div class="py-8 px-4 mx-auto space-y-12 max-w-screen-xl lg:space-y-20 sm:py-16 lg:px-6">
            <div class="items-center gap-8 mx-auto lg:grid lg:grid-cols-2 xl:gap-16">

                <div>
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                        Hosting Your Car on {{ app_name() }}
                    </h2>
                    <p class="mt-4 text-base text-gray-500 sm:text-xl dark:text-gray-400">
                        {{ app_name() }} makes it easy for car owners to earn extra income by renting out their
                        vehicles. Here’s how to get started:
                    </p>

                    <div class="pt-8 mt-8 space-y-8 border-t border-gray-200 dark:border-gray-800">
                        <div class="flex gap-4">
                            <div
                                class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900 shrink-0">
                                <svg class="w-5 h-5 text-blue-700 dark:text-blue-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                    Become a Host
                                </h3>
                                <p class="mt-3 text-gray-500 dark:text-gray-400">
                                    Sign up on the {{ app_name() }} app or website, provide Host details, and upload
                                    Identification documents.
                                </p>

                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="flex items-center justify-center w-8 h-8 bg-purple-100 rounded-full dark:bg-purple-900 shrink-0">
                                <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                    Listing your Vehicle
                                </h3>
                                <p class="mt-3 text-gray-500 dark:text-gray-400">
                                    Set your availability, determine your pricing, and choose any additional options or
                                    requirements for renters. Our vehicle wizard will guide you through the entire
                                    vehicle setup process.
                                </p>

                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="flex items-center justify-center w-8 h-8 bg-teal-100 rounded-full dark:bg-teal-900 shrink-0">
                                <svg class="w-5 h-5 text-teal-600 dark;text-teal-300" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                    Welcome Your Renters
                                </h3>
                                <p class="mt-3 text-gray-500 dark:text-gray-400">
                                    Receive booking requests, coordinate with renters for pickup, and start earning
                                    money with each rental. It’s that easy!
                                </p>

                            </div>
                        </div>
                        {{-- Learn More --}}
                        <div class="mt-3">
                            <a href="{{ route('pages.become-a-host') }}"
                                class="inline-flex items-center font-medium text-blue-600 hover:underline dark:text-blue-500">
                                Learn more
                                <svg class="w-6 h-6 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <img class="w-full rounded-lg dark:block" src="{{ asset('assets/images/banners/car_rent.jpg') }}"
                        alt="">
                </div>
            </div>
            {{-- Row --}}
            <div class="items-center gap-8 mx-auto lg:grid lg:grid-cols-2 xl:gap-16">

                <div class="hidden lg:block">
                    <img class="w-full rounded-lg dark:block" src="{{ asset('assets/images/banners/car_driving.jpeg') }}"
                        alt="">
                </div>

                <div>
                    <h2 class="text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                        Renting a Car on {{ app_name() }}
                    </h2>
                    <p class="mt-4 text-base text-gray-500 sm:text-xl dark:text-gray-400">
                        {{ app_name() }} connects car owners with individuals seeking a short-term vehicle rental.
                        Here's how it
                        works:
                    </p>

                    <div class="pt-8 mt-8 space-y-8 border-t border-gray-200 dark:border-gray-800">
                        <div class="flex gap-4">
                            <div
                                class="flex items-center justify-center w-8 h-8 rounded-full bg-blue-100 dark:bg-blue-900 shrink-0">
                                <svg class="w-5 h-5 text-blue-700 dark:text-blue-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                    Search for your preferred car
                                </h3>
                                <p class="mt-3 text-gray-500 dark:text-gray-400">
                                    Register, enter location, date and browse thousands of cars shared by local car
                                    owners.
                                </p>
                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="flex items-center justify-center w-8 h-8 bg-purple-100 rounded-full dark:bg-purple-900 shrink-0">
                                <svg class="w-5 h-5 text-purple-600 dark:text-purple-400" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                    Book your Car
                                </h3>
                                <p class="mt-3 text-gray-500 dark:text-gray-400">
                                    Choose between chauffeur driven or self driven, Make Payment and say hi to your car.

                                </p>

                            </div>
                        </div>

                        <div class="flex gap-4">
                            <div
                                class="flex items-center justify-center w-8 h-8 bg-teal-100 rounded-full dark:bg-teal-900 shrink-0">
                                <svg class="w-5 h-5 text-teal-600 dark;text-teal-300" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M12.316 3.051a1 1 0 01.633 1.265l-4 12a1 1 0 11-1.898-.632l4-12a1 1 0 011.265-.633zM5.707 6.293a1 1 0 010 1.414L3.414 10l2.293 2.293a1 1 0 11-1.414 1.414l-3-3a1 1 0 010-1.414l3-3a1 1 0 011.414 0zm8.586 0a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 11-1.414-1.414L16.586 10l-2.293-2.293a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">
                                    Pick up and drive
                                </h3>
                                <p class="mt-3 text-gray-500 dark:text-gray-400">
                                    Schedule a pickup time with your host, grab the keys, and start your journey. That's
                                    it!
                                </p>

                            </div>
                        </div>
                        {{-- Learn More --}}
                        <div class="mt-3">
                            <a href="{{ route('pages.become-a-host') }}"
                                class="inline-flex items-center font-medium text-blue-600 hover:underline dark:text-blue-500">
                                Learn more
                                <svg class="w-6 h-6 ml-1" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Contact --}}
    @include('pages.components.still-have-question')
</x-guest-layout>
