<aside class="sidebar">
    <div class="sidebar-content">
        <ul class="py-2">
            <li>
                <a href=" {{ url('/admin') }} "
                    class="flex sidebar-link items-center gap-2 px-4 py-2 {{ request()->routeIs('dashboard') ? 'bg-indigo-50 text-indigo-700 border-r-4 border-indigo-700' : 'hover:bg-gray-100' }}">
                    <i class="fa fa-home text-sm"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('books.index') }}"
                    class="flex sidebar-link items-center gap-2 px-4 py-2 {{ request()->routeIs('books.index') ? 'bg-indigo-50 text-indigo-700 border-r-4 border-indigo-700' : 'hover:bg-gray-100' }}">
                    <i class="fa fa-book text-sm"></i>
                    <span>Buku</span>
                </a>
            </li>
            <li>
                <a href="{{ route('user') }}" 
                class="flex sidebar-link items-center gap-2 px-4 py-2 {{ request()->routeIs('user') ? 'bg-indigo-50 text-indigo-700 border-r-4 border-indigo-700' : 'hover:bg-gray-100' }}">
                    <i class="fa fa-users text-sm"></i>
                    <span>User</span>
                </a>
            </li>
        </ul>

        <div class="mt-auto pt-4 border-t border-gray-200 absolute bottom-0 w-full">
            <ul class="py-2">
                <li>
                    <a href="" class="flex sidebar-link items-center gap-2 px-4 py-2 ">
                        <i class="fa fa-cog text-sm"></i>
                        <span>Pengaturan</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</aside>
