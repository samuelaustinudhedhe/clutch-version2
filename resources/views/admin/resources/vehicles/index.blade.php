<div>
    <!-- Start block -->
    <section class="bg-gray-50 dark:bg-gray-900 p-3 antialiased">
        <div class="mx-auto max-w-screen-2xl px-4">
            <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                    <div class="flex-1 flex items-center space-x-2">
                        <h5>
                            <span class="text-gray-500">All Vehicles:</span>
                            <span class="dark:text-white">{{ $vehiclesCount }}</span>
                        </h5>
                        <h5 class="text-gray-500 dark:text-gray-400 ml-1">{{ $vehicles->firstItem() }}-{{ $vehicles->lastItem() }} ({{ $vehicles->total() }})</h5>
                        <button type="button" class="group" data-tooltip-target="results-tooltip">
                            <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewbox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd" />
                            </svg>
                            <span class="sr-only">More info</span>
                        </button>
                        <div id="results-tooltip" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                            Showing {{ $vehicles->firstItem() }}-{{ $vehicles->lastItem() }} of {{ $vehicles->total() }} results
                            <div class="tooltip-arrow" data-popper-arrow=""></div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col md:flex-row items-stretch md:items-center md:space-x-3 space-y-3 md:space-y-0 justify-between mx-4 py-4 border-t dark:border-gray-700">
                    <div class="w-full md:w-1/2">
                        <x-search type="text" id="simple-search" wire:model.live='search' placeholder="Search for products" />
                    </div>
                    <div class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                        <x-button type="button" href="{{ route('admin.vehicles.wizard') }}">
                            <svg class="h-3.5 w-3.5 mr-1.5 -ml-1" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add vehicle
                        </x-button>
                        <div class="flex items-center space-x-3 w-full md:w-auto">
                            <button id="actionsDropdownButton" data-dropdown-toggle="actionsDropdown" class="w-full md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700" type="button">
                                Actions
                                <svg class="-mr-1 ml-1.5 w-5 h-5" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                    <path clip-rule="evenodd" fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" />
                                </svg>
                            </button>
                            <div id="actionsDropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="actionsDropdownButton">
                                    <li>
                                        <a href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Mass Edit</a>
                                    </li>
                                </ul>
                                <div class="py-1">
                                    <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete all</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="p-4 pr-0">
                                    <div class="flex items-center">
                                        <input id="checkbox-selectAll" type="checkbox" wire:model.live="selectAll"
                                            class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                        <label for="checkbox-all" class="sr-only">checkbox</label>
                                    </div>
                                </th>
                                <th scope="col" class="p-4" colspan="1">Vehicle</th>
                                <th scope="col" class="p-4">Type</th>
                                <th scope="col" class="p-4">Status</th>
                                <th scope="col" class="p-4">Price/Day</th>
                                <th scope="col" class="p-4">Rating</th>
                                <th scope="col" class="p-4">Owner</th>
                                {{-- <th scope="col" class="p-4">Promote</th> --}}
                                <th scope="col" class="p-4 text-right">Last Update</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach ($vehicles as $vehicle)
                                <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="p-4 w-4 pr-0">
                                        <div class="flex items-center">
                                            <input id="checkbox-{{ $vehicle->id }}" type="checkbox"
                                                value="{{ $vehicle->id }}" wire:model="selected"
                                                @if(in_array($vehicle->id, $selected)) checked @endif
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-{{ $vehicle->id }}" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                    <th scope="row" class="px-4 py-1 font-medium text-gray-900 whitespace-wrap dark:text-white">
                                        <a href="{{ route('admin.vehicles.show', $vehicle->id) }}" class="flex items-center mr-3 break-words ">
                                            <img src="{{ $vehicle->featured_image_url }}" alt="{{ $vehicle->featured_image->name ?? $vehicle->name }}" class="min-h-12 h-auto max-h-14 min-w-16 w-20 max-w-20 object-cover mr-3 rounded-md">
                                            {{ $vehicle->name }}
                                        </a>
                                    </th>
                                    <td class="px-4 py-3">
                                        <span class="bg-{{ $vehicle->type_color }}-100 text-{{ $vehicle->type_color }}-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-{{ $vehicle->type_color }}-900 dark:text-{{ $vehicle->type_color }}-300">{{ $vehicle->type }}</span>
                                    </td>

                                    {{-- Status --}}
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center">
                                            <div class="h-4 w-4 rounded-full inline-block mr-2 bg-{{ $vehicle->status_color }}-500"></div>
                                            {{ $vehicle->status }}
                                        </div>
                                    </td>

                                    {{-- Price --}}
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        @if ($vehicle->on_sale)
                                            <x-tooltip id="{{ $vehicle->id }}" class=" text-{{ $vehicle->on_sale_status_color }}">
                                                <x-slot name="trigger">
                                                    {{ $vehicle->human_sale_price }}
                                                </x-slot>
                                                <x-slot name="content">
                                                    <div class=" text-sm font-light">
                                                        <span class="text-{{ $vehicle->on_sale_status_color }} font-bold">{{ $vehicle->discount(true) }} </span> {{ countDays($vehicle->discount_days) }} discount 
                                                    </div>
                                                </x-slot>
                                            </x-tooltip>
                                        @else
                                            {{ $vehicle->human_price }}
                                        @endif
                                        
                                    </td>
                                    
                                    <td class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <div class="flex items-center text-lg">
                                            {{ $vehicle->rating_stars }}

                                            <span class="text-gray-500 text-xs dark:text-gray-400 ml-1">
                                                {{ $vehicle->rating }}
                                            </span>
                                        </div>
                                    </td>

                                    {{-- Owner --}}
                                    <td class="px-4 py-3">
                                        <a href="{{ route('admin.' . (strpos($vehicle->ownerable_type, 'Admin') !== false ? 'users' : 'users') . '.show', $vehicle->ownerable_id) }}">
                                                {{ $vehicle->owner->name ?? '' }}                                        
                                        </a>                                 
                                    </td>

                                    {{-- Promote --}}
                                    {{-- <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <label class="relative inline-flex items-center cursor-pointer">
                                            <input disabled type="checkbox" value="" class="sr-only peer" name="promote">
                                            <div
                                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-600 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                                            </div>
                                        </label>
                                    </td> --}}
                                    
                                    {{-- Actions --}}
                                    <td class="px-4 py-3 font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                                        <button id="dropdown-button-{{ $vehicle->id }}" type="button"
                                            data-dropdown-toggle="dropdown-{{ $vehicle->id }}"
                                            class="inline-flex items-center p-1 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none dark:text-gray-400 dark:hover:text-gray-100">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                        </button>
                                        <div id="dropdown-{{ $vehicle->id }}"
                                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                            <div class="block px-4 py-2 text-sm text-gray-400">
                                                {{ __('Action Menu') }}
                                            </div>
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdown-button-{{ $vehicle->id }}">
                                                <li>
                                                    <a data-drawer-target="drawer-update-product" data-drawer-show="drawer-update-product" aria-controls="drawer-update-product"
                                                        class="flex gap-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path d="M17.414 2.586a2 2 0 00-2.828 0L7 10.172V13h2.828l7.586-7.586a2 2 0 000-2.828z" />
                                                            <path fill-rule="evenodd" d="M2 6a2 2 0 012-2h4a1 1 0 010 2H4v10h10v-4a1 1 0 112 0v4a2 2 0 01-2 2H4a2 2 0 01-2-2V6z" clip-rule="evenodd" />
                                                        </svg>
                                                        Edit
                                                    </a>
                                                </li>
                                                <li>
                                                    <a data-drawer-target="drawer-read-product-advanced" data-drawer-show="drawer-read-product-advanced" aria-controls="drawer-read-product-advanced" 
                                                        class="flex gap-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor" class="w-4 h-4 mr-2 -ml-0.5">
                                                            <path d="M12 15a3 3 0 100-6 3 3 0 000 6z" />
                                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.323 11.447C2.811 6.976 7.028 3.75 12.001 3.75c4.97 0 9.185 3.223 10.675 7.69.12.362.12.752 0 1.113-1.487 4.471-5.705 7.697-10.677 7.697-4.97 0-9.186-3.223-10.675-7.69a1.762 1.762 0 010-1.113zM17.25 12a5.25 5.25 0 11-10.5 0 5.25 5.25 0 0110.5 0z" />
                                                        </svg>
                                                        Preview  </a>
                                                </li>
                                                <div class="border-t border-gray-200 dark:border-gray-600 my-1"></div>
                                                <li>
                                                    <a wire:click="deleteVehicles({{ $vehicle->id }})"
                                                        class="flex gap-2 px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 text-red-400 cursor-pointer">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 -ml-0.5" viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        </svg>
                                                        Delete
                                                    </a>
                                                </li>
                                            </ul>

                                        </div>


                                    </td>
                                </tr> 
                            @endforeach

                            {{-- If no Vehicle is found --}}
                            @empty($vehicles)
                               <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                    <td class="px-4 py-6 text-center text-md font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="10">
                                        {{ __('There are no Vehicles found at this time') }}
                                    </td>
                                </tr>  
                            @endempty
                        </tbody>
                    </table>
                </div>

                {{-- Pagination --}}
                <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
                    aria-label="Table navigation">
                    <div class="flex items-center space-x-3">
                        <label for="rows" class="font-normal text-gray-500 dark:text-gray-400">Rows per
                            page</label>
                        <select id="rows" wire:model.lazy="perPage"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block py-1.5 pl-3.5 pr-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option value="12">12</option>
                            <option value="21">21</option>
                            <option value="30">30</option>
                        </select>
                        <div class="font-normal text-gray-500 dark:text-gray-400">
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $vehicles->firstItem() }}</span>
                            -
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $vehicles->lastItem() }}</span>
                            of
                            <span class="font-semibold text-gray-900 dark:text-white">{{ $vehicles->total() }}</span>
                        </div>
                    </div>
                    <ul class="inline-flex items-stretch -space-x-px">
                        <li>
                            @if ($vehicles->onFirstPage())
                                <span
                                    class="flex text-sm w-20 items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 cursor-not-allowed dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Previous</span>
                            @else
                                <button wire:click="previousPage" wire:loading.attr="disabled"
                                    class="flex text-sm w-20 items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</button>
                            @endif
                        </li>
                        <li>
                            @if ($vehicles->hasMorePages())
                                <button wire:click="nextPage" wire:loading.attr="disabled"
                                    class="flex text-sm w-20 items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</button>
                            @else
                                <span
                                    class="flex text-sm w-20 items-center justify-center h-full py-1.5 px-3 leading-tight text-gray-500 bg-white rounded-r-lg border border-gray-300 cursor-not-allowed dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Next</span>
                            @endif
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </section>

</div>