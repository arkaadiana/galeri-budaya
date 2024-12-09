<header class="flex items-center justify-between p-8 fixed w-full bg-white z-10 top-0 px-8 before:content-[''] before:absolute before:inset-0 before:-top-10 before:bg-white before:z-[-1]">
    <a href="/">
        <div class="flex items-center space-x-2 pl-20">
            <img
                alt="Logo"
                class="w-8 h-8"
                src="{{ asset('img/logo.png') }}"
                width="40"
                height="40" />
            <span class="font-bold text-2xl">GaleriBudayaBali.id</span>
        </div>
    </a>

    <div class="flex items-center space-x-4 pr-20">
        <input
            class="px-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-purple-600"
            type="text"
            placeholder="Cari disini ..." />
        <button class="p-2 rounded-full bg-purple-600 text-white">
            <i class="fas fa-search"></i>
        </button>
    </div>

    <nav class="space-x-4 pr-20 text-xl">
        <a href="/galery" class="{{ request()->is('galery') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}">Galeri Budaya</a>
        <a href="/artikel" class="{{ request()->is('artikel') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}">Artikel Budaya</a>
        <a href="/aksara" class="{{ request()->is('aksara') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}">Aksara Bali</a>
        <a href="/kalender" class="{{ request()->is('kalender') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}">Kalender Bali</a>
        <a href="/about" class="{{ request()->is('about') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}">Tentang Kami</a>
    </nav>

</header>