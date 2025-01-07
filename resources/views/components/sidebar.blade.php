<!-- Sidebar -->
<div class="bg-gray-100 p-8 relative md:flex h-screen overflow-hidden flex flex-col items-center items-center top-0 left-0">

    <div class="flex items-center mb-16">
        <!-- Link to Home/Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="flex items-center mt-8">
            <img alt="Logo" class="mr-4" height="40" src="{{ asset('img/logo.png') }}" width="40" />
            <span class="font-bold text-2xl">GaleriBudayaBali.id</span>
        </a>
    </div>
    <nav class="space-y-14 text-center mt-32">
        <a class="block px-3 py-2 text-2xl font-medium {{ request()->is('admin/galery-admin') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}" href="{{ route('galery-admin') }}">Galeri Budaya</a>
        <a class="block px-3 py-2 text-2xl font-medium {{ request()->is('admin/artikel-admin') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}" href="{{ route('artikel-admin') }}">Artikel Budaya</a>
        <a class="block px-3 py-2 text-2xl font-medium {{ request()->is('admin/aksara-admin') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}" href="{{ route('aksara-admin') }}">Aksara Bali</a>
        <a class="block px-3 py-2 text-2xl font-medium {{ request()->is('admin/kalender-admin') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}" href="{{ route('kalender-admin') }}">Kalender Bali</a>
        <a class="block px-3 py-2 text-2xl font-medium {{ request()->is('admin/about-admin') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}" href="{{ route('about-admin') }}">Tentang Kami</a>
    </nav>
    <!-- Logout Button -->
    <a class="block text-red-500 text-2xl mt-auto mb-12 font-bold hover:text-red-700 transition duration-300"
        href="{{ route('admin.logout') }}">
        Keluar
    </a>
</div>