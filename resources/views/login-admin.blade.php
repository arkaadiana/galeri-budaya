<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Galeri Budaya Bali Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="bg-white flex items-center justify-center min-h-screen p-4">
    <div class="w-full max-w-md mx-auto">
        <div class="flex flex-col items-center mb-8 text-center">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="mb-4 max-w-full h-auto w-24" />
            <h1 class="text-lg font-bold text-gray-800 sm:text-xl">
                Masuk Sebagai Admin<br />Galeri Budaya Bali
            </h1>
        </div>

        <!-- Tampilkan pesan error atau success -->
        @if(session('error'))
            <div class="bg-red-500 text-white p-3 mb-4 rounded-lg text-center">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 mb-4 rounded-lg text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('admin.login') }}" method="POST" class="px-6 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label for="username" class="block text-gray-700 text-sm font-bold mb-2">
                    Nama pengguna
                </label>
                <input type="text" id="username" name="username" placeholder="Masukan nama pengguna"
                    class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-300" required />
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                    Kata Sandi
                </label>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Masukan kata sandi"
                        class="shadow appearance-none border rounded-lg w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:ring focus:border-blue-300" required />
                    <span toggle="#password" class="absolute top-3 right-3 text-gray-500 cursor-pointer"
                        onclick="togglePasswordVisibility()">
                        <i class="fas fa-eye" id="toggle-icon"></i>
                    </span>
                </div>
            </div>
            <div class="flex items-center justify-center">
                <button type="submit"
                    class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg w-full focus:outline-none focus:ring focus:ring-blue-400">
                    Masuk
                </button>
            </div>
        </form>

        <div class="flex items-center justify-center mt-4">
            <img src="{{ asset('img/logo.png') }}" alt="Small Logo" class="mr-2 w-5 h-5 max-w-full" />
            <p class="text-gray-500 text-sm">GaleriBudayaBali.id</p>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("password");
            const toggleIcon = document.getElementById("toggle-icon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>

</html>
