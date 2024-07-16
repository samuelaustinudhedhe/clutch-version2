<!-- resources/views/admin/admins/edit.blade.php -->
<x-admins.dashboardlayout>
    <div class="container">
        <h1>Edit Admin</h1>
        <form method="POST" action="{{ route('admin.admins.update', $admin) }}">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Name</label>
                <input id="name" type="text" name="name" value="{{ $admin->name }}" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input id="email" type="email" name="email" value="{{ $admin->email }}" required>
            </div>
            <div>
                <button type="submit">Update Admin</button>
            </div>
        </form>
    </div>
    </x-admins.dashboardlayout>