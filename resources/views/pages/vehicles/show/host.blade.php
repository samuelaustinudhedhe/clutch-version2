<div class="">
    <div class="space-y-4">
        <p class="text-sm font-bold">Hosted by </p>

        <div class="flex items-center gap-4">
            <div class="relative w-20 h-20 ">
                <img class="w-20 h-20 rounded-full border border-gray-200 shadow-sm dark:border-gray-700"
                    src="{{ $vehicle->owner->profile_photo_url }}" alt="{{ $vehicle->owner->name . 'Photo' }}">
                <div class="flex items-center space-x-1 absolute bottom-0 left-1/2 transform -translate-x-1/2">
                    <span
                        class="flex bg-white dark:bg-gray-800 rounded-lg text-sm border border-gray-200 shadow-sm dark:border-gray-700 px-2 py-0.5 gap-1">
                        {{ $vehicle->owner->rating }}
                        <svg class="w-4 h-4 dark:text-indigo-400 text-indigo-800" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            viewBox="0 0 24 24">
                            <path
                                d="M13.849 4.22c-.684-1.626-3.014-1.626-3.698 0L8.397 8.387l-4.552.361c-1.775.14-2.495 2.331-1.142 3.477l3.468 2.937-1.06 4.392c-.413 1.713 1.472 3.067 2.992 2.149L12 19.35l3.897 2.354c1.52.918 3.405-.436 2.992-2.15l-1.06-4.39 3.468-2.938c1.353-1.146.633-3.336-1.142-3.477l-4.552-.36-1.754-4.17Z" />
                        </svg>
                    </span>
                </div>
            </div>
            <div class="">
                <h3 class="">{{ $vehicle->owner->name }}</h3>
                <p>{{ $vehicle->owner->created_at->format('M Y') }}</p>
            </div>
        </div>
    </div>
</div>