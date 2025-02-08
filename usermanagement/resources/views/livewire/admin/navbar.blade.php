<nav class="bg-white dark:bg-gray-800 p-4 shadow-md flex items-center justify-between">
    <!-- Sidebar Toggle Button for Mobile -->
    <button @click="sidebarOpen = !sidebarOpen" class="md:hidden p-2 rounded-md bg-gray-200 dark:bg-gray-600">
        ☰
    </button>

    <div class="text-lg font-bold text-gray-700 dark:text-gray-200">Admin Dashboard</div>

    <div class="flex items-center space-x-4">
        <!-- Dark Mode Toggle -->
        <button @click="darkMode = !darkMode" 
        class="px-4 py-2 bg-gray-200 dark:bg-gray-700 rounded-md transition-all">
    <span x-text="darkMode ? '☀️ Light' : '🌙 Dark'"></span>
</button>

        <!-- Profile Dropdown -->
<!-- Profile Dropdown -->
<div x-data="{ dropdownOpen: false }" class="relative">
    <button @click="dropdownOpen = !dropdownOpen" class="flex items-center space-x-2">
        <img src="https://images.unsplash.com/photo-1502378735452-bc7d86632805" class="w-10 h-10 rounded-full" alt="Profile">
        <span class="text-gray-700 dark:text-gray-200">Admin</span>
    </button>

    <!-- Dropdown Menu -->
    <div x-show="dropdownOpen" @click.away="dropdownOpen = false"
         class="absolute right-0 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg">
        <a href="#" class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700">Profile</a>
        <a href="{{ route('logout') }}" class="block px-4 py-2 text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700">Logout</a>
    </div>
</div>

    </div>
</nav>
