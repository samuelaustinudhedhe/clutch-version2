<x-user-profile-edit-layout>
    <x-slot name="title">
        {{ __('Profile') }}
    </x-slot>

    @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
        <div class="mt-10 sm:mt-0">
            @livewire('profile.two-factor-authentication-form')
        </div>

        <x-section-border />
    @endif
</x-user-profile-edit-layout>
