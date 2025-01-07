<nav class="bg-white fixed top-0 left-0 z-50 w-full" x-data="{ isOpen: false }">
    <div class="px-4 sm:px-6 lg:px-8 w-full pt-4">
        <div class="flex h-16 justify-between items-center">
            <!-- Logo Section -->
            <a href="/" class="ms-12">
                <div class="shrink-0 flex items-center">
                    <img alt="Logo" class="w-8 h-8" src="{{ asset('img/logo.png') }}" width="40" height="40" />
                    <span class="font-bold text-2xl ml-2">GaleriBudayaBali.id</span>
                </div>
            </a>

            <!-- Search Bar -->
            <div class="max-md:hidden flex items-center space-x-4 px-8 z-40 mt-4">
                <form action="{{ route('galery') }}" method="GET" class="flex items-center space-x-2">
                    <input
                        class="px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 w-72"
                        type="text" name="search" value="{{ request('search') }}" placeholder="Cari gambar ..." />
                    <button type="submit" class="p-2 rounded-full bg-purple-600 text-white">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Navigation Links -->
            <div class="hidden md:flex items-center space-x-4 me-20">
                <a href="/galery"
                    class="rounded-md px-3 py-2 text-xl font-medium {{ request()->is('galery') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}">Galeri
                    Budaya</a>
                <a href="/artikel"
                    class="rounded-md px-3 py-2 text-xl font-medium {{ request()->is('artikel') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}">Artikel
                    Budaya</a>
                <a href="/aksara"
                    class="rounded-md px-3 py-2 text-xl font-medium {{ request()->is('aksara') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}">Aksara
                    Bali</a>
                <a href="/kalender"
                    class="rounded-md px-3 py-2 text-xl font-medium {{ request()->is('kalender') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}">Kalender
                    Bali</a>
                <a href="/about"
                    class="rounded-md px-3 py-2 text-xl font-medium {{ request()->is('about') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}">Tentang
                    Kami</a>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button type="button" @click="isOpen = !isOpen"
                    class="inline-flex items-center justify-center rounded-md bg-gray-800 p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                    aria-controls="mobile-menu" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg :class="{ 'hidden': isOpen, 'block': !isOpen }" class="block h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16m-16 6h16" />
                    </svg>
                    <svg :class="{ 'block': isOpen, 'hidden': !isOpen }" class="hidden h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile menu -->
    <div x-show="isOpen" class="md:hidden border-t border-gray-700 z-40" id="mobile-menu">
        <div class="space-y-12 px-2 pb-3 pt-2 sm:px-3 ms-6">
            <!-- Mobile Search Bar -->
            <form action="{{ route('galery') }}" method="GET" class="flex items-center space-x-2 px-4 py-2">
                <input
                    class="px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 w-full"
                    type="text" name="search" value="{{ request('search') }}" placeholder="Cari disini ..." />
                <button type="submit" class="p-2 rounded-full bg-purple-600 text-white">
                    <i class="fas fa-search"></i>
                </button>
            </form>

            <a href="/galery"
                class="block rounded-md px-3 py-2 text-xl font-medium {{ request()->is('galery') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}">Galeri
                Budaya</a>
            <a href="/artikel"
                class="block rounded-md px-3 py-2 text-xl font-medium {{ request()->is('artikel') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}">Artikel
                Budaya</a>
            <a href="/aksara"
                class="block rounded-md px-3 py-2 text-xl font-medium {{ request()->is('aksara') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}">Aksara
                Bali</a>
            <a href="/kalender"
                class="block rounded-md px-3 py-2 text-xl font-medium {{ request()->is('kalender') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}">Kalender
                Bali</a>
            <a href="/about"
                class="block rounded-md px-3 py-2 text-xl font-medium {{ request()->is('about') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}">Tentang
                Kami</a>
        </div>
    </div>
</nav>

<!-- Additional styling to prevent content overlap -->
<div class="pt-20">
    <!-- Page content here -->
</div>

<style>
    /* Menambahkan styling untuk memastikan navbar tetap di atas */
    body {
        position: relative;
        z-index: 0;
        /* Pastikan body tidak menutupi navbar */
    }

    /* Tambahkan kelas untuk memastikan navbar tetap di atas */
    nav {
        z-index: 100;
        /* Pastikan navbar memiliki nilai z-index yang lebih tinggi */
    }

    /* Pastikan konten tidak tertutupi navbar */
    .pt-20 {
        padding-top: 5rem;
        /* Sesuaikan dengan tinggi navbar */
    }
</style>