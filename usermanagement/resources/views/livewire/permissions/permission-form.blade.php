<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="p-4 bg-white shadow-md rounded-lg">
        <h2 class="text-xl font-bold mb-4">{{ $permissionId ? 'Edit Permission' : 'Create Permission' }}</h2>

        <form wire:submit.prevent="savePermission">
            <div class="mb-4">
                <label class="block text-gray-700">Permission Name</label>
                <input type="text" wire:model="name" class="w-full px-4 py-2 border rounded-lg">
                @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
            </div>

            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg">
                {{ $permissionId ? 'Update Permission' : 'Create Permission' }}
            </button>
        </form>
    </div>

</div>
