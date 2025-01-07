<!DOCTYPE html>
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
    </style>
</head>

<body class="flex h-screen grid grid-cols-4 overflow-hidden">

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content -->
    <div class="col-span-3 bg-white text-gray-800 ms-8">
        <main class="h-screen mt-24 grid grid-cols-6">
            <div class="col-span-4 flex flex-col overflow-y-scroll h-full">
                <!-- Cover -->
                <div id="cover" class="w-1/2 h-full mx-auto">
                    <img id="coverImagePreview" src="{{ asset('${data.cover}') }}" alt="Cultural Main Image" class="w-full h-full object-contain" />
                </div>

                <!-- Informasi -->
                <div id="info" class="h-full flex flex-col justify-center px-8 mb-16"></div>
            </div>

            <!-- Form Update -->
            <div class="w-full flex justify-end items-center p-12 col-span-2">
                <div class="max-w-md w-full"> <!-- Ukuran form diperkecil -->
                    <h2 class="text-2xl font-bold mb-4">Update Info</h2>
                    <form id="updateForm" class="space-y-4">
                        <div>
                            <label for="coverImage" class="block text-lg">Cover Image</label>
                            <input type="file" id="coverImage" class="w-full p-2 border border-gray-300 rounded" accept="image/*" />
                            <p class="text-sm text-gray-500">Choose an image file to upload</p>
                        </div>
                        <div>
                            <label for="tentangKami" class="block text-lg">Tentang Kami</label>
                            <textarea id="tentangKami" class="w-full p-2 border border-gray-300 rounded" rows="4" placeholder="Masukkan deskripsi Tentang Kami"></textarea>
                        </div>
                        <div>
                            <label for="nomorWa" class="block text-lg">Nomor WhatsApp</label>
                            <input type="text" id="nomorWa" class="w-full p-2 border border-gray-300 rounded" placeholder="Masukkan nomor WhatsApp" />
                        </div>
                        <div>
                            <label for="igUsername" class="block text-lg">Instagram Username</label>
                            <input type="text" id="igUsername" class="w-full p-2 border border-gray-300 rounded" placeholder="Masukkan Username Instagram" />
                        </div>
                        <button type="button" id="updateButton" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-700 transition-colors">
                            Update Info
                        </button>
                    </form>
                </div>
            </div>
        </main>
    </div>



    <script>
        // Data dummy
        const data = {
            id: 1,
            cover: 'img/Bali2.png',
            tentangKami: 'Galeri Budaya Bali adalah sebuah platform yang didedikasikan untuk memperkenalkan, melestarikan, dan menyebarkan kekayaan budaya Pulau Dewata. Kami percaya bahwa warisan budaya yang kaya harus dijaga, dihormati, dan diteruskan kepada generasi mendatang. Melalui situs ini, kami menghubungkan masyarakat dengan tradisi, seni, dan nilai-nilai luhur Bali. Visi kami adalah menjadi jembatan bagi siapa saja yang ingin mengenal Bali lebih dalam, sekaligus misi kami adalah memupuk rasa cinta terhadap budaya lokal di era modern ini.',
            nomorWa: '+6287758058885',
            igUsername: '4rrka'
        };

        // Function to display the cover image and information
        function displayContent(data) {
            // Display the cover image with ID
            const coverDiv = document.getElementById('cover');
            coverDiv.id = `cover-${data.id}`; // Menambahkan ID elemen
            document.getElementById('coverImagePreview').src = `{{ asset('${data.cover}') }}`;

            // Display the information with ID
            const infoDiv = document.getElementById('info');
            infoDiv.id = `info-${data.id}`; // Menambahkan ID elemen
            infoDiv.innerHTML = `
                <h2 class="text-3xl font-bold mb-4">Tentang Kami</h2>
                <p class="mb-4 text-lg text-justify">${data.tentangKami}</p>
                <h3 class="text-2xl font-bold mb-4">Kontak Kami</h3>
                <div class="flex space-x-4">
                    <!-- Tombol WhatsApp -->
                    <a class="text-green-500 text-3xl hover:text-green-700 transition-colors" href="https://wa.me/${data.nomorWa}" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <!-- Tombol Instagram -->
                    <a class="text-pink-500 text-3xl hover:text-pink-700 transition-colors" href="https://instagram.com/${data.igUsername}" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            `;
        }

        // Function to handle file upload and update preview
        document.getElementById('coverImage').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('coverImagePreview').src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });

        // Function to update content based on form input
        function updateContent() {
            data.cover = document.getElementById('coverImagePreview').src; // Use base64 or file URL
            data.tentangKami = document.getElementById('tentangKami').value;
            data.nomorWa = document.getElementById('nomorWa').value;
            data.igUsername = document.getElementById('igUsername').value;
            displayContent(data); // Update the content on page
        }

        // Call the function to display content on initial load
        displayContent(data);
    </script>
</body>

</html>