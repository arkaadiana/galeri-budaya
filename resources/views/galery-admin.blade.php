<?php
// Function to read all images in a specified directory
function getImagesFromDirectory($directory, $search = '')
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
                    // If search query exists, filter images by name
                    if ($search && stripos(pathinfo($file, PATHINFO_FILENAME), $search) === false) {
                        continue;
                    }
                    $imageFiles[] = [
                        'src' => asset($filePath),
                        'alt' => pathinfo($file, PATHINFO_FILENAME),
                    ];
                }
            }
        }
    }

    return $imageFiles;
}

// Fetch search query if exists
$searchQuery = request('search');

// Directory data
$imageData = [
    'badung' => getImagesFromDirectory('img/Badung', $searchQuery),
    'bangli' => getImagesFromDirectory('img/Bangli', $searchQuery),
    'buleleng' => getImagesFromDirectory('img/Buleleng', $searchQuery),
    'denpasar' => getImagesFromDirectory('img/Denpasar', $searchQuery),
    'gianyar' => getImagesFromDirectory('img/Gianyar', $searchQuery),
    'karangasem' => getImagesFromDirectory('img/Karangasem', $searchQuery),
    'klungkung' => getImagesFromDirectory('img/Klungkung', $searchQuery),
    'tabanan' => getImagesFromDirectory('img/Tabanan', $searchQuery),
];

// Encode data to JSON for use in JavaScript
$imageDataJson = json_encode($imageData);
?>
<html lang="id" class="bg-dark-100">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Galeri Budaya Bali Admin</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        #search-bar {
            width: 100%;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s;
        }

        #search-bar:focus {
            border-color: #6b5b95;
        }

        .add-photo-btn {
            position: absolute;
            top: 20px;
            right: 20px;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
    </style>
</head>

<body class="flex grid grid-cols-4 overflow-hidden">

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content -->
    <main class="container col-span-3 mx-auto relative overflow-y-auto mt-20 w-full">
        <!-- Search Bar -->
        <div class="mb-4 mt-20 mx-20">
            <input
                type="text"
                id="search-bar"
                placeholder="Cari gambar..."
                class=" px-4 py-2 border rounded-lg text-gray-700 focus:outline-none focus:ring-2 focus:ring-purple-500" />
        </div>

        <!-- Region Selector Section -->
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
        <div id="content-container" class="flex flex-wrap justify-center gap-6"></div>

        <!-- Button to Add Photo -->
        <button id="add-photo-btn" class="add-photo-btn me-14 bg-purple-700 g-violet-500 hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300">Tambah Foto</button>

        <!-- Image Upload Form (hidden by default) -->
        <input id="image-upload" type="file" accept="image/*" class="hidden" />
    </main>

    <!-- JavaScript for interactivity -->

    <script>
        // Fetch JSON data from PHP
        const imageData = <?php echo $imageDataJson; ?>;

        // Function to display images based on category and search query
        function displayImages(region, searchQuery = '') {
            const container = document.getElementById('content-container');
            container.innerHTML = ''; // Clear container before showing new images

            const filteredImages = region === 'semua' ? Object.values(imageData).flat() : imageData[region];

            // Filter images based on search query
            const searchFilteredImages = filteredImages.filter(image => {
                return image.alt.toLowerCase().includes(searchQuery.toLowerCase());
            });

            searchFilteredImages.forEach(image => {
                const imgElement = document.createElement('div');
                imgElement.classList.add('relative');

                const img = document.createElement('img');
                img.dataset.src = image.src; // Use data-src for lazy loading
                img.alt = image.alt;
                img.classList.add('w-80', 'h-auto', 'object-cover', 'transition-transform', 'duration-300', 'hover:scale-110');

                const deleteBtn = document.createElement('button');
                deleteBtn.innerHTML = 'Hapus';
                deleteBtn.classList.add('absolute', 'top-2', 'right-2', 'bg-red-500', 'text-white', 'px-2', 'py-1', 'rounded');

                deleteBtn.addEventListener('click', () => {
                    imgElement.remove(); // Remove image from view (not permanently from server)
                });

                imgElement.appendChild(img);
                imgElement.appendChild(deleteBtn);
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

        // Add event listener for search bar input
        document.getElementById('search-bar').addEventListener('input', (event) => {
            const searchQuery = event.target.value;
            const activeRegionButton = document.querySelector('.region-button.bg-purple-500');
            const region = activeRegionButton ? activeRegionButton.getAttribute('data-region') : 'semua';
            displayImages(region, searchQuery); // Pass search query along with region
        });

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

        // Add event listener to "Tambah Foto" button
        document.getElementById('add-photo-btn').addEventListener('click', () => {
            document.getElementById('image-upload').click(); // Trigger file upload dialog
        });

        // Handle file upload
        document.getElementById('image-upload').addEventListener('change', (event) => {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = () => {
                    const imgElement = document.createElement('img');
                    imgElement.src = reader.result;
                    imgElement.alt = file.name;
                    imgElement.classList.add('w-80', 'h-auto', 'object-cover', 'transition-transform', 'duration-300', 'hover:scale-110');

                    // Add the image to the container (you may want to store this in the server or database)
                    const container = document.getElementById('content-container');
                    container.appendChild(imgElement);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>

</html>
