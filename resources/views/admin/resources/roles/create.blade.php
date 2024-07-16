<section class="bg-white py-8 antialiased dark:bg-gray-900">
    <form action="#" class="mx-auto max-w-screen-xl px-4 2xl:px-0" wire:submit.prevent="store">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Create a new Role</h2>

        <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-6">
            <div class="mt-6 min-w-0 flex-1 space-y-6 sm:mt-8 lg:mt-0 ">

                {{-- Role Type --}}
                <div
                    class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <div class="mb-2 flex items-center gap-1">
                        <label for="role-type" class="block text-sm font-medium text-gray-900 dark:text-white">
                            Role Type
                        </label>
                        <svg data-tooltip-target="role-type-desc-1" data-tooltip-trigger="hover"
                            class="h-4 w-4 text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        <div id="role-type-desc-1" role="tooltip"
                            class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                            Which user type is this role for
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>

                    {{-- Radio Admin or Users --}}
                    <div class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        <input id="guard_admin" wire:model.live="guard" aria-describedby="guard_admin-text"
                            type="radio" value="admin" class="hidden peer/guard_admin">
                        <label for="guard_admin"
                            class="cursor-pointer rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800 peer-checked/guard_admin:border-blue-500 peer-checked/guard_admin:bg-blue-50 peer-checked/guard_admin:dark:bg-blue-900 w-full">
                            <div class="flex items-start">
                                <div class="ms-4 text-sm">
                                    <div class="font-medium leading-none text-gray-900 dark:text-white">Create this
                                        role for Admins</div>
                                    <p id="guard_admin-text"
                                        class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Selecting
                                        this option will automatically assign this role to <b>Admins</b></p>
                                </div>
                            </div>
                        </label>

                        <input id="guard_web" wire:model.live="guard" aria-describedby="guard_web-text" type="radio"
                            value="web" class="hidden peer/guard_web" />
                        <label for="guard_web"
                            class="cursor-pointer rounded-lg border border-gray-200 bg-gray-50 p-4 dark:border-gray-700 dark:bg-gray-800 peer-checked/guard_web:border-blue-500 peer-checked/guard_web:bg-blue-50 peer-checked/guard_web:dark:bg-blue-900 w-full">
                            <div class="flex items-start">
                                <div class="ms-4 text-sm">
                                    <div class="font-medium leading-none text-gray-900 dark:text-white">Assign this
                                        role to Users</div>
                                    <p id="guard_web-text"
                                        class="mt-1 text-xs font-normal text-gray-500 dark:text-gray-400">Selecting
                                        this option will automatically assign this role to Users</p>
                                </div>
                            </div>
                        </label>
                    </div>
                </div>

                <div
                    class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <p class="text-xl font-semibold text-gray-900 dark:text-white">Role Details</p>
                    <div>
                        <label for="name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                            Name* </label>
                        <input type="text" id="name" wire:model.lazy="name"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            placeholder="Enter role name" required />
                        @error('name')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    {{-- Role Slug --}}
                    <div>
                        <label for="slug" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                            Slug </label>
                        <input type="text" id="slug" wire:model.live="slug"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            placeholder="Enter role slug" />
                        @error('slug')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Description --}}
                    <div class="sm:col-span-2">
                        <label for="description" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">
                            Description </label>
                        <textarea id="description" wire:model="description" rows="4"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500"
                            placeholder="Enter role description (optional)"></textarea>
                        @error('description')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div
                    class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <p class="text-xl font-semibold text-gray-900 dark:text-white">Select Role Permissions</p>

                    {{-- Select Permissions --}}
                    <select id="permissions" multiple wire:model="selectedPermissions"
                        class="block w-full h-[140px] rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        @foreach ($permissions as $permission)
                            <option value="{{ $permission->slug }}">{{ $permission->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Right Content --}}
            <div class="w-full space-y-4 sm:space-y-6 lg:max-w-sm xl:max-w-lg">
                <div class="space-y-4 sm:space-y-6">
                    <div
                        class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        {{-- Title --}}
                        <div class="mb-2 flex items-center gap-1">
                            <div class="w-2/5 flex items-center gap-1">
                                <label for="users-title"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">
                                    Assign role to {{ $guard == 'web' ? 'Users' : 'Admins' }}
                                </label>
                                <svg data-tooltip-target="users-title-desc-1" data-tooltip-trigger="hover"
                                    class="h-4 w-4 text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    fill="currentColor" viewBox="0 0 24 24">
                                    <path fill-rule="evenodd"
                                        d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                                        clip-rule="evenodd" />
                                </svg>
                                <div id="users-title-desc-1" role="tooltip"
                                    class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                    Select a user to assign the role to
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            {{-- Search --}}
                            <div class="md:w-3/5 w-full">
                                <label for="search" class="sr-only">Search</label>
                                <div class="relative w-full">
                                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                            fill="currentColor" viewbox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                                clip-rule="evenodd" />
                                        </svg>
                                    </div>
                                    <input wire:model.live="search" type="text" id="search"
                                        placeholder="Search..." class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" />
                                </div>
                            </div>


                        </div>


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
                                        $isSelected =
                                            ($guard == 'web' && in_array($user->id, $selectedUsers)) ||
                                            ($guard == 'admin' && in_array($user->id, $selectedAdmins));
                                    @endphp
                                    <tr class="border-b border-gray-200 cursor-pointer @if ($isSelected) bg-blue-100 dark:bg-blue-900 @endif"
                                        onclick="document.getElementById('checkbox-{{ $user->id }}').click()">
                                        {{-- Check Box --}}
                                        <td class="w-4 pr-4 pl-2 py-3">
                                            <div class="flex items-center">
                                                @if ($guard == 'web')
                                                    <input id="checkbox-{{ $user->id }}" type="checkbox"
                                                        value="{{ $user->id }}" wire:model.lazy="selectedUsers"
                                                        onclick="event.stopPropagation()"
                                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                @else
                                                    <input id="checkbox-{{ $user->id }}" type="checkbox"
                                                        value="{{ $user->id }}" wire:model.lazy="selectedAdmins"
                                                        onclick="event.stopPropagation()"
                                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                                @endif
                                                <label for="checkbox-{{ $user->id }}"
                                                    class="sr-only">checkbox</label>
                                            </div>
                                        </td>

                                        {{-- User Name --}}
                                        <th scope="row"
                                            class="px-0 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                            <a href="#" class="flex items-center">
                                                <img src="{{ $user->profile_photo_url }}" alt="{{ $user->name }}"
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

                                <select id="rows" wire:model.lazy="perPage"
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
                                            class="flex text-sm w-20 items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</button>
                                    @endif
                                </li>
                                <li>
                                    @if ($users->hasMorePages())
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

                <div
                    class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <button type="submit"
                        class="w-full bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                        Submit
                    </button>
                </div>
            </div>
        </div>
    </form>
</section>
