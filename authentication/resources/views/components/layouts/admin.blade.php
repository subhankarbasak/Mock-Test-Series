<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Vite CSS -->
    @vite('resources/css/app.css')

    <!-- Livewire Styles -->
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen flex flex-col">
        <!-- Header -->
        <header class="bg-blue-600 text-white p-4">
            <div class="container mx-auto">
                <h1 class="text-2xl font-semibold">{{ config('app.name', 'Laravel') }}</h1>
            </div>
        </header>
        <nav class="bg-gray-800 text-white p-4">
    <ul class="flex space-x-4">
        <li><a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a></li>

        @can('manage users')
            <li><a href="{{ route('admin.users') }}" class="hover:underline">Users</a></li>
        @endcan

        @can('manage roles')
            <li><a href="{{ route('admin.roles') }}" class="hover:underline">Roles</a></li>
        @endcan

        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:underline">Logout</button>
            </form>
        </li>
    </ul>
</nav>


        <!-- Main Content -->
        <main class="flex-grow p-4">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="bg-gray-800 text-white p-4">
            <div class="container mx-auto text-center">
                <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
            </div>
        </footer>
    </div>

    <!-- Vite JS -->
    @vite('resources/js/app.js')

    <!-- Livewire Scripts -->
    @livewireScripts
</body>
</html>
