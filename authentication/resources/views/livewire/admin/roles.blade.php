<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <div class="p-6 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-bold mb-4">Role Management</h2>

        @if(session()->has('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <input type="text" wire:model="role_name" class="border p-2 rounded w-full" placeholder="New Role Name">
            <button wire:click="createRole" class="bg-blue-500 text-white px-4 py-2 mt-2 rounded">Create Role</button>
        </div>

        <h3 class="text-lg font-bold mb-2">Assign Permissions</h3>
        <select wire:model="selected_role_id" class="border p-2 rounded w-full">
            <option value="">Select Role</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
        </select>

        <div class="grid grid-cols-2 gap-2 mt-4">
            @foreach($permissions as $permission)
                <label class="flex items-center space-x-2">
                    <input type="checkbox" wire:model="permissions" value="{{ $permission->name }}" class="rounded">
                    <span>{{ $permission->name }}</span>
                </label>
            @endforeach
        </div>

        <button wire:click="assignPermissions" class="bg-green-500 text-white px-4 py-2 mt-4 rounded">Assign Permissions</button>
    </div>


</div>
