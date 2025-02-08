<aside class="bg-white dark:bg-gray-800 shadow-lg h-screen w-64 md:w-72 fixed md:relative transform transition-all duration-500 ease-in-out overflow-y-auto"
       :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full md:translate-x-0'">
    <div class="p-4 text-lg font-bold text-gray-700 dark:text-gray-200 flex justify-between items-center sticky top-0 bg-white dark:bg-gray-800 z-10">
        <!-- <span>Admin Panel</span> -->
        <!-- Logo with Conditional Image Based on Theme -->
        <div class="flex items-center space-x-2">
            <!-- Light Mode Logo -->
            <img x-bind:src="document.documentElement.classList.contains('dark') ? '/path/to/dark-logo.png' : 'https://icon-library.com/images/avatar-icon-images/avatar-icon-images-4.jpg'"
                 alt="Admin Panel Logo" class="w-8 h-8">
            <span>Admin Panel</span>
        </div>
        <!-- Mobile Sidebar Toggle Button -->
        <button @click="sidebarOpen = !sidebarOpen" class="md:hidden p-2 text-gray-600 dark:text-gray-400">
            ☰
        </button>
    </div>

    <nav class="mt-4">
        <!-- Dashboard Link -->
        <a href="{{ route('admin.dashboard') }}"
           class="block py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 ease-in-out">
            🏠 Dashboard
        </a>

        <!-- User Management Section -->
        <div x-data="{ open: false }" class="border-b border-gray-300 dark:border-gray-700">
            <button @click="open = !open"
                    class="w-full py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 flex justify-between items-center transition-colors duration-200 ease-in-out">
                <span>👤 User Management</span>
                <svg x-show="!open" class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                <svg x-show="open" class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
            </button>
            <div x-show="open" class="pl-4 space-y-2 mt-2 transition-all duration-300 ease-in-out">
                <a href="{{ url('/admin/users/create') }}"
                   class="block py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 ease-in-out">
                    ➕ Add User
                </a>
                <a href="{{ url('/admin/users') }}"
                   class="block py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 ease-in-out">
                    👀 View Users
                </a>
            </div>
        </div>

        <!-- Roles & Permissions Section -->
        <div x-data="{ open: false }" class="border-b border-gray-300 dark:border-gray-700">
            <button @click="open = !open"
                    class="w-full py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 flex justify-between items-center transition-colors duration-200 ease-in-out">
                <span>🔑 Roles & Permissions</span>
                <svg x-show="!open" class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                <svg x-show="open" class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
            </button>
            <div x-show="open" class="pl-4 space-y-2 mt-2 transition-all duration-300 ease-in-out">
                <a href="{{ url('/admin/roles/create') }}"
                   class="block py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 ease-in-out">
                    ➕ Create Role
                </a>
                <a href="{{ url('/admin/roles') }}"
                   class="block py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 ease-in-out">
                    👀 View Role
                </a>
                <a href="{{ route('permissions.create') }}"
                   class="block py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 ease-in-out">
                    ➕ Create Permission
                </a>
                <a href="{{ route('permissions.index') }}"
                   class="block py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 ease-in-out">
                    👀 View Permission
                </a>
            </div>
        </div>

        <!-- Settings Section -->
        <div x-data="{ open: false }" class="border-b border-gray-300 dark:border-gray-700">
            <button @click="open = !open"
                    class="w-full py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 flex justify-between items-center transition-colors duration-200 ease-in-out">
                <span>⚙️ Settings</span>
                <svg x-show="!open" class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                <svg x-show="open" class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
            </button>
            <div x-show="open" class="pl-4 space-y-2 mt-2 transition-all duration-300 ease-in-out">
                <a href="generalSettings"
                   class="block py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 ease-in-out">
                    ⚙️ General Settings
                </a>
                <a href="mailSettings"
                   class="block py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 ease-in-out">
                    📧 Mail Settings
                </a>
                <a href="smsSettings"
                   class="block py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 ease-in-out">
                    📱 SMS Settings
                </a>
            </div>
        </div>

        <!-- Student Management Section -->
        <div x-data="{ open: false }" class="border-b border-gray-300 dark:border-gray-700">
            <button @click="open = !open"
                    class="w-full py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 flex justify-between items-center transition-colors duration-200 ease-in-out">
                <span>🎓 Student Management</span>
                <svg x-show="!open" class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                <svg x-show="open" class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
            </button>
            <div x-show="open" class="pl-4 space-y-2 mt-2 transition-all duration-300 ease-in-out">
                <!-- All Students Section -->
                <div x-data="{ showAllStudents: false }">
                    <button @click="showAllStudents = !showAllStudents" 
                            class="w-full py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 flex justify-between items-center transition-colors duration-200 ease-in-out">
                        <span>👩‍🎓 All Students</span>
                        <svg x-show="!showAllStudents" class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        <svg x-show="showAllStudents" class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                    </button>
                    <div x-show="showAllStudents" class="pl-4 space-y-2 mt-2 transition-all duration-300 ease-in-out">
                        <a href="addStudent"
                           class="block py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 ease-in-out">
                            ➕ Add New
                        </a>
                        <a href="viewStudents"
                           class="block py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 ease-in-out">
                            👀 View All
                        </a>
                    </div>
                </div>

                <!-- Admissions Section -->
                <div x-data="{ showAdmissions: false }">
                    <button @click="showAdmissions = !showAdmissions" 
                            class="w-full py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 flex justify-between items-center transition-colors duration-200 ease-in-out">
                        <span>📋 Admissions</span>
                        <svg x-show="!showAdmissions" class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        <svg x-show="showAdmissions" class="w-4 h-4 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"></path></svg>
                    </button>
                    <div x-show="showAdmissions" class="pl-4 space-y-2 mt-2 transition-all duration-300 ease-in-out">
                        <a href="addAdmission"
                           class="block py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 ease-in-out">
                            ➕ Add New
                        </a>
                        <a href="viewAdmissions"
                           class="block py-2 px-4 rounded-lg text-gray-700 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 ease-in-out">
                            👀 View All
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</aside>
