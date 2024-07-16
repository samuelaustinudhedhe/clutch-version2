<section class="bg-white py-8 antialiased dark:bg-gray-900">
        @if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif

    <form action="#" class="mx-auto max-w-screen-xl px-4 2xl:px-0" wire:submit.prevent="createUser">

        <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Create New User</h2>
        
        <div class="mt-6 sm:mt-8 lg:flex lg:items-start lg:gap-6">
            <div class="mt-6 min-w-0 flex-1 space-y-6 sm:mt-8 lg:mt-0 ">

                {{-- User Type --}}
                <div
                    class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <div class="mb-2 flex items-center gap-1">
                        <label for="role-type" class="block text-sm font-medium text-gray-900 dark:text-white">
                            User Type
                        </label>
                        <svg class="h-4 w-4 text-gray-400 hover:text-gray-900 dark:text-gray-500 dark:hover:text-white"
                            aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" data-tooltip-target="role-type-desc-1" 
                            data-tooltip-trigger="hover" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd"
                                d="M2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10S2 17.523 2 12Zm9.408-5.5a1 1 0 1 0 0 2h.01a1 1 0 1 0 0-2h-.01ZM10 10a1 1 0 1 0 0 2h1v3h-1a1 1 0 1 0 0 2h4a1 1 0 1 0 0-2h-1v-4a1 1 0 0 0-1-1h-2Z"
                                clip-rule="evenodd" />
                        </svg>
                        <div id="role-type-desc-1" role="tooltip"
                            class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                Select a user type to create a new user.
                            <div class="tooltip-arrow" data-popper-arrow></div>
                        </div>
                    </div>

                    {{-- Roles Radio --}}
                    <div id="roles" class="grid grid-cols-1 gap-4 lg:grid-cols-2">
                        @foreach ($roles as $role)
                            <div data-tooltip-target="{{ $role->slug .'tooltip'. $role->id }}" data-tooltip-trigger="hover">
                                <input type="radio" id="{{ $role->slug }}" wire:model="selectedRole" name="{{ $role->name }}" value="{{ $role->slug }}" class="hidden peer" >
                                <label for="{{ $role->slug }}" class="inline-flex items-center justify-center w-full p-5 text-gray-500 border-2 border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 bg-gray-50 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z" clip-rule="evenodd"></path></svg>                            
                                    <span class="w-full">{{ $role->name }}</span>
                                    <svg class="w-6 h-6 ml-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </label>
                            </div>
                            <div id="{{ $role->slug .'tooltip'. $role->id }}" role="tooltip" class="tooltip invisible absolute z-10 inline-block rounded-lg bg-gray-900 px-3 py-2 text-sm font-medium text-white opacity-0 shadow-sm transition-opacity duration-300 dark:bg-gray-700">
                                {{ $role->description ?? 'Change user type to ' . $role->name }}
                                <div class="tooltip-arrow" data-popper-arrow></div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- User Personal details form --}}
                <div
                    class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <p class="text-xl font-semibold text-gray-900 dark:text-white">User Details</p>
                    
                    <div class="mb-4">
                        <x-label for="name">Name</x-label>
                        <x-input id="name" type="text" wire:model="name" class="w-full" />
                        @error('name') <span class="text-red-500 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>
            
                    <div class="mb-4">
                        <x-label for="email">Email</x-label>
                        <x-input id="email" type="email" wire:model="email" class="w-full" />
                        @error('email') <span class="text-red-500 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>
            
                    <div class="mb-4">
                        <x-label for="password">Password</x-label>
                        <x-input id="password" type="password" wire:model="password" class="w-full" />
                        @error('password') <span class="text-red-500 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>
            
                    <div class="mb-4">
                        <x-label for="password_confirmation">Confirm Password</x-label>
                        <x-input id="password_confirmation" type="password" wire:model="password_confirmation" class="w-full" />
                        @error('password_confirmation') <span class="text-red-500 dark:text-red-400">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div
                    class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                    <p class="text-xl font-semibold text-gray-900 dark:text-white">Select User Role</p>

                    {{-- Select Role --}}
                    <select id="roles" multiple wire:model="selectedRole"
                        class="block w-full h-[140px] rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-blue-500 dark:focus:ring-blue-500">
                        @foreach ($roles as $role)
                            <option value="{{ $role->slug }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Right Content --}}
            <div class="w-full space-y-4 sm:space-y-6 lg:max-w-sm xl:max-w-lg">
                <div class="space-y-4 sm:space-y-6">
                    <div class="rounded-lg border border-gray-200 bg-white p-6 shadow-sm dark:border-gray-700 dark:bg-gray-800">
                        <div class="mb-4">
                            <x-label for="profile_photo">Profile Picture</x-label>
                            <input type="file" id="profile_photo" wire:model="profile_photo" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                            @if ($profile_photo)
                                <img src="{{ $profile_photo->temporaryUrl() }}" alt="Profile Picture Preview" class="mt-2 w-24 h-24 rounded-full">
                            @endif
                            @error('profile_photo') <span class="text-red-500 dark:text-red-400">{{ $message }}</span> @enderror
                        </div>
                        <div class="flex items-center justify-center w-full">
                            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                                </div>
                                <input id="dropzone-file" type="file" class="hidden">
                            </label>
                        </div> 
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
