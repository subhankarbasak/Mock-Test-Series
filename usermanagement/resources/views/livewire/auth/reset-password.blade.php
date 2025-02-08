<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    <div class="flex min-h-screen bg-gray-100 justify-center items-center">
        <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold text-center mb-6">Reset Password</h2>

            @if(session()->has('success'))
                <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if(session()->has('error'))
                <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                    {{ session('error') }}
                </div>
            @endif

            <form wire:submit.prevent="resetPassword">
                <input type="hidden" wire:model="token">

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" wire:model="email" class="border-gray-300 p-2 rounded w-full">
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">New Password</label>
                    <input type="password" wire:model="password" class="border-gray-300 p-2 rounded w-full">
                    @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="mt-4">
                    <label class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <input type="password" wire:model="password_confirmation" class="border-gray-300 p-2 rounded w-full">
                    @error('password_confirmation') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 w-full">
                    Reset Password
                </button>
            </form>

            <p class="mt-4 text-center">
                <a href="{{ route('login') }}" class="text-blue-500">Back to Login</a>
            </p>
        </div>
    </div>

</div>
