<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
    <div class="p-4 bg-white shadow-md rounded-lg">
        <h2 class="text-xl font-bold mb-4">Manage Permissions</h2>

        <div class="mb-4">
            <input type="text" wire:model="search" class="w-full px-4 py-2 border rounded-lg" placeholder="Search Permissions">
        </div>

        <a href="{{ route('permissions.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Create Permission</a>

        <table class="mt-4 w-full border-collapse">
            <thead>
                <tr class="border-b">
                    <th class="p-2">#</th>
                    <th class="p-2">Permission Name</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $index => $permission)
                    <tr class="border-b">
                        <td class="p-2">{{ $index + 1 }}</td>
                        <td class="p-2">{{ $permission->name }}</td>
                        <td class="p-2">
                            <a href="{{ route('permissions.edit', $permission->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-md">Edit</a>
                            <button wire:click="deletePermission({{ $permission->id }})" class="px-3 py-1 bg-red-500 text-white rounded-md" onclick="return confirm('Are you sure?')">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-4">
            {{ $permissions->links() }}
        </div>
    </div>

</div>
