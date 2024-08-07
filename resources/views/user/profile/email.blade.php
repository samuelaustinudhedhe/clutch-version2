{{-- resources/views/user/profile/email.blade.php --}}

<div>
    <x-slot name="title">
        Name
    </x-slot>

    <p>Changes to your email address will be reflected across your Account. <a class="text-blue-500 dark:text-blue-400"
            href="#">Learn more</a></p>

    <h1 class="mb-2 text-2xl font-extrabold tracking-tight text-gray-900 leading-tight dark:text-white">Update Email</h1>
    <form wire:submit.prevent="updateEmail">
        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">New Email</label>
            <input type="email" id="email" wire:model="state.email" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            @error('state.email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Current Password</label>
            <input type="password" id="password" wire:model="state.password" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white">
            @error('state.password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        <div class="flex items-center justify-end">
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">Update Email</button>
        </div>
    </form>
    <div class="mt-4">
        <button wire:click="sendEmailVerification" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500">Send Verification Email</button>
    </div>
    @if (session()->has('message'))
        <div class="mt-4 text-green-600">
            {{ session('message') }}
        </div>
    @endif
</div>
