<!-- resources/views/admin/admins/index.blade.php -->
<section class="bg-gray-50 dark:bg-gray-900 py-3 sm:py-5">
    <div class="px-4 mx-auto lg:px-12">
        <div class="relative overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
            <div class="px-4 divide-y dark:divide-gray-700">
                <div
                    class="flex flex-col py-3 space-y-3 md:flex-row md:items-center md:justify-between md:space-y-0 md:space-x-4">
                    <div class="flex items-center flex-1 space-x-4">
                        <h5>
                            <span class="text-gray-500">All Admins:</span>
                            <span class="dark:text-white">{{ number_format($allAdmins) }}</span>
                        </h5>
                        <h5>
                            <span class="text-gray-500">Active:</span>
                            <span class="dark:text-white">{{ number_format($activeAdmins) }}</span>
                        </h5>
                        <h5>
                            <span class="text-gray-500">Inactive:</span>
                            <span class="dark:text-white">{{ number_format($allAdmins - $activeAdmins) }}</span>
                        </h5>
                    </div>
                    <div
                        class="flex flex-col items-start flex-shrink-0 space-y-3 md:flex-row md:items-center lg:justify-end md:space-y-0 md:space-x-3">
                        <button type="button"
                            class="inline-flex items-center justify-center flex-shrink-0 px-3 py-2 text-xs font-medium text-gray-900 bg-white border border-gray-200 rounded-lg focus:outline-none hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                            <svg xmlns="http://www.w3.org/2000/svg" viewbox="0 0 24 24" fill="currentColor"
                                class="w-4 h-4 mr-2" aria-hidden="true">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M11.828 2.25c-.916 0-1.699.663-1.85 1.567l-.091.549a.798.798 0 01-.517.608 7.45 7.45 0 00-.478.198.798.798 0 01-.796-.064l-.453-.324a1.875 1.875 0 00-2.416.2l-.243.243a1.875 1.875 0 00-.2 2.416l.324.453a.798.798 0 01.064.796 7.448 7.448 0 00-.198.478.798.798 0 01-.608.517l-.55.092a1.875 1.875 0 00-1.566 1.849v.344c0 .916.663 1.699 1.567 1.85l.549.091c.281.047.508.25.608.517.06.162.127.321.198.478a.798.798 0 01-.064.796l-.324.453a1.875 1.875 0 00.2 2.416l.243.243c.648.648 1.67.733 2.416.2l.453-.324a.798.798 0 01.796-.064c.157.071.316.137.478.198.267.1.47.327.517.608l.092.55c.15.903.932 1.566 1.849 1.566h.344c.916 0 1.699-.663 1.85-1.567l.091-.549a.798.798 0 01.517-.608 7.52 7.52 0 00.478-.198.798.798 0 01.796.064l.453.324a1.875 1.875 0 002.416-.2l.243-.243c.648-.648.733-1.67.2-2.416l-.324-.453a.798.798 0 01-.064-.796c.071-.157.137-.316.198-.478.1-.267.327-.47.608-.517l.55-.091a1.875 1.875 0 001.566-1.85v-.344c0-.916-.663-1.699-1.567-1.85l-.549-.091a.798.798 0 01-.608-.517 7.507 7.507 0 00-.198-.478.798.798 0 01.064-.796l.324-.453a1.875 1.875 0 00-.2-2.416l-.243-.243a1.875 1.875 0 00-2.416-.2l-.453.324a.798.798 0 01-.796.064 7.462 7.462 0 00-.478-.198.798.798 0 01-.517-.608l-.091-.55a1.875 1.875 0 00-1.85-1.566h-.344zM12 15.75a3.75 3.75 0 100-7.5 3.75 3.75 0 000 7.5z" />
                            </svg>
                            Table settings
                        </button>
                    </div>
                </div>
                <div
                    class="flex flex-col items-stretch justify-between py-4 space-y-3 md:flex-row md:items-center md:space-y-0">
                    <a type="button"
                        class="flex items-center justify-center px-4 py-2 text-sm font-medium text-white rounded-lg bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewbox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                        </svg>
                        Add new admin
                    </a>
                    <div class="inline-flex flex-col rounded-md shadow-sm md:flex-row" role="group">
                        <button type="button" wire:click="suspendAll"
                            class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-t-lg md:rounded-tr-none md:rounded-l-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            Suspend all
                        </button>
                        <button type="button" wire:click="activeAll"
                            class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-gray-200 border-x md:border-x-0 md:border-t md:border-b hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            Active all
                        </button>

                        <button type="button" wire:click="deleteAll"
                            class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-b-lg md:rounded-bl-none md:rounded-r-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                            Delete all
                        </button>
                    </div>
                </div>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-selectAll" type="checkbox" wire:model.lazy="selectAll"
                                        class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-all" class="sr-only">checkbox</label>
                                </div>
                            </th>
                            <th scope="col" class="px-4 py-3">Admin</th>
                            <th scope="col" class="px-4 py-3">Admin Role</th>
                            <th scope="col" class="px-4 py-3">Status</th>
                            <th scope="col" class="px-4 py-3 whitespace-nowrap">Social profile</th>
                            <th scope="col" class="px-4 py-3">Rating</th>
                            <th scope="col" class="px-4 py-3 whitespace-nowrap">Created</th>
                            <th scope="col" class="px-4 py-3">
                                <span class="sr-only">Actions</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($admins as $admin)
                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                {{-- Check Box --}}
                                @can('manage_admins')
                                    <td class="w-4 px-4 py-3">
                                        <div class="flex items-center">
                                            <input id="checkbox-{{ $admin->id }}" type="checkbox"
                                                value="{{ $admin->id }}" wire:model.lazy="selected"
                                                onclick="event.stopPropagation()"
                                                class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-blue-600 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-{{ $admin->id }}" class="sr-only">checkbox</label>
                                        </div>
                                    </td>
                                @endcan
                                {{-- Admin Name --}}
                                <th scope="row"
                                    class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <a href="#" class="flex items-center">
                                        <img src="{{ $admin->profile_photo_url }}" alt="{{ $admin->name }}"
                                            class="w-auto h-8 mr-3 rounded-full">
                                        {{ $admin->name }}
                                    </a>
                                </th>
                                {{-- Admin Role --}}
                                <td class="px-4 py-2">
                                    <div
                                        class="inline-flex items-center bg-{{ $admin->role_color }}-100 text-{{ $admin->role_color }}-800 text-xs font-medium px-2 py-0.5 rounded dark:bg-{{ $admin->role_color }}-900 dark:text-{{ $admin->role_color }}-300">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-3.5 w-3.5 mr-1"
                                            viewbox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                            <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z" />
                                        </svg>
                                        {{ getRoleBy($user->role)->name ?? '' }}
                                    </div>
                                </td>
                                {{-- Status --}}
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center capitalize">
                                        <div
                                            class="w-3 h-3 mr-2 bg-{{ $admin->status_color }}-500 border rounded-full">
                                        </div>
                                        {{ $admin->status }}
                                    </div>
                                </td>
                                {{-- Social Profile --}}
                                <td class="px-4 py-2 whitespace-nowrap">
                                    <div class="flex items-center space-x-1.5">
                                        <a class="transition hover:text-gray-900 dark:hover:text-white"
                                            href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="7" height="13"
                                                fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="m6.44 7 .329-2.156H4.683V3.437c0-.609.28-1.171 1.218-1.171h.961V.414S5.995.25 5.175.25c-1.711 0-2.836 1.055-2.836 2.93v1.664H.417V7h1.922v5.25h2.344V7H6.44Z" />
                                            </svg>
                                        </a>
                                        <a class="transition hover:text-gray-900 dark:hover:text-white"
                                            href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                                fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M4.617 9.89c0-.046-.047-.093-.117-.093s-.117.047-.117.094c0 .046.047.093.117.07.07 0 .117-.024.117-.07Zm-.726-.117c0 .047.046.118.117.118.047.023.117 0 .14-.047 0-.047-.023-.094-.093-.117-.07-.024-.14 0-.164.046Zm1.054-.023c-.07 0-.117.047-.117.117 0 .047.07.07.14.047.071-.023.118-.047.095-.094 0-.047-.07-.093-.118-.07Zm1.524-9C3.234.75.75 3.234.75 6.469c0 2.601 1.617 4.828 3.96 5.625.306.047.4-.14.4-.281v-1.454s-1.641.352-1.993-.703c0 0-.258-.68-.633-.844 0 0-.539-.374.024-.374 0 0 .586.046.914.609.515.914 1.36.656 1.71.492.048-.375.188-.633.376-.797-1.313-.14-2.649-.328-2.649-2.578 0-.656.188-.96.563-1.383-.07-.164-.258-.773.07-1.593.469-.141 1.617.632 1.617.632a5.05 5.05 0 0 1 1.454-.187c.515 0 1.007.047 1.476.187 0 0 1.125-.797 1.617-.632.328.82.117 1.43.07 1.593.376.422.61.727.61 1.383 0 2.25-1.383 2.438-2.695 2.578.21.188.398.54.398 1.102 0 .773-.023 1.758-.023 1.945 0 .164.117.352.421.281 2.344-.773 3.938-3 3.938-5.601C12.375 3.234 9.727.75 6.469.75ZM3.023 8.836c-.046.023-.023.094 0 .14.047.024.094.047.141.024.023-.023.023-.094-.023-.14-.047-.024-.094-.047-.118-.024Zm-.257-.188c-.024.047 0 .07.046.094.047.024.094.024.118-.023 0-.024-.024-.047-.07-.07-.047-.024-.07-.024-.094 0Zm.75.844c-.024.024-.024.094.046.14.047.048.118.071.141.024.024-.023.024-.094-.023-.14-.047-.047-.118-.07-.164-.024Zm-.258-.351c-.047.023-.047.093 0 .14.047.047.094.07.14.047.024-.023.024-.094 0-.14-.046-.047-.093-.07-.14-.047Z" />
                                            </svg>
                                        </a>
                                        <a class="transition hover:text-gray-900 dark:hover:text-white"
                                            href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13"
                                                fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M6.563.75C3.352.75.75 3.375.75 6.563a5.811 5.811 0 0 0 5.813 5.812c3.187 0 5.812-2.602 5.812-5.813C12.375 3.376 9.75.75 6.562.75Zm3.82 2.695a4.818 4.818 0 0 1 1.125 3.094c-.164-.047-1.805-.375-3.445-.164-.141-.328-.258-.61-.446-.984 1.852-.75 2.672-1.805 2.766-1.946Zm-.54-.586C9.75 3 9 4.008 7.244 4.664c-.821-1.5-1.712-2.719-1.852-2.906a4.972 4.972 0 0 1 4.453 1.101ZM4.43 2.086A28.23 28.23 0 0 1 6.28 4.969c-2.32.61-4.36.61-4.593.586a5.03 5.03 0 0 1 2.742-3.47Zm-2.836 4.5v-.164c.21.023 2.625.047 5.086-.703.164.281.28.562.422.843-1.805.516-3.446 1.97-4.243 3.329a4.873 4.873 0 0 1-1.265-3.305ZM3.492 10.5c.54-1.055 1.946-2.438 3.938-3.117a19.382 19.382 0 0 1 1.054 3.773 4.965 4.965 0 0 1-4.992-.656Zm5.836.188c-.047-.282-.328-1.735-.96-3.54 1.546-.234 2.905.165 3.093.211a5.06 5.06 0 0 1-2.133 3.329Z" />
                                            </svg>
                                        </a>
                                        <a class="transition hover:text-gray-900 dark:hover:text-white"
                                            href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="10"
                                                fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M11.508 2.497c.469-.351.89-.773 1.219-1.265a4.613 4.613 0 0 1-1.407.375c.516-.305.89-.774 1.078-1.36a5.197 5.197 0 0 1-1.546.61A2.461 2.461 0 0 0 9.047.083a2.46 2.46 0 0 0-2.461 2.461c0 .188.023.375.07.563A7.14 7.14 0 0 1 1.57.529c-.21.351-.328.773-.328 1.242 0 .844.422 1.594 1.102 2.039-.399-.024-.797-.117-1.125-.305v.024c0 1.195.843 2.18 1.968 2.414a2.748 2.748 0 0 1-.632.093c-.164 0-.305-.023-.47-.046A2.45 2.45 0 0 0 4.384 7.7a4.948 4.948 0 0 1-3.047 1.055c-.211 0-.399-.023-.586-.047A6.857 6.857 0 0 0 4.523 9.81c4.524 0 6.985-3.727 6.985-6.985v-.328Z" />
                                            </svg>
                                        </a>
                                        <a class="transition hover:text-gray-900 dark:hover:text-white"
                                            href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="13" height="12"
                                                fill="currentColor" aria-hidden="true">
                                                <path
                                                    d="M12.188 6.203c0-.375-.047-.656-.094-.96H6.563v1.991h3.28c-.116.868-.984 2.508-3.28 2.508-1.993 0-3.61-1.64-3.61-3.68 0-3.257 3.844-4.757 5.906-2.765l1.594-1.524A5.637 5.637 0 0 0 6.563.25 5.797 5.797 0 0 0 .75 6.063a5.782 5.782 0 0 0 5.813 5.812c3.351 0 5.625-2.344 5.625-5.672Z" />
                                            </svg>
                                        </a>
                                    </div>
                                </td>
                                {{-- Rating --}}
                                <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    <div class="flex items-center">
                                        @if ($admin->rating > 3.5)
                                            @if ($admin->rating > 4.5)
                                                <span class="text-green-500 text-xs">+</span>
                                            @endif
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="w-4 h-4 mr-1 text-green-500" aria-hidden="true" fill="none"
                                                viewbox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M5 10l7-7m0 0l7 7m-7-7v18" />
                                            </svg>
                                        @else
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1 text-red-500"
                                                aria-hidden="true" fill="none" viewbox="0 0 24 24"
                                                stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                                            </svg>
                                        @endif

                                        {{ $admin->rating }}
                                    </div>
                                </td>

                                {{-- Created at --}}
                                <td class="px-4 py-2">{{ $admin->created_at->format('d M Y') }}</td>

                                {{-- Actions --}}
                                @can('manage_admins')
                                    <td class="px-4 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        <button id="dropdown-button-{{ $admin->id }}" type="button"
                                            data-dropdown-toggle="dropdown-{{ $admin->id }}"
                                            class="inline-flex items-center p-1 text-sm font-medium text-center text-gray-500 rounded-lg hover:text-gray-800 hover:bg-gray-200 dark:hover:bg-gray-700 focus:outline-none dark:text-gray-400 dark:hover:text-gray-100">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z" />
                                            </svg>
                                        </button>
                                        <div id="dropdown-{{ $admin->id }}"
                                            class="z-10 hidden bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                            <ul class="py-1 text-sm text-gray-700 dark:text-gray-200"
                                                aria-labelledby="dropdown-button-{{ $admin->id }}">
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Show</a>
                                                </li>
                                                <li>
                                                    <a href="#"
                                                        class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                                                </li>
                                            </ul>
                                            <div class="py-1">
                                                <a href="#"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                                            </div>
                                        </div>
                                    </td>
                                @endcan
                            </tr>
                        @endforeach

                        {{-- If no Admin is found --}}
                        @if ($admins->isEmpty())
                            <tr class="border-b dark:border-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700">
                                <td class="px-4 py-6 text-center text-md font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="10">
                                    {{ __('There are no Admins found at this time') }}
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <nav class="flex flex-col items-start justify-between p-4 space-y-3 md:flex-row md:items-center md:space-y-0"
                aria-label="Table navigation">
                <div class="flex items-center space-x-3">
                    <label for="rows" class="text-xs font-normal text-gray-500 dark:text-gray-400">Rows per
                        page</label>
                    <select id="rows" wire:model.lazy="perPage"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block py-1.5 pl-3.5 pr-6 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <div class="text-xs font-normal text-gray-500 dark:text-gray-400">
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $admins->firstItem() }}</span>
                        -
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $admins->lastItem() }}</span>
                        of
                        <span class="font-semibold text-gray-900 dark:text-white">{{ $admins->total() }}</span>
                    </div>
                </div>
                <ul class="inline-flex items-stretch -space-x-px">
                    <li>
                        @if ($admins->onFirstPage())
                            <span
                                class="flex text-sm w-20 items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 cursor-not-allowed dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">Previous</span>
                        @else
                            <button wire:click="previousPage" wire:loading.attr="disabled"
                                class="flex text-sm w-20 items-center justify-center h-full py-1.5 px-3 ml-0 text-gray-500 bg-white rounded-l-lg border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</button>
                        @endif
                    </li>
                    <li>
                        @if ($admins->hasMorePages())
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
