<div class="relative right-10 top-10">
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

        $bgColor = match($type) {
            'success' => 'bg-green-500',
            'error' => 'bg-red-500',
            'info' => 'bg-blue-500',
            'warning' => 'bg-yellow-500',
            default => 'bg-gray-500',
        };
    @endphp

    @if ($message)
        <div class="flex absolute z-[99] fixed items-center justify-center px-4 py-3 text-sm font-bold text-white {{ $bgColor }} rounded-md shadow-md"
            role="alert">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>{{ $message }}</span>
        </div>
    @endif
</div>