{{-- Vehicle Name and rating and trips count --}}
<h1 class="text-xl sm:text-2xl capitalize">{{ $vehicle->name ?? '' }}</h1>
<div class="flex items-baseline ">
    @if (isset($vehicle->rating) && $vehicle->rating > 0)
        <span class="flex items-center !text-[21px] font-semibold"
            title="This is not the actual rating for your vehicle">{{ $vehicle->rating }}<svg
                class="w-5 h-5 ml-1 text-gray-800 dark:text-indigo-500" aria-hidden="true"
                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
            </svg>
        </span>
    @endif

    @if (isset($vehicle->trips_count) && $vehicle->trips_count > 0)
        <span class="ml-2" title="Trips Taken">({{ '0 trips' }})</span>
    @endif
</div>
