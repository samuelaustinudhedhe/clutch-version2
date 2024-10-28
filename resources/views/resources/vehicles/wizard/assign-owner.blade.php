<div class="space-y-4 sm:space-y-6">
    <div
        class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
        {{-- Title --}}
        <div class="mb-2 flex items-center gap-1">
            <div class="w-2/5 flex items-center gap-1">
                <label for="users-title"
                    class="block text-sm font-medium text-gray-900 dark:text-white">
                    Assign Vehicle to Owner
                </label>
                <svg data-tooltip-target="users-title-desc-1" data-tooltip-trigger="hover"
                    class="h-4 w-4 text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white"
                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                    height="24" fill="currentColor" viewBox="0 0 24 24">
                    <path fill-rule="evenodd"
                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                        clip-rule="evenodd" />
                </svg>
                <div id="users-title-desc-1" role="tooltip"
                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                    Select a user to assign the Vehicle to
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>
            </div>
            {{-- Search --}}
            <div class="md:w-3/5 w-full">
                <label for="search" class="sr-only">Search</label>
                <div class="relative w-full">
                    <div
                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                            fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <input wire:model.live="userSearch" type="text" id="user-search"
                        placeholder="User Search..."
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                </div>
            </div>


        </div>
        <x-input-error for="selectedUser" />

        <table class="min-w-full bg-white dark:bg-gray-800">
            <thead>
                <tr class="border-b border-gray-200">
                    <th class="py-2 pr-4 pl-2 text-left text-sm" colspan="2">Name</th>
                    <th class="py-2 pl-4 pr-2 text-right text-sm">Current Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    @php
                        $isSelected = $user->id == $selectedUser;
                    @endphp
                    <tr class="border-b border-gray-200 cursor-pointer @if ($isSelected) bg-blue-100 dark:bg-blue-900 @endif"
                        onclick="document.getElementById('radio-{{ $user->id }}').click()">
                        {{-- Check Box --}}
                        <td class="w-4 pr-4 pl-2 py-3">
                            <div class="flex items-center">
                                <input id="radio-{{ $user->id }}" type="radio"
                                    name="users" value="{{ $user->id }}"
                                    wire:model.lazy="selectedUser"
                                    onclick="event.stopPropagation()"
                                    class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">

                                <label for="radio-{{ $user->id }}"
                                    class="sr-only">radio</label>
                            </div>
                        </td>

                        {{-- User Name --}}
                        <th scope="row"
                            class="px-0 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="flex items-center">
                                <img src="{{ $user->profile_photo_url }}"
                                    alt="{{ $user->name }}"
                                    class="w-auto h-8 mr-3 rounded-full">
                                {{ $user->name }}
                            </a>
                        </th>

                        {{-- Roles --}}
                        <td class="py-3 pl-4 pr-2 text-right">
                            {{ $user->role }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <nav class="flex flex-col items-start justify-between pt-4 space-y-3 md:flex-row md:items-center md:space-y-0"
            aria-label="Table navigation">
            <div class="flex items-center space-x-3">

                <select id="rows" wire:model.lazy="usersPerPage"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block py-1.5 pl-3.5 pr-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="5">5</option>
                    <option value="10">10</option>
                    <option value="15">15</option>
                </select>
                <div class="text-xs font-normal text-gray-500 dark:text-gray-400">
                    <span
                        class="font-semibold text-gray-900 dark:text-white">{{ $users->firstItem() }}</span>
                    -
                    <span
                        class="font-semibold text-gray-900 dark:text-white">{{ $users->lastItem() }}</span>
                    of
                    <span
                        class="font-semibold text-gray-900 dark:text-white">{{ $users->total() }}</span>
                </div>
            </div>
            <ul class="inline-flex items-stretch -space-x-px">
                <li>
                    @if ($users->onFirstPage())
                        <span
                            class="flex text-sm w-20 items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 cursor-not-allowed dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Previous</span>
                    @else
                        <button wire:click="previousPage" wire:loading.attr="disabled"
                            type="button"
                            class="flex text-sm w-20 items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</button>
                    @endif
                </li>
                <li>
                    @if ($users->hasMorePages())
                        <button wire:click="nextPage" wire:loading.attr="disabled" type="button"
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