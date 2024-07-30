{{-- resources/views/layouts/user.blade.php  --}}
<x-app-layout class="user-dashboard-layout">
    {{-- @userfirewall --}}
    @auth('web')
        <div class="antialiased bg-gray-50 dark:bg-gray-900">
            @include('layouts.partials.session-flash')
            <header>
                <livewire:user-header />
            </header>

            <livewire:user-sidebar />

            {{-- content --}}
            <main class="p-4 md:ml-64 h-auto pt-20">
                {{ $slot }}
            </main>

            <footer>
                <livewire:user-footer />
            </footer>
        </div>
    @endauth
</x-app-layout>
