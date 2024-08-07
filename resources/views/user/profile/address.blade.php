<x-users.dashboard-layout>

    <form action="{{ route('user.profile.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div>
            <label for="first_name">First Name:</label>
            <input type="text" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}" required>
        </div>
    
        <div>
            <label for="last_name">Last Name:</label>
            <input type="text" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}" required>
        </div>
    
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        </div>
    
        <div>
            <label for="phone[country_code]">Country Code:</label>
            <input type="text" id="phone[country_code]" name="phone[country_code]" value="{{ old('phone.country_code', $user->phone['country_code'] ?? '') }}">
        </div>
    
        <div>
            <label for="phone[number]">Phone Number:</label>
            <input type="text" id="phone[number]" name="phone[number]" value="{{ old('phone.number', $user->phone['number'] ?? '') }}">
        </div>
    
        <div>
            <label for="address[home][street]">Home Street:</label>
            <input type="text" id="address[home][street]" name="address[home][street]" value="{{ old('address.home.street', $user->address['home']['street'] ?? '') }}">
        </div>
        <!-- Add other address fields similarly -->
    
        <button type="submit">Save</button>
    </form>
    
</x-users.dashboard-layout>
