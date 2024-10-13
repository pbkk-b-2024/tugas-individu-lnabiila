<header class="py-4 px-4 md:px-8 bg-white shadow-md">
    <div class="container mx-auto flex items-center justify-between">
        <!-- Brand / Logo -->
        <h1 class="text-2xl font-bold text-pink-500 md:text-3xl">Sekolah</h1>

        <!-- Navbar & Auth Links -->
        <div class="flex items-center space-x-4">
            <!-- Dropdown for small screens -->
            <div class="relative md:hidden">
                <button id="menu-toggle" class="text-black focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/>
                    </svg>
                </button>
                <div id="menu" class="hidden absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md z-50">
                    <a href="{{ route('kelas.index') }}" class="block px-4 py-2 text-black hover:bg-gray-100">Kelas</a>

                    <!-- Auth Links for Small Screens -->
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="block px-4 py-2 text-black hover:bg-gray-100">Dashboard</a>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a href="{{ route('logout') }}" class="block px-4 py-2 text-black hover:bg-gray-100" onclick="event.preventDefault(); this.closest('form').submit();">
                                    Log Out
                                </a>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-black hover:bg-gray-100">Log in</a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="block px-4 py-2 text-black hover:bg-gray-100">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>

            <!-- Navbar for large screens -->
            <nav class="hidden md:flex space-x-4">
                <a href="{{ route('kelas.index') }}" class="text-black hover:text-pink-500">Daftar Kelas</a>
            </nav>

            <!-- Auth Links for Large Screens -->
            <div class="hidden md:flex items-center space-x-2">
                @if (Route::has('login'))
                    @auth
                        <!-- Display User Info and Logout -->
                        <div class="relative">
                            <button id="user-menu-toggle" class="text-black hover:text-pink-500">
                                {{ Auth::user()->name }}
                            </button>
                            <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-md z-50">
                                <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-black hover:bg-gray-100">Profile</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout') }}" class="block px-4 py-2 text-black hover:bg-gray-100" onclick="event.preventDefault(); this.closest('form').submit();">
                                        Log Out
                                    </a>
                                </form>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('login') }}" class="text-black hover:text-pink-500">Log in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-black hover:text-pink-500">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</header>

<script>
    // Toggle for the small screen menu
    const menuToggle = document.getElementById('menu-toggle');
    const menu = document.getElementById('menu');

    menuToggle.addEventListener('click', function() {
        menu.classList.toggle('hidden');
    });

    // Toggle for the user dropdown menu
    const userMenuToggle = document.getElementById('user-menu-toggle');
    const userMenu = document.getElementById('user-menu');

    if (userMenuToggle) {
        userMenuToggle.addEventListener('click', function() {
            userMenu.classList.toggle('hidden');
        });
    }
</script>
