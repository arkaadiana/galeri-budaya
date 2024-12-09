<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Galeri Budaya Bali</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-white text-gray-800">
    <!-- Header Section -->
    <x-navbar></x-navbar>

<<<<<<< HEAD
    <!-- Main Content -->
    <section id="main-content" class="mt-24 flex justify-center items-center py-12 overflow-auto">
        <div id="cover" class="w-full max-w-screen-2xl h-[90vh] hover:scale-110 transition-transform duration-300">
        </div>
    </section>
=======
  <!-- Main Content -->
  <section id="main-content" class="mt-24 flex justify-center items-center py-12">
    <div id="cover" class="w-full max-w-screen-xl h-[120vh] hover:scale-105 transition-transform duration-300"></div>
  </section>
>>>>>>> 7aa05c387039a58145ce24662f9b5255846f62f8

    <script>
        // Sample data with only the cover image and ID
        const data = {
            id: 1,
            cover: '/img/Aksara/aksara.png',
        };

        // Function to display the cover image with the ID
        const displayContent = (data) => {
            const coverDiv = document.getElementById('cover');
            coverDiv.id = `cover-${data.id}`; // Add ID to the div element
            coverDiv.innerHTML = `
        <img src="${data.cover}" alt="Gambar Budaya Bali" class="w-full h-full object-contain" />
      `;
        };

        // Call the function to display the content
        displayContent(data);
    </script>
</body>

</html>
