<div>
    {{-- In work, do what you enjoy. --}}
    <div class="p-6 bg-white shadow rounded-lg">
        <h2 class="text-2xl font-bold mb-4">User Management</h2>

        @if(session()->has('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Select User</label>
            <select wire:model="user_id" class="border p-2 rounded w-full">
                <option value="">Select User</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->first_name }} {{ $user->last_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">Assign Role</label>
            <select wire:model="role_id" class="border p-2 rounded w-full">
                <option value="">Select Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <button wire:click="assignRole" class="bg-blue-500 text-white px-4 py-2 rounded">Assign Role</button>
    </div>

</div>
