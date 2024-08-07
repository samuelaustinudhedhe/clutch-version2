{{-- resources/views/layouts/admin.blade.php --}}
<x-app-layout class="admin-dashboard-layout">
    @adminfirewall
    @auth('admin')
        <div class="antialiased bg-gray-50 dark:bg-gray-900">
            {{-- Header --}}
            @include('layouts.partials.session-flash')

            <livewire:admin-header />

            {{-- Sidebar --}}
            <livewire:admin-sidebar />

            {{-- content --}}
            <main class="md:ml-64">
                <div
                    class="text-gray-900 dark:text-gray-100 xl:min-h-[calc(100vh-97px)] sm:min-h-[calc(100vh-81px)] min-h-[calc(100vh-101px)] pt-20">
                    {{ $slot }}

                </div>
                {{-- Footer --}}
                <livewire:admin-footer />
            </main>


            {{-- Left Sidebar --}}
            <livewire:admin-leftsidebar />

        </div>
    @endauth

</x-app-layout>
