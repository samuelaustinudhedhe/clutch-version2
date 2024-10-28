<section class="bg-gray-50 dark:bg-gray-900 p-3 sm:p-5">
    <div class="mx-auto px-4 lg:px-12">
        <!-- Start coding here -->
        <div class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
            <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                <div class="w-full md:w-1/2">
                    <form class="flex items-center">
                        <label for="search" class="sr-only">Search</label>
                        <div class="relative w-full">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400"
                                    fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>

                            <input type="text" id="search" wire:model.live="search"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Search" required="">
                        </div>
                    </form>
                </div>
                <div
                    class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                    @permission('create_permissions')
                        <a href="{{ route('admin.permissions.create') }}" type="button"
                            class="flex items-center justify-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path clip-rule="evenodd" fill-rule="evenodd"
                                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                            </svg>
                            Add new Permission
                        </a>
                    @endpermission

                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-4 py-3">Permission name</th>
                            <th scope="col" class="px-4 py-3">Description</th>
                            <th scope="col" class="px-4 py-3">Assigned to</th>
                            <th scope="col" class="px-4 py-3">Users</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr class="border-b dark:border-gray-700">

                                {{-- For Name --}}
                                <th scope="row"
                                    class="flex items-center space-x-6 px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <x-input type="checkbox" title="{{ $permission->name }}"
                                        id="{{ $permission->id }}" class="w-5 h-5 border-gray-300" />
                                    <div>
                                        {{ $permission->name }}&#34;
                                        <div class="text-gray-300 dark:text-gray-600">{{ $permission->slug }}</div>
                                    </div>
                                </th>

                                {{-- For Discription --}}
                                <td class="px-4 py-3">{{ $permission->description }}</td>

                                {{-- For Assigned to --}}
                                <td class="px-4 py-3">
                                    @foreach ($permission->roles as $role)
                                        @php
                                            $role = getRoleBy($role);
                                        @endphp

                                        <a href="{{ route('admin.roles.show', $role->id) }}"
                                            class="text-sm hover:text-blue-100 ">
                                            {{ $role->name }}
                                        </a>
                                    @endforeach
                                </td>

                                {{-- For Users --}}
                                <td class="px-4 py-2 whitespace-nowrap">
                                    <div class="flex -space-x-4 w-28">
                                        @php
                                            $users = getUsersByRole($permission->roles);
                                            aggregateUserData(output:$users, count:$count, input:$users);

                                        @endphp
                                        @foreach ($users as $user)
                                            <a href="{{ $user->id }}" target="_blank"
                                                class="flex-shrink-0 flex items-center justify-center w-10 h-10 rounded-full">
                                                <img src="{{ $user->profile_photo_url }}" alt=""
                                                    class="w-10 h-10 flex-shrink-0 border-2 border-white rounded-full dark:border-gray-800">
                                            </a>
                                        @endforeach

                                        @if ($count !== 0)
                                            <a href="{{ route('admin.permissions.show', $role->id) }}"
                                                class="flex-shrink-0 flex items-center justify-center w-10 h-10 text-xs font-medium text-white bg-gray-900 dark:bg-gray-700 border-2 border-white rounded-full hover:bg-gray-600 dark:border-gray-800">
                                                {{ '+' . $count }}
                                            </a>
                                        @endif
                                    </div>
                                </td>

                                {{-- For Actions --}}
                                <td class="px-4 py-3 flex items-center justify-end">
                                    <button id="{{ $permission->slug . '-' . $permission->id }}-dropdown-button"
                                        data-dropdown-toggle="{{ $permission->slug . '-' . $permission->id }}-dropdown"
                                        class="inline-flex items-center p-0.5 text-sm font-medium text-center text-gray-500 hover:text-gray-800 rounded-lg focus:outline-none dark:text-gray-400 dark:hover:text-gray-100"
                                        type="button">
                                        <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                            viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                        </svg>
                                    </button>
                                    <div id="{{ $permission->slug . '-' . $permission->id }}-dropdown"
                                        class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                            aria-labelledby="{{ $permission->slug . '-' . $permission->id }}-dropdown-button">
                                            <li>
                                                <a href="{{ route('admin.permissions.edit', $permission->id) }}"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                            </li>
                                            <li>
                                                <a href="#"
                                                    class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                            </li>
                                        </ul>

                                        {{-- @if (userHasPermission($admin, 'delete_permissions'))
                                            <div class="py-1">
                                                <form
                                                    action="{{ route('admin.permissions.destroy', $permission->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="w-full block py-2 px-4 text-left text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</button>
                                                </form>
                                            </div>
                                        @endif --}}
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        {{-- If no Permission is found --}}
                        @if ($permissions->isEmpty())
                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-4 py-6 text-center text-md font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="10">
                                    {{ __('There are no Permissions found at this time') }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="p-4">
                {{ $permissions->links() }}
            </div>
        </div>
    </div>
</section>
