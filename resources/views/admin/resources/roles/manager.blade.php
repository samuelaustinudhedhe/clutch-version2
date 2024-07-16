<x-admin-layout>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl font-bold mb-4">Roles</h1>
        <form wire:submit.prevent="store" class="space-y-4">
            <div class="form-group">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" wire:model="name" class="mt-1 block w-full border-gray-300 rounded-md" required>
                @error('name')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="slug" class="block text-sm font-medium text-gray-700">Slug</label>
                <input type="text" wire:model="slug" class="mt-1 block w-full border-gray-300 rounded-md" required>
                @error('slug')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="permissions" class="block text-sm font-medium text-gray-700">Permissions</label>
                <div class="form-group">
                    <label for="permissions" class="block text-sm font-medium text-gray-700">Permissions</label>
                    <div class="mt-1 block w-full border-gray-300 rounded-md p-2">
                        @foreach ($permissions as $permission)
                            <div class="flex items-center">
                                <input type="checkbox" wire:model="selectedPermissions" value="{{ $permission->id }}" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out">
                                <label for="permission-{{ $permission->id }}" class="ml-2 block text-sm text-gray-900">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create</button>
        </form>
    
        <table class="min-w-full mt-8 bg-white border border-gray-200 rounded-lg shadow-md">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Slug</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Permissions</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach ($roles as $role)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $role->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $role->slug }}</td>
                        <td class="px-6 py-4 whitespace-wrap">
                            @foreach ($role->permissions ?? [] as $permissionId)
                                @php
                                    $permission = $permissions->firstWhere('slug', $permissionId);
                                @endphp
                                @if ($permission)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">{{ $permission->name }}</span>
                                @endif
                            @endforeach
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <button wire:click="edit({{ $role->id }})" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">edit</button>
                            <button wire:click="delete({{ $role->id }})" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</x-admin-layout>
