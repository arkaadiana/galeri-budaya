<!-- Sidebar -->
<div class="w-1/4 bg-gray-100 p-8 flex flex-col items-center">
    <div class="flex items-center mb-16">
        <!-- Link to Home/Dashboard -->
        <a href="{{ route('admin.dashboard') }}" class="flex items-center mt-8">
            <img alt="Logo" class="mr-4" height="40" src="{{ asset('img/logo.png') }}" width="40" />
            <span class="font-bold text-2xl">GaleriBudayaBali.id</span>
        </a>
    </div>
    <nav class="space-y-14 text-center mt-32">
        <a class="block px-3 py-2 text-2xl font-medium {{ request()->is('admin/galery-admin') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}" href="{{ route('galery-admin') }}">Galeri Budaya</a>
        <a class="block px-3 py-2 text-2xl font-medium {{ request()->is('galery') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}" href="#">Artikel Budaya</a>
        <a class="block px-3 py-2 text-2xl font-medium {{ request()->is('galery') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}" href="#">Aksara Bali</a>
        <a class="block px-3 py-2 text-2xl font-medium {{ request()->is('galery') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}" href="#">Kalender Bali</a>
        <a class="block px-3 py-2 text-2xl font-medium {{ request()->is('galery') ? 'text-purple-600' : 'text-gray-800 hover:text-purple-600' }}" href="#">Tentang Kami</a>
    </nav>
    <!-- Logout Button -->
    <a class="block text-red-500 text-2xl mt-auto mb-12 font-bold" href="{{ route('admin.logout') }}">
        Logout
    </a>
</div>
