<div>
    {{-- Do your work, then step back. --}}
    <div class="flex min-h-screen bg-gray-100 justify-center items-center">
        <div class="bg-white shadow-md rounded-lg p-8 w-full max-w-md">
            <h2 class="text-2xl font-bold text-center mb-6">Forgot Password</h2>

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

            <form wire:submit.prevent="sendResetLink">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" wire:model="email" class="border border-gray-300 p-2 rounded w-full">
                    @error('email') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <!-- <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 w-full">
                    Send Reset Link
                </button> -->

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded mt-4 w-full flex justify-center items-center" wire:loading.attr="disabled" wire:target="register">
                    <span wire:loading>
                        <!-- Custom Elegant Spinner -->
                        <!-- <div class="spinner-border animate-spin h-6 w-6 border-t-2 border-white rounded-full mr-2"></div> -->
                        <!-- Processing... -->
                        <span class="flex items-center">
                            <div class="spinner-border animate-spin h-5 w-5 border-t-2 border-white rounded-full mr-2"></div>
                            <span>Processing...</span>
                        </span>
                    </span>
                    <span wire:loading.remove>Send Reset Link</span>
                </button>


            </form>

            <p class="mt-4 text-center">
                <a href="{{ route('login') }}" class="text-blue-500">Back to Login</a>
            </p>
        </div>
    </div>

</div>
