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
            overflow-x: hidden;
            /* Menghindari scroll horizontal */
        }

        .scrollable-section {
            height: 80vh;
            overflow-y: auto;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="bg-white text-gray-800">
    <!-- Header Section -->
    <x-navbar></x-navbar>

    <!-- Main Section -->
    <main class="flex flex-col items-center mt-64 text-3xl">
        <div class="flex items-start w-full max-w-6xl">
            <!-- Hari Raya -->
            <section class="w-1/4 p-12 scrollable-section">
                <div class="flex items-center mb-8">
                    <i class="fas fa-bars text-3xl text-purple-600"></i>
                    <span class="ml-2 text-3xl font-semibold text-purple-600">Hari raya</span>
                </div>
                <ul id="hariRayaList" class="text-gray-700 text-xl">
                    <!-- Data hari raya akan ditambahkan melalui JavaScript -->
                </ul>
                <!-- Tambahkan elemen untuk catatan -->
                <small class="block text-gray-400 text-xs italic mt-4">
                    Catatan: Informasi ini berlaku untuk bulan ini saja. Data akan diperbarui pada bulan berikutnya.
                </small>
            </section>

            <!-- Kalender -->
            <section class="w-3/4 p-12 text-6xl scrollable-section">
                <div class="flex items-center justify-between mb-8">
                    <button class="text-gray-700 text-4xl" onclick="changeMonth(-1)">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <h2 id="monthYear" class="text-4xl font-semibold"></h2>
                    <button class="text-gray-700 text-4xl" onclick="changeMonth(1)">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
                <table class="w-full text-center text-3xl">
                    <thead>
                        <tr class="text-gray-500 text-lg">
                            <th class="py-8">MINGGU</th>
                            <th class="py-8">SENIN</th>
                            <th class="py-8">SELASA</th>
                            <th class="py-8">RABU</th>
                            <th class="py-8">KAMIS</th>
                            <th class="py-8">JUMAT</th>
                            <th class="py-8">SABTU</th>
                        </tr>
                    </thead>
                    <tbody id="calendarBody"></tbody>
                </table>
            </section>
        </div>
    </main>

    <script>
        // Data dummy yang mensimulasikan data hari raya
        const hariRaya = [{
                id: 1,
                name: "Purnama",
                date: "2024-12-15"
            },
            {
                id: 2,
                name: "Tilem",
                date: "2024-12-30"
            },
        ];

        // Nama-nama bulan dalam bahasa Indonesia
        const bulanIndonesia = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        // Fungsi untuk menampilkan hari raya di halaman
        function displayHariRaya() {
            const hariRayaList = document.getElementById('hariRayaList');
            hariRaya.forEach(hari => {
                const hariRayaElement = document.createElement('li');
                hariRayaElement.classList.add('mb-6');

                // Container flex untuk menyelaraskan tanggal dan nama hari raya
                hariRayaElement.innerHTML = `
      <div class="flex items-center">
        <span class="text-2xl text-gray-500 w-16 text-center">${hari.date.split('-')[2]}</span>
        <span class="ml-4 text-2xl">${hari.name}</span>
      </div>
    `;

                hariRayaList.appendChild(hariRayaElement);
            });
        }

        // Menjalankan fungsi untuk menampilkan hari raya saat halaman dimuat
        displayHariRaya();

        const monthYearElement = document.getElementById('monthYear');
        const calendarBody = document.getElementById('calendarBody');
        let currentDate = new Date();

        function renderCalendar(date) {
            calendarBody.innerHTML = '';
            const year = date.getFullYear();
            const month = date.getMonth();
            monthYearElement.textContent = `${bulanIndonesia[month]} ${year}`;

            const firstDay = new Date(year, month, 1).getDay();
            const lastDate = new Date(year, month + 1, 0).getDate();

            let day = 1;
            let rows = [];
            let cells = [];

            // Highlight today's date
            const today = new Date();
            const todayDate = today.getDate();
            const todayMonth = today.getMonth();
            const todayYear = today.getFullYear();

            // Create empty cells for the days before the first day of the month
            for (let i = 0; i < firstDay; i++) {
                cells.push('<td></td>');
            }

            // Populate cells with dates
            while (day <= lastDate) {
                const isToday = (day === todayDate && month === todayMonth && year === todayYear) ? 'today' : '';
                const isSunday = new Date(year, month, day).getDay() === 0 ? 'text-red-600' : '';

                cells.push(`
          <td class="${isToday} ${isSunday} py-2">
            <div class="w-12 h-12 flex items-center justify-center mx-auto ${isToday ? 'bg-purple-600 rounded-full text-white' : ''}">${day}</div>
          </td>
        `);

                if ((day + firstDay) % 7 === 0 || day === lastDate) {
                    rows.push(`<tr>${cells.join('')}</tr>`);
                    cells = [];
                }
                day++;
            }

            calendarBody.innerHTML = rows.join('');
        }

        function changeMonth(offset) {
            currentDate.setMonth(currentDate.getMonth() + offset);
            renderCalendar(currentDate);
        }

        // Initial render
        renderCalendar(currentDate);
    </script>
</body>

</html>
