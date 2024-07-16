<div>
    @if (session()->has('message'))
        <div class="flex !z-50 fixed items-center justify-center px-4 py-3 text-sm font-bold text-white bg-green-500 rounded-md shadow-md"
            role="alert">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>{{ session()->get('message') }}</span>
        </div>
    @endif

    @if (session()->has('error'))
        <div class="flex !z-50 fixed items-center justify-center px-4 py-3 text-sm font-bold text-white bg-red-500 rounded-md shadow-md"
            role="alert">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>{{ session()->get('error') }}</span>
        </div>
    @endif
</div>
