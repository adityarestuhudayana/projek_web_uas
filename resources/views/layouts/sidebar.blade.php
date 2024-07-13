<div id="sidebar"
    class="h-full w-[60%] lg:w-[25%] flex flex-row fixed top-[10%] lg:top-0 z-10 duration-300 translate-x-[-100%] lg:translate-x-0"
    x-data="{ sidenav: true }">
    <div
        class="bg-white h-screen md:block shadow-xl px-3 w-full overflow-x-hidden transition-transform duration-300 ease-in-out">
        <div class="space-y-6 md:space-y-10 mt-10">

            <div id="profile" class="space-y-3">
                <img src="{{ asset(auth()->user()->image) }}" alt="Avatar user"
                    class="w-24 h-24 object-cover rounded-full lg:mx-auto" />
                <div>
                    <h2 class="font-medium text-2xl text-teal-500 lg:text-center">
                        {{ Str::title(auth()->user()->first_name . ' ' . auth()->user()->last_name) }}
                    </h2>
                    @can('is_admin')
                        <p class="text-xs text-gray-500 lg:text-center">Administrator</p>
                    @endcan
                </div>
            </div>

            <div id="menu" class="flex flex-col space-y-2">
                @can('is_admin')
                    <a href="/dashboard"
                        class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-blue-500 hover:text-white hover:text-base rounded-md transition duration-150 ease-in-out">
                        <i class="fa-solid fa-house-user text-xl"></i>
                        <span class="">Dashboard</span>
                    </a>
                    <a href="/users"
                        class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-blue-500 hover:text-white hover:text-base rounded-md transition duration-150 ease-in-out">
                        <i class="fa-solid fa-users text-xl"></i>
                        <span class="">Pengguna</span>
                    </a>
                    <a href="/categories"
                        class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-blue-500 hover:text-white hover:text-base rounded-md transition duration-150 ease-in-out">
                        <i class="fa-solid fa-list text-xl"></i>
                        <span class="">Kategori</span>
                    </a>
                    <a href="/comments"
                        class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-blue-500 hover:text-white hover:text-base rounded-md transition duration-150 ease-in-out">
                        <i class="fa-solid fa-comments text-xl"></i>
                        <span class="">Komentar</span>
                    </a>
                @endcan
                <a href="/"
                    class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-blue-500 hover:text-white hover:text-base rounded-md transition duration-150 ease-in-out">
                    <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                    <span class="">Beranda</span>
                </a>
                <a href="/cart"
                    class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-blue-500 hover:text-white hover:text-base rounded-md transition duration-150 ease-in-out">
                    <i class="fa-solid fa-cart-shopping text-xl"></i>
                    <span class="">Keranjang</span>
                </a>
                <a href="/products"
                    class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-blue-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                    <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z">
                        </path>
                    </svg>
                    <span class="">Produk saya</span>
                </a>
                <a href="/orders"
                    class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-blue-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                    <i class="fa-solid fa-truck-fast text-xl"></i>
                    <span class="">Pesanan saya</span>
                </a>
                <a href="/history"
                    class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-blue-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                    <svg class="w-6 h-6 fill-current inline-block" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                        <path fill-rule="evenodd"
                            d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="">Riwayat</span>
                </a>
                <a href="/profile"
                    class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-blue-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                    <i class="fa-solid fa-user-tie text-xl"></i>
                    <span class="">Profile</span>
                </a>

                <form action="/logout" method="POST"
                    class="text-sm font-medium text-gray-700 py-2 px-2 hover:bg-red-500 hover:text-white hover:scale-105 rounded-md transition duration-150 ease-in-out">
                    @csrf
                    <i class="fa-solid fa-right-from-bracket text-xl"></i>
                    <button type="submit">Logout</button>
                </form>

            </div>
        </div>
    </div>

</div>
