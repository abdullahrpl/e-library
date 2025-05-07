<nav class="navbar bg-white border-b shadow-sm fixed w-full capitalize">
    <div class="flex items-center justify-between h-16 px-4 mx-[20px]">
        <div class="flex items-center">
            <div class="flex items-center gap-2">
                <i class="fa fa-book text-indigo-600 text-xl"></i>
                <span class="text-xl font-bold">E-Library</span>
            </div>
        </div>

        <div class="flex-1 flex justify-center px-4">
            <div class="relative w-full max-w-md">
                <i class="fa fa-search absolute left-3 top-3 text-gray-500 text-sm"></i>
                <input type="search" placeholder="Cari buku..."
                    class="w-full pl-10 pr-4 py-2 rounded-md border border-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500">
            </div>
        </div>

        <div class="flex items-center gap-4">

            @guest
                <a href="{{ route('login') }}"
                    class="px-4 py-[5px] text-sm text-indigo-600 border-2 border-indigo-600 rounded-md hover:bg-indigo-600 hover:text-white">Login</a>
                <a href="{{ route('register') }}"
                    class="px-4 py-2 text-sm bg-indigo-600 text-white rounded-md hover:bg-indigo-700">Register</a>
            @endguest
            @auth
                <div class="" id="profileDropdown">
                    <button class="flex items-center gap-2 px-2 py-1 rounded-md hover:bg-gray-100"
                        onclick="toggleDropdown()">
                        <div class="w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center">
                            <span class="text-sm font-medium">AD</span>
                        </div>
                        <span class="hidden md:inline-block capitalize">{{ Auth::user()->username }}</span>
                        <i class="fa fa-chevron-down text-xs opacity-50"></i>
                    </button>

                    <div id="dropdown"
                        class="absolute right-0 mt-2 w-56 bg-white rounded-md shadow-lg border border-gray-200 hidden z-50 capitalize">
                        <div class="py-2 px-4 border-b border-gray-200">
                            <p class="text-sm font-medium">Akun Saya</p>
                        </div>
                        <div class="py-1">
                            <a href="profile.html" class="flex items-center px-4 py-2 text-sm hover:bg-gray-100">
                                <i class="fa fa-user mr-2 text-sm"></i>
                                <span>Edit Profil</span>
                            </a>
                            <a href="settings.html" class="flex items-center px-4 py-2 text-sm hover:bg-gray-100">
                                <i class="fa fa-cog mr-2 text-sm"></i>
                                <span>Pengaturan</span>
                            </a>
                        </div>
                        <div class="py-1 border-t border-gray-200">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="flex items-center px-4 py-2 text-sm text-red-500 hover:bg-gray-100 w-full text-left">
                                    <i class="fa fa-sign-out-alt mr-2 text-sm"></i>
                                    <span>Keluar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
