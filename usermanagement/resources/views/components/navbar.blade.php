<!-- <nav class="bg-blue-500 p-4">
    <div class="max-w-7xl mx-auto flex justify-between items-center">
        <div class="text-white text-xl font-semibold">My App</div>
        <div class="space-x-4">
            <a href="/" class="text-white">Home</a>
            <a href="/about" class="text-white">About</a>
            <a href="/contact" class="text-white">Contact</a>
        </div>
    </div>
</nav> -->

<nav class="bg-blue-500 text-white p-4">
    <ul class="flex space-x-4">
        <li><a href="{{ route('admin.dashboard') }}" class="hover:underline">Dashboard</a></li>

        @can('manage users')
            <li><a href="{{ route('admin.users') }}" class="hover:underline">Users</a></li>
        @endcan

        @can('manage roles')
            <li><a href="{{ route('admin.roles') }}" class="hover:underline">Roles</a></li>
        @endcan

        <li>
            <form method="get" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="hover:underline">Logout</button>
            </form>
        </li>
    </ul>
</nav>

