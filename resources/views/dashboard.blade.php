<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard Admin</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body class="flex h-screen grid grid-cols-4 overflow-hidden">

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col items-center justify-center container col-span-3 mx-auto relative overflow-y-auto mt-20 w-full">
        <div class="flex items-center">
            <div class="text-right mr-8">
                <h1 class="text-6xl font-light mb-4">SELAMAT DATANG</h1>
                <h2 class="text-6xl font-light mb-4">DI DASHBOARD</h2>
                <h3 class="text-6xl font-bold">ADMIN</h3>
            </div>
            <img alt="Admin Avatar" class="w-[400px] h-[400px]" src="{{ asset('img/admin.png') }}" />
        </div>
    </div>

    <!-- Success Alert -->
    @if(session('success'))
    <div id="alert" class="fixed top-5 right-5 p-4 bg-green-500 text-white rounded-lg shadow-lg opacity-0 transform scale-75 transition-all duration-500">
        {{ session('success') }}
    </div>
    @endif

    <!-- JavaScript to Show the Alert -->
    <script>
        window.onload = function() {
            const alertBox = document.getElementById('alert');
            if (alertBox) {
                alertBox.classList.remove('opacity-0', 'scale-75'); // Show the alert
                alertBox.classList.add('opacity-100', 'scale-100'); // Animate the alert

                // Hide alert after 3 seconds
                setTimeout(function() {
                    alertBox.classList.remove('opacity-100', 'scale-100');
                    alertBox.classList.add('opacity-0', 'scale-75');
                }, 3000);
            }
        }
    </script>

</body>

</html>
