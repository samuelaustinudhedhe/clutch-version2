<div x-data="{
    handleScroll(e) {
        e.preventDefault();
        this.$el.scrollLeft += e.deltaY;
    }
}" x-on:wheel.prevent="handleScroll" x-on:mousewheel.prevent="handleScroll"
    class="flex overflow-x-auto overflow-hidden gap-4 h-[72px] min-h-[72px] pt-4 mx-4 2xl:ml-0 filters-scrollbar">
    <div class="relative min-w-[220px] w-[320px] max-h-[40px] ">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <x-xinput type="text" wire:model.live="search" id="simple-search"
            class="block w-full p-2 py-2 pl-10 text-sm h-[40px] " placeholder="Search" required="" />
    </div>

    @isset($makesAndModels)
        <x-select id="make" wire:model.live="filterBy.make" title="" loadJS="true"
            class="h-[40px] min-w-[180px] w-[180px]">
            <option value="">Select Manufacturer</option>
            @foreach ($makesAndModels as $make => $models)
                <option value="{{ $make }}">{{ $make }}</option>
            @endforeach
        </x-select>
    @endisset

    @if (isset($makesAndModels) && !empty($filterBy['make']))

        <x-select id="model" wire:model="filterBy.model" title="" loadJS="true"
            class="h-[40px] min-w-[140px] w-[140px]">
            @foreach ($makesAndModels[$filterBy['make']] as $model)
                <option value="{{ $model }}">{{ $model }}</option>
            @endforeach
        </x-select>

    @endif

    <x-select id="year" wire:model.live="filterBy.year" title="" loadJS="true"
        class="h-[40px] min-w-[120px] w-[120px]">
        <option value="">Select Year</option>
        @for ($year = date('Y') + 1; $year >= 1900; $year--)
            <option value="{{ $year }}">{{ $year }}</option>
        @endfor
    </x-select>
</div>


{{-- 
<!-- drawer init and toggle -->
<div class="text-center">
    <button
        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
        type="button" data-drawer-target="drawer-example" data-drawer-show="drawer-example" data-drawer-body-scrolling="false"
        aria-controls="drawer-example">
        Show drawer
    </button>
</div>

<!-- drawer component -->
<div id="drawer-example"
    class="fixed top-0 left-0 z-40 h-screen p-4 overflow-y-auto transition-transform -translate-x-full bg-white w-80 dark:bg-gray-800"
    tabindex="-1" aria-labelledby="drawer-label">
    <h5 id="drawer-label"
        class="inline-flex items-center mb-4 text-base font-semibold text-gray-500 dark:text-gray-400"><svg
            class="w-4 h-4 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
            viewBox="0 0 20 20">
            <path
                d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
        </svg>Filter</h5>
    <button type="button" data-drawer-hide="drawer-example" aria-controls="drawer-example"
        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 absolute top-2.5 end-2.5 flex items-center justify-center dark:hover:bg-gray-600 dark:hover:text-white">
        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
        </svg>
        <span class="sr-only">Close menu</span>
    </button>

    <p class="mb-6 text-sm text-gray-500 dark:text-gray-400">
        Supercharge your search by taking advantage of our filters.
        Unlimited access to over 1K top-ranked vehicles in Nigeria.
    </p>
    <div class="relative ">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                    clip-rule="evenodd" />
            </svg>
        </div>
        <x-xinput type="text" wire:model.live="search" id="simple-search" class="block w-full p-2 py-2 pl-10 text-sm"
            placeholder="Search" required="" />
    </div>

    @isset($makesAndModels)
        <x-select id="make" wire:model.live="filterBy.make" title="" loadJS="true" class="">
            <option value="">Select Manufacturer</option>
            @foreach ($makesAndModels as $make => $models)
                <option value="{{ $make }}">{{ $make }}</option>
            @endforeach
        </x-select>
    @endisset

    @if (isset($makesAndModels) && !empty($filterBy['make']))

        <x-select id="model" wire:model="filterBy.model" title="" loadJS="true" class=" ">
            @foreach ($makesAndModels[$filterBy['make']] as $model)
                <option value="{{ $model }}">{{ $model }}</option>
            @endforeach
        </x-select>

    @endif

    <x-select id="year" wire:model.live="filterBy.year" title="" loadJS="true" class="">
        <option value="">Select Year</option>
        @for ($year = date('Y') + 1; $year >= 1900; $year--)
            <option value="{{ $year }}">{{ $year }}</option>
        @endfor
    </x-select>

</div> --}}
