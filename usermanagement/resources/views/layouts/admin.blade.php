<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: localStorage.getItem('darkMode') === 'true', sidebarOpen: false }"
      x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))"
      :class="darkMode ? 'dark' : ''">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-200">

    <div class="flex h-screen overflow-auto">
        @livewire('admin.sidebar')

        <div class="flex-1 flex flex-col">
            @livewire('admin.navbar')

            <main class="p-2" style=" overflow: auto; ">
                @yield('content')
            </main>
        </div>
    </div>

    @livewireScripts
</body>
</html>
