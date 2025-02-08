<div>
    {{-- The best athlete wants his opponent at his best. --}}
    <div class="container mx-auto p-8">
        <h2 class="text-2xl font-bold mb-6">User Dashboard</h2>

        @if(session()->has('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div class="bg-white shadow-md p-6 rounded-lg">
                <h3 class="text-lg font-bold mb-4">Profile Information</h3>

                <form wire:submit.prevent="updateProfile">
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" wire:model="first_name" class="border p-2 rounded w-full">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" wire:model="last_name" class="border p-2 rounded w-full">
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" wire:model="email" class="border p-2 rounded w-full" disabled>
                    </div>

                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700">Phone</label>
                        <input type="text" wire:model="phone" class="border p-2 rounded w-full">
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update Profile</button>
                </form>
            </div>

            <div class="bg-white shadow-md p-6 rounded-lg">
                <h3 class="text-lg font-bold mb-4">Profile Picture</h3>

                @if($profile_image)
                    <img src="{{ asset('storage/'.$profile_image) }}" class="w-32 h-32 rounded-full mb-4">
                @endif

                <input type="file" wire:model="new_profile_image" class="mb-4">
                @error('new_profile_image') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror

                <button wire:click="saveProfileImage" class="bg-blue-500 text-white px-4 py-2 rounded">Upload Image</button>
            </div>
        </div>
    </div>

</div>
