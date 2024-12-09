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
</head>

<body class="bg-white text-gray-800">
  <!-- Header Section -->
  <x-navbar></x-navbar>

  <!-- Main Content -->
  <section id="main-content" class="mt-24 flex justify-center items-center py-12">
    <div id="cover" class="w-full max-w-screen-xl h-[120vh] hover:scale-105 transition-transform duration-300"></div>
  </section>

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
