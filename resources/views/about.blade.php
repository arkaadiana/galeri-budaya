<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Galeri Budaya Bali</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>
<body class="bg-white text-gray-800">
    <!-- Header Section -->
    <x-navbar></x-navbar>

    <main class="h-screen flex mt-40">
        <!-- Cover -->
        <div id="cover" class="w-2/4 h-3/4 mx-auto"></div>

        <!-- Informasi -->
        <div id="info" class="w-1/2 h-full flex flex-col justify-center p-8 mt-[-100]"></div>
    </main>

    <script>
        // Data dummy
        const data = {
            cover: 'img/Bali2.png',
            tentangKami: 'Galeri Budaya Bali adalah sebuah platform yang didedikasikan untuk memperkenalkan, melestarikan, dan menyebarkan kekayaan budaya Pulau Dewata. Kami percaya bahwa warisan budaya yang kaya harus dijaga, dihormati, dan diteruskan kepada generasi mendatang. Melalui situs ini, kami menghubungkan masyarakat dengan tradisi, seni, dan nilai-nilai luhur Bali. Visi kami adalah menjadi jembatan bagi siapa saja yang ingin mengenal Bali lebih dalam, sekaligus misi kami adalah memupuk rasa cinta terhadap budaya lokal di era modern ini.',
            nomorWa: '+6287758058885',
            igUsername: '4rrka'
        };

        // Function to display the cover image and information
        function displayContent(data) {
            // Display the cover image
            const coverDiv = document.getElementById('cover');
            coverDiv.innerHTML = `<img src="${data.cover}" alt="Cultural Main Image" class="w-full h-full object-contain" />`;

            // Display the information
            const infoDiv = document.getElementById('info');
            infoDiv.innerHTML = `
                <h2 class="text-3xl font-bold mb-4">Tentang Kami</h2>
                <p class="mb-4 text-lg text-justify">${data.tentangKami}</p>
                <h3 class="text-2xl font-bold mb-4">Kontak Kami</h3>
                <div class="flex space-x-4">
                    <!-- Tombol WhatsApp -->
                    <a class="text-green-500 text-3xl" href="https://wa.me/${data.nomorWa}" target="_blank">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <!-- Tombol Instagram -->
                    <a class="text-pink-500 text-3xl" href="https://instagram.com/${data.igUsername}" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            `;
        }

        // Call the function to display content
        displayContent(data);
    </script>
</body>
</html>
