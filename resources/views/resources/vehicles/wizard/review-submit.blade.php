<div>
    {{-- Gallery Section --}}
    <div id="indicators-carousel" class="relative w-full" data-carousel="static" x-init="initCarousels()">
        <!-- Carousel wrapper -->
        <x-div class="!p-0 relative min-h-[220px] overflow-hidden lg:rounded-lg md:h-[340px]">
            <!-- Item 1 -->
            @foreach ($images['uploaded'] as $index => $image)
                <img class="hidden w-full h-full object-cover duration-700 ease-in-out"
                    @if ($images['featuredIndex'] === $index) data-carousel-item="active"
                    @else
                        data-carousel-item @endif
                    src="{{ Storage::url($image['path']) ?? placeholder('car.png') }}"
                    alt="{{ $image->name ?? 'Vehicle Image ' . $loop->index }}">
            @endforeach
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
                @foreach ($images['uploaded'] as $index => $image)
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="true"
                        aria-label="Slide {{ $index }}" data-carousel-slide-to="{{ $index }}"></button>
                @endforeach
            </div>

        </x-div>

        <!-- Slider controls -->
        <button type="button"
            class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-prev>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-300/30 group-hover:bg-white/50 dark:group-hover:bg-gray-300/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-gray-800 dark:text-gray-200 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 1 1 5l4 4" />
                </svg>
                <span class="sr-only">Previous</span>
            </span>
        </button>
        <button type="button"
            class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
            data-carousel-next>
            <span
                class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-300/30 group-hover:bg-white/50 dark:group-hover:bg-gray-300/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                <svg class="w-4 h-4 text-gray-800 dark:text-gray-200 rtl:rotate-180" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="m1 9 4-4-4-4" />
                </svg>
                <span class="sr-only">Next</span>
            </span>
        </button>
    </div>

    <x-div class="w-full space-y-2">
        <div class="space-y-2">
            <h1 class="text-2xl capitalize">
                {{ $storeData['details']['make'] . ' ' . $storeData['details']['model'] . ' ' . $storeData['details']['year'] }}
            </h1>
            <div class="flex items-baseline ">
                <span class="flex items-center !text-[21px] font-semibold"
                    title="This is not the actual rating for your vehicle">{{ $user->rating ?? 4.9 }} <svg
                        class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                        viewBox="0 0 24 24">
                        <path
                            d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                    </svg>
                </span>
                <span class="ml-2"
                    title="This is not the actual trips your vehicle has taken">({{ '5 trips' }})</span>
            </div>
        </div>
        <div class="flex flex-nowrap items-baseline gap-2">
            @isset($storeData['price'])
                @if ($storeData['price']['on_sale'] === 'true')
                    <span class="text-lg line-through opacity-60">{{ humanifyPrice($storeData['price']['amount']) }}</span>
                    <span class="text-2xl font-semibold">{{ humanifyPrice($storeData['price']['sale']) }}</span>
                @else
                    <span class="text-2xl font-semibold">{{ humanifyPrice($storeData['price']['amount']) }}</span>
                @endif
            @else
                <span class="text-2xl font-semibold">unknown</span>
            @endisset
            / day
        </div>
        {{-- Discount text --}}
        @isset($storeData['price']['discount']['days'])
            <p class="text-xs mt-4">The discount is applied if the vehicle is rented for
                <span class="font-bold"> {{ countDays($storeData['price']['discount']['days'] ?? 1) }} </span> or more
            </p>
        @endisset

    </x-div>
    
    {{-- Right --}}
    <x-div class="w-full">

        <div class="grid grid-cols-2 gap-8 mb-8">
            {{--  --}}
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="none" viewBox="0 0 24 24"
                    class="text-gray-700 dark:text-gray-200" role="img" version="1.1">
                    <path fill="currentColor"
                        d="M20.47 21.12c0 .34.27.62.62.62s.63-.28.63-.63V9.78c0-1.14-1.09-2.04-2.1-2.08h-.84l-2.85-4.62c-.32-.48-.97-.83-1.55-.83h-4.07c-.71 0-1.29.58-1.29 1.29v2.6a.625.625 0 0 0 1.25 0l.04-2.65h4.07c.16 0 .42.14.5.26l3.02 4.9c.11.19.31.3.53.3h1.16c.38.02.88.43.88.83z">
                    </path>
                    <path fill="currentColor"
                        d="M2.87 21.74h16.26c.35 0 .62-.29.62-.63s-.27-.62-.62-.62H3.5V8.99h6.15c.34 0 .62-.29.62-.63s-.27-.62-.62-.62H2.87c-.34 0-.62.28-.62.62v12.75c0 .35.28.63.62.63">
                    </path>
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M11.91 8.99h3.87c.23 0 .44-.13.57-.34.1-.2.09-.45-.04-.64l-1.94-2.84a.63.63 0 0 0-.52-.27h-1.94c-.34 0-.62.28-.62.62v2.85c0 .34.27.62.62.62m2.68-1.25h-2.06V6.15h.98zM2.87 6.77h3.67c.34 0 .62-.28.62-.63V3.81c0-.86-.65-1.56-1.45-1.56H3.7c-.81 0-1.45.68-1.45 1.56v2.33c0 .35.28.63.62.63m3.04-1.25H3.5V3.81c0-.17.09-.31.2-.31h2.01c.09 0 .2.13.2.31zM9.56 15.73c0 1.33 1.08 2.42 2.42 2.42a2.43 2.43 0 0 0 2.43-2.42c0-1.104-1.553-3.91-1.875-4.49l-.005-.01c-.22-.39-.87-.39-1.09 0-.31.56-1.88 3.4-1.88 4.5m1.25 0c0-.4.54-1.64 1.17-2.87.63 1.22 1.18 2.47 1.17 2.87 0 .64-.53 1.17-1.17 1.17s-1.17-.52-1.17-1.17"
                        clip-rule="evenodd"></path>
                </svg>
                <p class="text-sm">{{ $storeData['details']['fuel']['economy'] }} MPG</p>
            </div>
            {{--  --}}
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="none" viewBox="0 0 24 24"
                    class="text-gray-700 dark:text-gray-200" role="img" version="1.1">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M9.58 15.24c0 1.6 1.3 2.9 2.9 2.9a2.9 2.9 0 0 0 2.89-2.9c0-1.02-1.11-3.29-2.04-5.02-.34-.63-1.37-.63-1.71 0-.93 1.73-2.04 4-2.04 5.02m1.25 0c0-.52.64-2.05 1.65-3.97 1.01 1.92 1.64 3.46 1.65 3.97 0 .91-.74 1.65-1.65 1.65s-1.65-.74-1.65-1.65"
                        clip-rule="evenodd"></path>
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M20.95 22.35V1.62c0-.34-.27-.62-.62-.62h-4.87c-1.04 0-2.04.39-2.8 1.1a.61.61 0 0 0-.04.88c.24.25.63.27.89.03.53-.49 1.22-.76 1.95-.76h4.25V4.5H9.84c-.16 0-.32.07-.44.18L4.19 9.89c-.11.11-.18.27-.18.44v12.03c0 .34.27.62.62.62h15.7c.35 0 .63-.28.62-.63m-1.24-.62H5.26V10.59l4.84-4.84h9.61z"
                        clip-rule="evenodd"></path>
                    <path fill="currentColor"
                        d="M4.18 7.43a.63.63 0 0 0 .89-.01l1.85-1.85c.24-.24.24-.64 0-.88a.63.63 0 0 0-.88 0L4.18 6.55c-.24.24-.24.64 0 .88">
                    </path>
                </svg>
                <p class="text-sm">{{ $storeData['details']['fuel']['type'] }}</p>
            </div>
            {{--  --}}
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="none"
                    viewBox="0 0 24 24" class="text-gray-700 dark:text-gray-200" role="img" version="1.1">
                    <path fill="currentColor"
                        d="M19.67 21.45H7.27c-1.33 0-2.5-.85-2.91-2.1l-2.2-6.68c-.38-1.14-.05-2.4.83-3.21l6.08-5.63c.8-.75 2.28-1.33 3.38-1.33h8.92c.35 0 .62.28.62.62s-.28.62-.62.62h-8.92c-.78 0-1.96.46-2.53.99l-6.09 5.64c-.52.48-.71 1.23-.49 1.9l2.2 6.68c.25.75.94 1.25 1.72 1.25h12.4c.59 0 1.07-.48 1.07-1.07V5.51c0-.34.28-.62.62-.62s.62.28.62.62v13.61a2.3 2.3 0 0 1-2.3 2.33">
                    </path>
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M18.15 11.33H6.92c-.7 0-.93-.39-1-.56-.06-.17-.16-.62.35-1.1l4.27-4.03c.46-.43 1.27-.76 1.9-.76h5.71c.81 0 1.47.66 1.47 1.47v3.51c0 .81-.66 1.47-1.47 1.47m-10.5-1.25h10.5c.13 0 .22-.1.22-.22v-3.5c0-.12-.1-.22-.22-.22h-5.71c-.31 0-.82.2-1.04.42z"
                        clip-rule="evenodd"></path>
                    <path fill="currentColor"
                        d="M17.04 13.72h1.95c.35 0 .62-.28.62-.62s-.27-.62-.62-.62h-1.95c-.34 0-.62.28-.62.62s.27.62.62.62">
                    </path>
                </svg>
                <p class="text-sm">{{ $storeData['details']['exterior']['doors'] }} doors</p>
            </div>
            {{--  --}}
            <div class="flex items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="30px" height="30px" fill="none"
                    viewBox="0 0 24 24" class="text-gray-700 dark:text-gray-200" role="img" version="1.1">
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M14.32 5.75h1.16c.45 0 .86-.23 1.11-.6s.3-.84.13-1.25l-.35-.86a1.83 1.83 0 0 0-1.7-1.14H9.29c-.75 0-1.42.45-1.7 1.15l-.35.86c-.17.41-.12.88.13 1.25s.66.59 1.11.59h1.16v.992A3.484 3.484 0 0 0 6.34 9.6l-.89 4.85q-.12.615-.03 1.2a2.88 2.88 0 0 0-1.92 2.7v.8c0 1.58 1.28 2.87 2.86 2.87h11.21a2.88 2.88 0 0 0 2.87-2.86v-.8c0-1.48-1.16-2.73-2.63-2.85-.28-.02-.55.17-.65.44a2.44 2.44 0 0 1-2.68 1.59l-.92-.15c-.63-.1-1.26-.13-1.88-.11-.03 0-.69.01-1.3.11l-.91.15c-.79.13-1.57-.13-2.13-.7-.25-.25-.43-.54-.55-.85a.4.4 0 0 0-.04-.11 2.5 2.5 0 0 1-.07-1.19l.89-4.86A2.24 2.24 0 0 1 9.77 8h4.39c1.08 0 2 .77 2.2 1.83l.68 3.71a.626.626 0 0 0 1.23-.23l-.68-3.71a3.484 3.484 0 0 0-3.27-2.856zm-1.24 0h-2.2v.99h2.2zm-3.79-2.6c-.24 0-.45.14-.54.37l-.35.86.08.12h7c.01 0 .05 0 .07-.04l-.34-.94a.58.58 0 0 0-.54-.36H9.29zM5.81 16.84c-.62.23-1.06.83-1.06 1.51v.8c0 .89.72 1.61 1.61 1.61h11.2c.89 0 1.61-.72 1.61-1.61v-.8c0-.69-.44-1.29-1.07-1.52-.75 1.4-2.28 2.18-3.84 1.93l-.91-.15c-.54-.09-1.1-.12-1.64-.1-.01 0-.61.01-1.14.1l-.91.15c-1.2.19-2.37-.2-3.22-1.07-.26-.25-.47-.54-.63-.85"
                        clip-rule="evenodd"></path>
                    <path fill="currentColor" fill-rule="evenodd"
                        d="M13.87 16.27a1.558 1.558 0 0 0 1.37-.46c.36-.37.51-.89.42-1.4l-.58-3.19a2.05 2.05 0 0 0-2.01-1.68h-2.19c-.99 0-1.83.71-2.01 1.68l-.58 3.18c-.09.51.07 1.03.43 1.4s.87.54 1.39.46l1.23-.2c.4-.06.81-.06 1.21 0zm-1.14-1.44q-.39-.06-.78-.06-.42 0-.81.06l-1.23.2a.35.35 0 0 1-.3-.1.34.34 0 0 1-.09-.3l.58-3.18c.07-.38.4-.65.78-.65h2.2c.38 0 .71.27.78.65l.58 3.19c.03.15-.04.25-.09.3a.35.35 0 0 1-.3.1z"
                        clip-rule="evenodd"></path>
                </svg>
                <p class="text-sm">{{ $storeData['details']['interior']['seats'] }} seats</p>
            </div>
        </div>
        <div class="">
            <div class="space-y-4">
                <p class="text-sm font-bold">Hosted by </p>

                <div class="flex items-center gap-4">
                    <div class="relative w-20 h-20 ">
                        <img class="w-20 h-20 rounded-full border border-gray-200 shadow-sm dark:border-gray-700"
                            src="{{ $this->getOwner()->profile_photo_url }}" alt="{{ $this->getOwner()->name . ' Photo' }}">

                        <div class="flex items-center space-x-1 absolute bottom-0 left-1/2 transform -translate-x-1/2">
                            <span
                                class="flex bg-white dark:bg-gray-800 rounded-lg text-sm border border-gray-200 shadow-sm dark:border-gray-700 px-2 py-0.5 gap-1">
                                {{ $this->getOwner()->rating ?? '5.0' }}
                                <svg class="w-4 h-4 dark:text-indigo-400 text-indigo-800" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <div class="">
                        <h3 class="">{{ $this->getOwner()->name }}</h3>
                        <p>{{ $this->getOwner()->created_at->format('M Y') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </x-div>

    <x-div>

        <div class="flex flex-wrap lg:flex-nowrap gap-4 text-sm">
            <div class="w-full lg:w-1/2">
                <h3 class="text-lg font-light">Pickup Address</h3>
                <div class="gap-2 mt-2">
                    @foreach ($storeData['location']['pickup'] as $key => $value)
                        @if ($key === 'latitude' || $key === 'longitude')
                            @continue
                        @endif
                        <p><span class="capitalize opacity-70">{{ str_replace('_', ' ', $key) }}:</span>
                            {{ $value }}</p>
                    @endforeach
                </div>
            </div>
            <div class="w-full lg:w-1/2">
                <h3 class="text-lg font-light">Drop-off Address</h3>
                <div class="gap-2 mt-2">
                    @foreach ($storeData['location']['drop_off'] as $key => $value)
                        @if ($key === 'latitude' || $key === 'longitude')
                            @continue
                        @endif
                        <p><span class="capitalize opacity-70">{{ str_replace('_', ' ', $key) }}:</span>
                            {{ $value }}</p>
                    @endforeach
                </div>
            </div>
        </div>

    </x-div>
    <x-div class="!space-y-4">
        <h3 class="text-lg font-light">Description:</h3>
        <p class="text-sm">{{ $storeData['details']['description'] }}</p>
    </x-div>

    <x-div class="!space-y-4">
        <h3 class="text-lg font-light">Features</h3>
        <div class="flex flex-wrap gap-4 justify-center items-start mt-2">

            @foreach (['security', 'exterior', 'interior', 'engine', 'transmission', 'safety'] as $key)
                <div
                    class="w-full rounded-lg border border-gray-100 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800 md:p-6">
                    <h4 class="text-base font-semibold text-gray-900 dark:text-white capitalize">
                        {{ str_replace('_', ' ', $key) }}</h4>

                    <div class="mt-2 divide-y divide-gray-200 dark:divide-gray-700 dark:border-gray-800">
                        @foreach ($storeData['details'][$key] as $item => $value)
                            <dl class="flex items-center justify-between gap-4 py-2">
                                <dt class="text-xs font-medium text-gray-900 dark:text-white capitalize">
                                    {{ str_replace('_', ' ', $item) ?? '' }}
                                </dt>
                                <dd class="text-sm font-normal text-gray-500 dark:text-gray-400 capitalize">
                                    {{ str_replace('-', ', ', $value) ?? '' }}</dd>
                            </dl>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>

    </x-div>

    <x-div>
        <h3 class="lg:text-xl text-lg font-medium lg:font-normal mb-4 px-4">Uploaded Documents</h3>
        <p class="lg:text-base text-sm text-gray-600 dark:text-gray-400 mb-4 px-4">
            Vehicle document you uploaded for this vehicle.
        </p>
        @foreach (['proof_of_ownership', 'registration', 'insurance'] as $key)
            {{-- Documents --}}
            @isset($storeData['files'][$key])
                <div class="flex items-center justify-between py-4 px-4">
                    <div class="lg:flex w-full">
                        <div class="w-full lg:w-2/5 text-sm font-medium text-gray-900 dark:text-white capitalize">
                            {{ str_replace('_', ' ', $key) ?? '' }}
                        </div>
                    </div>

                    @if (str_contains($storeData['files'][$key]['mime_type'], 'image'))
                        <img class="mb-4 min-w-20 min-h-14 max-w-20 max-h-14 rounded border-2 border-gray-200 dark:border-white sm:mb-0 object-cover"
                            src="{{ isset($storeData['files'][$key]) ? Storage::url($storeData['files'][$key]['path']) : '' }}"
                            alt="Uploaded Proof of Address">
                    @else
                        <div
                            class="overflow-hidden  rounded border-2 border-gray-200 dark:border-white w-20 h-14 transition-transform duration-500 transform translate-x-0">

                            <embed src="{{ Storage::url($storeData['files'][$key]['path']) }}" type="application/pdf"
                                class="max-w-[94px] max-h-[70px] min-w-[94px] min-h-[70px] mt-[-2px] ml-[-2px]"
                                width="94px" height="70px" />
                        </div>
                    @endif
                </div>
            @endisset
        @endforeach

    </x-div>
    @isset($storeData['documents']['insurance']['note'])
        <x-div class="!space-y-4">
            <h3 class="text-lg font-light">Insurance Note:</h3>
            <p class="text-sm">{{ $storeData['documents']['insurance']['note'] }}</p>
        </x-div>
    @endisset


</div>
