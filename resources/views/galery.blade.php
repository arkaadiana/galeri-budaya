<?php
// Function to read all images in a specified directory
function getImagesFromDirectory($directory)
{
  $imageFiles = [];
  $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

  if (is_dir($directory)) {
    $files = scandir($directory);
    foreach ($files as $file) {
      if ($file !== '.' && $file !== '..') {
        $filePath = $directory . '/' . $file;
        $fileExtension = pathinfo($file, PATHINFO_EXTENSION);
        if (in_array(strtolower($fileExtension), $allowedExtensions)) {
          $imageFiles[] = [
            'src' => asset($filePath),
            'alt' => pathinfo($file, PATHINFO_FILENAME)
          ];
        }
      }
    }
  }

  return $imageFiles;
}

// Directory data
$imageData = [
  'badung' => getImagesFromDirectory('img/Badung'),
  'bangli' => getImagesFromDirectory('img/Bangli'),
  'buleleng' => getImagesFromDirectory('img/Buleleng'),
  'denpasar' => getImagesFromDirectory('img/Denpasar'),
  'gianyar' => getImagesFromDirectory('img/Gianyar'),
  'karangasem' => getImagesFromDirectory('img/Karangasem'),
  'klungkung' => getImagesFromDirectory('img/Klungkung'),
  'tabanan' => getImagesFromDirectory('img/Tabanan')
];

// Encode data to JSON for use in JavaScript
$imageDataJson = json_encode($imageData);
?>

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

    #content-container img {
      margin: 10px;
      max-width: 100%;
      height: auto;
    }

    #content-container {
      display: flex;
      flex-wrap: wrap;
      gap: 10px;
    }

    #content-container img {
      flex: 1 1 calc(25% - 20px);
      max-width: 100%;
      height: auto;
      object-fit: cover;
    }

    .region-button:hover {
      color: #a855f7;
    }

    .region-button.bg-purple-500:hover {
      color: white;
    }

    .region-button-container {
      position: sticky;
      top: 100px;
      z-index: 999;
      background-color: none;
      padding: 15px 20px;
      display: flex;
      justify-content: center;
    }
  </style>
</head>
<body class="bg-white text-gray-800">
  <!-- Header Section -->
  <x-navbar></x-navbar>

  <!-- Region Selector Section -->
  <main class="container mx-auto px-4 py-8 pt-24 mt-24">
    <div class="region-button-container flex flex-wrap justify-center mb-4">
      <button class="region-button bg-white text-gray-700 rounded-full px-4 py-2 m-2" data-region="semua">Semua</button>
      <button class="region-button bg-white text-gray-700 rounded-full px-4 py-2 m-2" data-region="badung">Badung</button>
      <button class="region-button bg-white text-gray-700 rounded-full px-4 py-2 m-2" data-region="bangli">Bangli</button>
      <button class="region-button bg-white text-gray-700 rounded-full px-4 py-2 m-2" data-region="buleleng">Buleleng</button>
      <button class="region-button bg-white text-gray-700 rounded-full px-4 py-2 m-2" data-region="denpasar">Denpasar</button>
      <button class="region-button bg-white text-gray-700 rounded-full px-4 py-2 m-2" data-region="gianyar">Gianyar</button>
      <button class="region-button bg-white text-gray-700 rounded-full px-4 py-2 m-2" data-region="karangasem">Karangasem</button>
      <button class="region-button bg-white text-gray-700 rounded-full px-4 py-2 m-2" data-region="klungkung">Klungkung</button>
      <button class="region-button bg-white text-gray-700 rounded-full px-4 py-2 m-2" data-region="tabanan">Tabanan</button>
    </div>

    <!-- Container to display images -->
    <div id="content-container" class="flex flex-wrap justify-center"></div>
  </main>

  <!-- JavaScript for interactivity -->
  <script>
    // Fetch JSON data from PHP
    const imageData = <?php echo $imageDataJson; ?>;

    // Function to display images based on category
    function displayImages(region) {
      const container = document.getElementById('content-container');
      container.innerHTML = ''; // Clear container before showing new images

      const filteredImages = region === 'semua' ? Object.values(imageData).flat() : imageData[region];

      filteredImages.forEach(image => {
        const imgElement = document.createElement('img');
        imgElement.dataset.src = image.src; // Use data-src for lazy loading
        imgElement.alt = image.alt;
        imgElement.classList.add('w-80', 'h-auto', 'object-cover', 'transition-transform', 'duration-300', 'hover:scale-110');

        container.appendChild(imgElement);
      });

      lazyLoadImages(); // Call lazy load function
    }

    // Function to load images as elements come into view
    function lazyLoadImages() {
      const images = document.querySelectorAll('#content-container img');
      const observer = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            const img = entry.target;
            img.src = img.dataset.src; // Get source from data-src
            img.onload = () => img.removeAttribute('data-src'); // Remove data-src after loading
            observer.unobserve(img);
          }
        });
      }, {
        rootMargin: '0px 0px 200px 0px', // Trigger before image is fully visible
      });

      images.forEach(img => observer.observe(img));
    }

    // Set the "Semua" button as active by default
    document.addEventListener('DOMContentLoaded', () => {
      const semuaButton = document.querySelector('.region-button[data-region="semua"]');
      if (semuaButton) {
        semuaButton.classList.remove('bg-gray-200', 'text-gray-700');
        semuaButton.classList.add('bg-purple-500', 'text-white'); // Active color for the button
      }
      displayImages('semua');
    });

    // Add event listeners to buttons
    document.querySelectorAll('.region-button').forEach(button => {
      button.addEventListener('click', () => {
        // Remove active background color and add to clicked button
        document.querySelectorAll('.region-button').forEach(btn => {
          btn.classList.remove('bg-purple-500', 'text-white');
          btn.classList.add('bg-white', 'text-gray-700'); // Non-active color
        });
        button.classList.remove('bg-white', 'text-gray-700');
        button.classList.add('bg-purple-500', 'text-white'); // Active color for clicked button

        const region = button.getAttribute('data-region');
        displayImages(region);
      });
    });
  </script>
</body>
</html>
