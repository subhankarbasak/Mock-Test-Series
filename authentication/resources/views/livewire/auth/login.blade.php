<div>
    {{-- If your happiness depends on money, you will never be happy with yourself. --}}
    
    <div class="flex min-h-screen bg-gray-100 justify-center items-center">
    <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-lg">
        <h2 class="text-2xl font-bold text-center mb-6">Login</h2>

        @if(session()->has('error'))
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form wire:submit.prevent="login">
            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" wire:model="email" class="border-gray-300 p-2 rounded w-full">
                @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700">Password</label>
                <input type="password" wire:model="password" class="border-gray-300 p-2 rounded w-full">
                @error('password') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
            </div>

            <div class="mt-4 flex items-center">
                <input type="checkbox" wire:model="remember" class="mr-2">
                <label class="text-sm text-gray-600">Remember Me</label>
            </div>

            <!-- <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 w-full">
                Login
            </button> -->


                <!-- Submit Button with Spinner and Processing Text -->
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 w-full flex justify-center items-center" wire:loading.attr="disabled" wire:target="login">
                    <span wire:loading>
                        <span class="flex items-center">
                            <div class="spinner-border animate-spin h-5 w-5 border-t-2 border-white rounded-full mr-2"></div>
                            <span>Processing...</span>
                        </span>
                    </span>
                    <span wire:loading.remove>Login</span>
                </button>
        </form>

        <p class="mt-4 text-center">
            Don't have an account? <a href="{{ route('register') }}" class="text-blue-500">Register</a>
        </p>

        <p class="mt-2 text-center">
            <a href="{{ route('password.request') }}" class="text-blue-500">Forgot Password?</a>
        </p>
    </div>
</div>

</div>
