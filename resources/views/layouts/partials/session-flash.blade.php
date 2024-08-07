@php
    $message = null;
    $type = null;

    if (session()->has('error')) {
        $message = session('error');
        $type = 'error';
    } elseif (session()->has('success')) {
        $message = session('success');
        $type = 'success';
    } elseif (session()->has('info')) {
        $message = session('info');
        $type = 'info';
    } elseif (session()->has('warning')) {
        $message = session('warning');
        $type = 'warning';
    } elseif (session()->has('message')) {
        $message = session('message');
        $type = 'message';
    }

    $bgColor = match ($type) {
        // 'success' => 'bg-green-500',
        // 'error' => 'bg-red-500',
        // 'info' => 'bg-blue-500',
        // 'warning' => 'bg-yellow-500',
        default => 'bg-white dark:bg-gray-800',
    };
@endphp

@if ($message)
    <div id="toast-bottom-right"
        class="fixed flex items-center w-full max-w-xs p-4 space-x-4 text-gray-500 {{ $bgColor }} rounded-lg shadow right-5 bottom-5 dark:text-gray-400 dark:shadow-gray-400 shadow-gray-600"
        role="alert" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 10000)"
        x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform translate-y-4"
        x-transition:enter-end="opacity-100 transform translate-y-0" x-transition:leave="transition ease-in duration-300"
        x-transition:leave-start="opacity-100 transform translate-y-0" x-transition:leave-end="opacity-0 transform translate-y-4">
        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
        </svg>
        <div class="text-sm font-normal">
            {{ $message }}
        </div>
    </div>
@endif
