<div>
    <h2 class="text-xl font-bold mb-4">{{ $roleId ? 'Edit' : 'Create' }} Role</h2>

    <!-- Success message -->
    @if (session()->has('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="saveRole">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Role Name</label>
            <input type="text" id="name" wire:model="name" class="w-full px-4 py-2 border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:text-gray-200 dark:border-gray-600 dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label for="permissions" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Assign Permissions</label>
            <div class="space-y-2">
                @foreach($allPermissions as $permission)
                    <div class="flex items-center">
                        <input type="checkbox" wire:model="permissions" value="{{ $permission->id }}" id="permission-{{ $permission->id }}" class="mr-2">
                        <label for="permission-{{ $permission->id }}" class="text-sm">{{ $permission->name }}</label>
                    </div>
                @endforeach
            </div>
            @error('permissions') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">{{ $roleId ? 'Update Role' : 'Create Role' }}</button>
    </form>

    @if($roleId)
        <!-- Delete Button -->
        <div class="mt-4">
            <button wire:click="confirmDelete" class="px-4 py-2 bg-red-600 text-white rounded-md">Delete Role</button>
        </div>
    @endif

    <!-- Delete Confirmation Modal -->
    @if($deleteConfirmation)
        <div class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <h3 class="text-lg font-semibold">Are you sure you want to delete this role?</h3>
                <div class="mt-4">
                    <button wire:click="deleteRole" class="px-4 py-2 bg-red-600 text-white rounded-md">Yes, Delete</button>
                    <button wire:click="$set('deleteConfirmation', false)" class="px-4 py-2 bg-gray-300 text-black rounded-md">Cancel</button>
                </div>
            </div>
        </div>
    @endif
</div>
