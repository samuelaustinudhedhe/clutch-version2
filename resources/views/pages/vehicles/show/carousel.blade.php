{{-- Vehicle Carousel --}}

<div id="indicators-carousel" class="relative w-full" data-carousel="static" x-init="initCarousels()">
    <!-- Carousel wrapper -->
    <div class="relative min-h-[280px] overflow-hidden lg:rounded-lg rounded-none md:h-[500px]">
        <!-- Item 1 -->
        @php
            $vehicleGallery = $vehicle->gallery->sortByDesc('is_featured');
        @endphp
        @foreach ($vehicleGallery as $image)
            <img class=" w-full h-full object-cover duration-700 ease-in-out"
                @if ($image->is_featured) data-carousel-item="active"
                @else
                    data-carousel-item @endif
                src="{{ $image->url }}" alt="{{ $image->name ?? 'Vehicle Image ' . $loop->index }}">
        @endforeach
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex -translate-x-1/2 space-x-3 rtl:space-x-reverse bottom-5 left-1/2">
        @foreach ($vehicleGallery as $index => $image)
            <button type="button" class="w-3 h-3 rounded-full" aria-current="true"
                aria-label="Slide {{ $index }}" data-carousel-slide-to="{{ $index }}"></button>
        @endforeach
    </div>
    
    <!-- Slider controls -->
    <button type="button"
        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
        data-carousel-prev>
        <span
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-200/30 group-hover:bg-white/50 dark:group-hover:bg-gray-200/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
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
            class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-200/30 group-hover:bg-white/50 dark:group-hover:bg-gray-200/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
