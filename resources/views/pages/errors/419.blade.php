<x-guest-layout>
    <div class="text-center">
        <h1 class="text-9xl font-bold text-gray-800">419</h1>
        <p class="text-2xl md:text-3xl font-light leading-normal">Page Expired</p>

        @if ($message)
            <p class="mt-4">{{ $message }}</p>
        @else
            <p class="mt-4">The page has expired due to inactivity. Please refresh and try again.</p>
        @endif
        
        <a href="{{ url('/') }}" class="mt-6 px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Go to
            Homepage</a>
    </div>

    <script>
        // Function to refresh CSRF token
        function refreshCsrfToken() {
            fetch('{{ route('csrf-token') }}')
                .then(response => response.json())
                .then(data => {
                    document.querySelector('meta[name="csrf-token"]').setAttribute('content', data.token);
                })
                .catch(() => {
                    // If fetching the token fails, reload the page
                    location.reload();
                });
        }

        // Call the function to refresh the CSRF token
        refreshCsrfToken();
    </script>
</x-guest-layout>
