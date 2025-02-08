<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}

    <div class="p-4 bg-white shadow-md rounded-lg">
        <h2 class="text-xl font-bold mb-4">Assign Roles to User</h2>
        
        <form wire:submit.prevent="updateRoles">
            <div class="mb-4">
                <label class="block text-gray-700">Select Roles</label>
                @foreach($roles as $role)
                    <div class="flex items-center">
                        <input type="checkbox" wire:model="selectedRoles" value="{{ $role->id }}" class="mr-2">
                        <span>{{ $role->name }}</span>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg">Update Roles</button>
        </form>
    </div>

</div>
