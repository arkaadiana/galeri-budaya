<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Galeri Budaya Bali</title>
  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }

    .typing-effect {
      display: inline;
      border-right: 2px solid #6b46c1;
      animation: blink 0.7s step-end infinite;
    }

    @keyframes blink {
      50% {
        border-color: transparent;
      }
    }
  </style>
</head>

<body class="bg-white text-gray-800">
  <!-- Navbar -->
  <x-navbar></x-navbar>

  <!-- Main Content -->
  <main class="mt-20 px-8">
    <div class="flex flex-col md:flex-row">
      <!-- Left Section -->
      <div class="md:w-3/5 md:pr-8 pl-[220px] flex flex-col justify-end mb-[200px]">
        <h1 class="text-4xl font-bold">
          <div class="block text-5xl">Jelajahi Pesona</div>
          <div class="block text-5xl">Wilayah <span id="typing" class="text-purple-700 typing-effect text-6xl"></span></div>
        </h1>
        <p class="mt-4 text-lg">
          Kami hadir untuk membawa pesona budaya Bali lebih dekat kepada Anda. Temukan keajaiban
          <span class="font-bold">tradisi</span>, <span class="font-bold">sejarah</span>, dan
          <span class="font-bold">seni</span>.
        </p>
      </div>

      <!-- Right Section -->
      <div class="md:w-2/3 md:pr-40 mt-8 md:mt-12">
        <div class="grid grid-cols-1 gap-4">
          <img alt="Cultural" class="h-auto max-w-5xl transition-all duration-300 hover:scale-110"
            src="{{ asset('img/Bali.png') }}" />
        </div>
      </div>
    </div>
  </main>

  <!-- Footer Script -->
  <script>
    // Navbar toggle logic (optional, adjust as needed)
    const navButton = document.querySelector('header nav .relative button');
    if (navButton) {
      navButton.addEventListener('click', function () {
        this.nextElementSibling.classList.toggle('hidden');
      });
    }

    // Typing effect logic
    const regions = ["Denpasar", "Badung", "Gianyar", "Tabanan", "Karangasem", "Jembrana", "Bangli", "Buleleng", "Klungkung"];
    let index = 0;
    let charIndex = 0;
    const typingElement = document.getElementById("typing");

    function type() {
      if (charIndex < regions[index].length) {
        typingElement.textContent += regions[index].charAt(charIndex);
        charIndex++;
        setTimeout(type, 150);
      } else {
        setTimeout(erase, 1000);
      }
    }

    function erase() {
      if (charIndex > 0) {
        typingElement.textContent = regions[index].substring(0, charIndex - 1);
        charIndex--;
        setTimeout(erase, 100);
      } else {
        index = (index + 1) % regions.length;
        setTimeout(type, 150);
      }
    }

    document.addEventListener("DOMContentLoaded", () => {
      type();
    });
  </script>
</body>

</html>
