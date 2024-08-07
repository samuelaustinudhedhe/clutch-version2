<x-users.dashboard-layout>
    <x-slot name="title">
        Profile Page
    </x-slot>

    <p>This is the content of the profile page.</p>
    <form action="{{ route('user.profile.update') }}" method="POST">
        @csrf
        @method('PUT')
    
        <label for="date_of_birth">Date of Birth</label>
        <input type="date" name="date_of_birth" value="{{ old('date_of_birth', Auth::user()->date_of_birth) }}">
    
        <button type="submit">Save</button>
    </form>
    
</x-users.dashboard-layout>
