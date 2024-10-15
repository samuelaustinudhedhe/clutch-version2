@if ($paginator->hasPages())
    {{-- Pagination --}}
    <nav class="flex flex-wrap sm:flex-nowrap items-center justify-between align-items-center w-full gap-y-3 md:flex-row md:items-center md:space-y-0"
        aria-label="Table navigation">
        <div class="flex items-center gap-4">
            <select id="rows" wire:model.lazy="perPage" wire:ignore
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block py-1.5 pl-3.5 pr-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ([1,2,3] as $multiplier)
                    @php
                        $current = $this->perPage ?? 10;
                        $optionValue = ($current * $multiplier);
                        if ($optionValue > $paginator->total()) {
                            break;
                        }
                    @endphp
                    <option value="{{ $optionValue }}">{{ $optionValue }}</option>
                @endforeach
            </select>
            <label for="rows" class="font-normal text-gray-500 dark:text-gray-400 md:block hidden">Rows</label>
        </div>
        <div class="flex items-center space-x-3">
            <div class="flex font-normal text-sm text-gray-500 dark:text-gray-400 gap-1 p-1 mx-6">
                <span class="md:block hidden">Showing</span>
                <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->firstItem() }}</span>
                -
                <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->lastItem() }}</span>
                of
                <span class="font-semibold text-gray-900 dark:text-white">{{ $paginator->total() }}</span>
            </div>
        </div>
        <ul class="inline-flex items-stretch -space-x-px w-full sm:w-40">
            <li class="w-full">
                @if ($paginator->onFirstPage())
                    <span
                        class="flex text-sm sm:w-20 items-center justify-center h-full w-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 cursor-not-allowed dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Previous</span>
                @else
                    <button wire:click="previousPage" wire:loading.attr="disabled"
                        class="flex text-sm sm:w-20 items-center justify-center h-full w-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border
                         border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700
                          dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</button>
                @endif
            </li>
            <li class="w-full">
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" wire:loading.attr="disabled"
                        class="flex text-sm sm:w-20 items-center justify-center h-full w-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</button>
                @else
                    <span
                        class="flex text-sm sm:w-20 items-center justify-center h-full w-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 cursor-not-allowed dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Next</span>
                @endif
            </li>
        </ul>
    </nav>
@endif