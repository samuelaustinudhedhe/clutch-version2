<div id="toast-bottom-right">
    @if ($message)
        <div class="z-50 fixed flex items-center w-full max-w-xs xl:max-w-md p-4 space-x-4 text-gray-500 {{ $class }} bg-white dark:bg-gray-800 border-2 rounded-lg right-5 bottom-5 dark:text-gray-400 dark:shadow-gray-400 shadow-gray-600"
            role="alert" x-data="{ show: true, timeout: null }" x-show="show" x-init="timeout = setTimeout(() => show = false, 10000)"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-y-4"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100 transform translate-y-0"
            x-transition:leave-end="opacity-0 transform translate-y-4"
            x-on:notify.window="
                show = true;
                clearTimeout(timeout);
                timeout = setTimeout(() => show = false, 10000);
            "
            x-on:mouseover="clearTimeout(timeout)" x-on:mouseleave="timeout = setTimeout(() => show = false, 10000)">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <div class="text-sm font-normal whitespace-wrap overflow-hidden overflow-y-auto max-h-32 break-words"
                style="scrollbar-width: thin; scrollbar-color: #888 #ffffff00;">
                {!! $message !!}
            </div>
        </div>
    @endif
</div>
