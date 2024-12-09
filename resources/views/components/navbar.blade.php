<nav class="bg-white" x-data="{ isOpen: false }">
    <div class="px-4 sm:px-6 lg:px-8  w-full pt-4">
        <div class="flex h-16 justify-between items-center">
            <!-- Logo Section -->
            <a href="/" class="ms-12">
                <div class="shrink-0 flex items-center">
                    <img alt="Logo" class="w-8 h-8" src="{{ asset('img/logo.png') }}" width="40" height="40" />
                    <span class="font-bold text-2xl ml-2">GaleriBudayaBali.id</span>
                </div>
            </a>

            <!-- Search Bar -->
            <div class="max-md:hidden flex items-center space-x-4 px-8">
                <input
                    class="px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600 w-72"
                    type="text" placeholder="Cari disini ..." />
                <button class="p-2 rounded-full bg-purple-600 text-white">
                    <i class="fas fa-search"></i>
                </button>
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
    <div x-show="isOpen" class="md:hidden border-t border-gray-700" id="mobile-menu">
        <div class="space-y-12 px-2 pb-3 pt-2 sm:px-3 ms-6">
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
