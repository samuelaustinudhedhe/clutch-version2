{{-- resources/views/user/profile/name.blade.php --}}

<div>
    <x-slot name="title">
        Name
    </x-slot>

    <p>Changes to your name will be reflected across your Account. <a class="text-blue-500 dark:text-blue-400"
            href="#">Learn more</a></p>

    <form wire:submit.prevent="updateName" class="mt-4">
        <div class="grid gap-4 sm:grid-cols-1">

            <div>
                <x-label for="firstName">First Name</x-label>
                <x-xinput type="text" id="firstName" wire:model="firstName" />
                @error('firstName')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <x-label for="lastName">Last Name</x-label>
                <x-xinput type="text" id="lastName" wire:model="lastName" />
                @error('lastName')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="mt-10 space-x-4">
            <x-button type="submit">Save</x-button>
            <x-button wire:click="resetForm" color="gray">Cancle</x-button>

        </div>
    </form>
</div>
