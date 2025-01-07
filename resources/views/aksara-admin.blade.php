<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Galeri Budaya Bali Admin</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Membuat gambar bisa di-scroll jika melebihi ukuran tampilan */
        #cover {
            max-height: 80vh; /* Menyediakan batas tinggi untuk konten */
            overflow: auto; /* Membuat konten dapat di-scroll */
        }

        #main-content {
            max-height: 80vh; /* Mengatur tinggi maksimal dari #main-content */
            overflow: auto; /* Membuat #main-content dapat di-scroll jika kontennya melebihi tinggi */
        }
    </style>
</head>

<body class="flex h-screen grid grid-cols-4 overflow-hidden bg-white text-gray-800">

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content -->
    <main class="container col-span-3 mx-auto py-12 mt-20 bg-white text-gray-800 overflow-y-auto h-screen flex justify-center items-center">
        <!-- Main Content Section -->
        <section id="main-content" class="flex flex-col justify-between items-center w-full h-full relative -mt-20">
            <!-- Gambar -->
            <div id="cover" class="w-full max-w-screen-xl mb-4 flex-grow flex justify-center items-center">
                <img src="/img/Aksara/aksara.png" alt="Gambar Budaya Bali" class="object-contain w-auto h-auto max-h-full" />
            </div>

            <!-- Tombol Update Gambar -->
            <div class="flex justify-center mt-4">
                <label for="upload" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded shadow cursor-pointer">
                    Update Gambar
                </label>
                <input id="upload" type="file" accept="image/*" class="hidden" onchange="updateImage(event)" />
            </div>
        </section>
    </main>

    <script>
        // Function to update the image
        const updateImage = (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();

                reader.onload = (e) => {
                    const newImageSrc = e.target.result;
                    const coverDiv = document.getElementById('cover');
                    coverDiv.innerHTML = `
                        <img src="${newImageSrc}" alt="Gambar Budaya Bali" class="object-contain w-auto h-auto max-h-full" />
                    `;
                };

                reader.readAsDataURL(file);
            }
        };
    </script>

</body>

</html>
