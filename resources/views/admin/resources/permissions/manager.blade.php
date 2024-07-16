<x-admin-layout>
    <h1>Permissions</h1>
    <form wire:submit.prevent="store">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" wire:model="name" class="form-control" required>
            @error('name') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" wire:model="slug" class="form-control" required>
            @error('slug') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>

    <table class="table mt-4">
        <thead>
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($permissions as $permission)
            <tr>
                <td>{{ $permission->name }}</td>
                <td>{{ $permission->slug }}</td>
                <td>
                    <button wire:click="edit({{ $permission->id }})" class="btn btn-warning">Edit</button>
                    <button wire:click="delete({{ $permission->id }})" class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>