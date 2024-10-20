<x-guest-layout>

    <section
        class="lg:h-[40rem] grid items-center bg-[url('/assets/images/banners/x7x7faceliftrearview.jpeg')] bg-no-repeat bg-cover bg-center bg-gray-700 bg-blend-overlay">
        <div class="relative py-8 px-4 mx-auto max-w-screen-xl text-white lg:py-16 xl:px-0 z-1">
            <div class="mb-6 max-w-screen-md lg:mb-0 mx-auto text-center">
                <h1 class="mb-4 text-4xl font-extrabold tracking-tight leading-tight text-white md:text-5xl lg:text-6xl">
                    Your perfect ride is just a click away.
                </h1>
                <p class="mb-6 font-light text-gray-300 lg:mb-8 md:text-lg lg:text-xl">
                    From weekend adventures to business trips and daily errands, Clutch pairs you with friendly
                    local hosts offering the ideal vehicle for any situation.
                </p>
            </div>

            <form action="/vehicles" class="max-w-lg mx-auto mt-20">
                <label for="default-search"
                    class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 start-1 flex items-center ps-3 pointer-events-none">

                        <svg class="w-6 h-6  text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                            viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 13a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17.8 13.938h-.011a7 7 0 1 0-11.464.144h-.016l.14.171c.1.127.2.251.3.371L12 21l5.13-6.248c.194-.209.374-.429.54-.659l.13-.155Z" />
                        </svg>

                    </div>
                    <x-location loadJS="true" id="search-by-location" class="p-4 ps-12 pe-24 !text-lg"
                        placeholder="Enter address" required />
                    <button type="submit"
                        class="text-white absolute end-2.5 bottom-3.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
                </div>

            </form>

        </div>
    </section>
    {{-- partners --}}
    <section class="border-t border-b border-gray-100 dark:border-gray-700 bg-slate-200 dark:bg-slate-600">
        <div class="max-w-screen-xl px-4 py-8 mx-auto sm:py-12">
            
            <div
                class="grid grid-cols-2 gap-8 sm:gap-12 md:grid-cols-3 lg:grid-cols-4">

                <a href="#" class="flex items-center justify-center">
                    <img class="w-auto max-h-8 min-h-6 "
                        src="/assets/images/logos/talk-of-naija.png" alt="Talk Of Naija Logo">
                </a>

                <a href="#" class="flex items-center justify-center">
                    <img class="w-auto max-h-8 min-h-6"
                        src="/assets/images/logos/tech-crunch.png"
                        alt="Tech Crunch Logo">
                </a>

                <a href="#" class="flex items-center justify-center">
                    <img class="w-auto max-h-8 min-h-6 dark:invert"
                        src="/assets/images/logos/techpoint.png"
                        alt="Tech Point Logo">
                </a>

                <a href="#" class="flex items-center justify-center">
                    <img class="w-auto max-h-8 min-h-6"
                        src="/assets/images/logos/vanguard.png"
                        alt="Vanguard Logo">
                </a>

            </div>
        </div>
    </section>
</x-guest-layout>
