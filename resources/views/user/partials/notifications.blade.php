<div x-data="{ selectedNotification: @entangle('selectedNotification') }" class="hidden overflow-hidden z-50 my-4 max-w-sm text-base list-none bg-white rounded divide-y divide-gray-100 shadow-lg dark:divide-gray-600 dark:bg-gray-700 rounded-xl" id="notification-dropdown" wire:ignore>
    <div class="block py-3 px-4 text-base font-medium text-center text-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-300">Notifications</div>

    <!-- Notifications Container -->
    <div :class="{ '-translate-x-1/2': selectedNotification, 'translate-x-0': !selectedNotification }" class="flex w-[200%] transform transition-transform duration-300 relative overflow-hidden">
        <!-- Notification List -->
        <div id="notifications-list" class="w-1/2 whitespace-wrap overflow-hidden overflow-y-auto max-h-96 break-words" style="scrollbar-width: thin; scrollbar-color: #888 #ffffff00;">
            @foreach ($notifications as $notification)
                <a href="#"
                    wire:click.prevent="showDetails('{{ $notification->id }}')"
                    class="notification flex py-3 px-4 border-b hover:bg-gray-100 dark:hover:bg-gray-600 dark:border-gray-600"
                    :data-notification-id="{{ $notification->id }}">                       
                    @isset($notification->data['image_url'])

                        <div class="flex-shrink-0 relative">
                            <img class="w-11 h-11 rounded-full" src="{{ $notification->data['image_url'] }}"
                                alt="Notification image for {{ $notification->data['title'] }}" />
                                {{-- Work on the icons on the images, let the icon be selected based on the notification type--}}
                            {{-- <div
                                class="flex absolute justify-center items-center ml-6 -mt-5 w-5 h-5 bg-gray-900 rounded-full border border-white dark:border-gray-700">
                                <svg aria-hidden="true" class="w-3 h-3 text-white" fill="currentColor"
                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 9a3 3 0 100-6 3 3 0 000 6zM8 11a6 6 0 016 6H2a6 6 0 016-6zM16 7a1 1 0 10-2 0v1h-1a1 1 0 100 2h1v1a1 1 0 102 0v-1h1a1 1 0 100-2h-1V7z">
                                    </path>
                                </svg>
                            </div> --}}
                        </div>                        
                    @endisset

                    <div class="pl-3 w-full">
                        <div class="text-gray-500 font-normal text-sm mb-1.5 dark:text-gray-400">
                            @isset($notification->data['title'])
                                <div class="text-gray-700 dark:text-white font-semibold line-clamp-1">
                                    {{ $notification->data['title'] }}</div>
                            @endisset
                            @isset($notification->data['message'])
                                <p class="line-clamp-2">{{ $notification->data['message'] }}</p>
                            @endisset
                        </div>
                        <div class="text-xs font-medium text-blue-600 dark:text-blue-500">
                            {{ $notification->updated_at->diffForHumans() }}
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        <!-- Notification Details -->
        <div id="notification-details" class="w-1/2 bg-white dark:bg-gray-800 shadow-lg p-6">
            <button @click="selectedNotification = null; $wire.goBack();" class="text-blue-600 dark:text-blue-400 mb-4 hover:underline">← Back to Notifications</button>
            <h2 class="text-xl font-semibold text-gray-800 dark:text-white">Notification Details</h2>
            <div id="details-content" class="mt-4 text-gray-600 dark:text-gray-300">
                <template x-if="selectedNotification">
                    <div>
                        <h3 class="text-lg font-bold" x-text="selectedNotification.title"></h3>
                        <p x-text="selectedNotification.message"></p>
                        <template x-if="selectedNotification.image_url">
                            <img :src="selectedNotification.image_url" alt="" class="mt-4 rounded-lg">
                        </template>
                    </div>
                </template>
            </div>
        </div>
    </div>

    <a href="#"
        class="inline-flex p-3 text-md items-center justify-center w-full font-medium text-sm text-center text-gray-900 bg-gray-50 hover:bg-gray-100 dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600 dark:hover:underline">
        <svg aria-hidden="true" class="mr-2 w-4 h-4 text-gray-500 dark:text-gray-400" fill="currentColor"
            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
            <path fill-rule="evenodd"
                d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                clip-rule="evenodd"></path>
        </svg>
        View all
    </a>
</div>
