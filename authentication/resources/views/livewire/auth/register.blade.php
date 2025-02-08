<div>
    <div class="flex min-h-screen bg-gray-100 justify-center items-center">
        <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-lg">
            <h2 class="text-2xl font-bold text-center mb-6 bg-green-100">Register</h2>

            @if(session()->has('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            <form wire:submit.prevent="register">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700">First Name</label>
                        <input type="text" wire:model="first_name" class="border border-gray-300 p-2 rounded w-full">
                        @error('first_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text" wire:model="last_name" class="border border-gray-300 p-2 rounded w-full">
                        @error('last_name') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" wire:model="email" class="border border-gray-300 p-2 rounded w-full">
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" wire:model="password" class="border border-gray-300 p-2 rounded w-full">
                    @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" wire:model="password_confirmation" class="border border-gray-300 p-2 rounded w-full">
                </div>

                <!-- Gender Field -->
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Gender</label>
                    <select wire:model="gender" class="border border-gray-300 p-3 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="" disabled>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                    @error('gender') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- Phone Field -->
                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="text" wire:model="phone" class="border border-gray-300 p-3 rounded-md w-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    @error('phone') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Upload Image</label>
                    <input type="file" wire:model="image" class="border border-gray-300 p-2 rounded w-full">
                    @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 w-full">
                    Register
                </button> -->
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 w-full flex justify-center items-center" wire:loading.attr="disabled" wire:target="register">
                    <span wire:loading class="flex items-center">
                        <!-- Custom Elegant Spinner -->
                        <span class="flex items-center">
                            <div class="spinner-border animate-spin h-5 w-5 border-t-2 border-white rounded-full mr-2"></div>
                            <span>Processing...</span>
                        </span>
                    </span>
                    <span wire:loading.remove>Register</span>
                </button>


            </form>

            <p class="mt-4 text-center">
                Already have an account? <a href="{{ route('login') }}" class="text-blue-500">Login</a>
            </p>
        </div>
    </div>

</div>
