{{-- resources/views/layouts/user.blade.php  --}}
<x-app-layout>
    {{-- @userfirewall --}}
    @auth('web')
        <div class="antialiased bg-gray-50 dark:bg-gray-900">
            <header>
                <livewire:user-header />
            </header>

            <livewire:user-sidebar />

            {{-- content --}}
            <main class="md:ml-64">
                <div class="text-gray-900 dark:text-gray-100 xl:min-h-[calc(100vh-97px)] sm:min-h-[calc(100vh-81px)] min-h-[calc(100vh-101px)] pt-20">
                    {{ $slot }}

                </div>
                {{-- Footer --}}
                <livewire:user-footer />
            </main>

        </div>
    @endauth
</x-app-layout>
