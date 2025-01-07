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
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }

        .scrollable-section {
            height: 80vh;
            overflow-y: auto;
        }

        #hariRayaList {
            font-size: 0.875rem;
        }
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="flex h-screen grid grid-cols-4 bg-white text-gray-800">

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content -->
    <main class="col-span-3 flex flex-col items-center text-sm pt-36">
        <div class="flex items-start bg-white">
            <!-- Hari Raya Section -->
            <section class="w-1/4 p-12 scrollable-section">
                <div class="flex items-center mb-8">
                    <i class="fas fa-bars text-3xl text-purple-600"></i>
                    <span class="ml-2 text-3xl font-semibold text-purple-600">Hari Raya</span>
                </div>
                <ul id="hariRayaList" class="text-gray-700">
                    <!-- Data hari raya akan ditambahkan melalui JavaScript -->
                </ul>

                <div class="mt-4">
                    <form onsubmit="handleTambahHariRaya(event)" class="space-y-4">
                        <input type="text" id="namaHariRaya" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" placeholder="Nama Hari Raya" required />
                        <input type="date" id="tanggalHariRaya" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-600" required />
                        <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded-lg shadow-md hover:bg-green-600">Tambah Hari Raya</button>
                    </form>
                </div>

                <small class="block text-gray-400 text-xs italic mt-4">
                    Catatan: Informasi ini berlaku untuk bulan ini saja. Data akan diperbarui pada bulan berikutnya.
                </small>
            </section>

            <!-- Kalender Section -->
            <section class="w-3/4 p-12 text-6xl">
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
        let hariRaya = [{
                id: 1,
                name: "Buda Keliwon Matal",
                date: "2024-12-04"
            },
            {
                id: 2,
                name: "Tumpek Kandang",
                date: "2024-12-14"
            },
            {
                id: 3,
                name: "Purnama",
                date: "2024-12-15"
            },
            {
                id: 4,
                name: "Buda Wage Menail",
                date: "2024-12-18"
            },
            {
                id: 5,
                name: "Kajeng Keliwon Uwudan",
                date: "2024-12-19"
            },
            {
                id: 6,
                name: "Hari Bhatara Sri",
                date: "2024-12-20"
            },
            {
                id: 7,
                name: "Tilem",
                date: "2024-12-30"
            },
        ];

        const bulanIndonesia = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        function displayHariRaya() {
            const hariRayaList = document.getElementById('hariRayaList');
            hariRayaList.innerHTML = '';

            const table = document.createElement('table');
            table.classList.add('w-full');

            hariRaya.forEach(hari => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td class="w-16 text-center text-gray-500 text-base font-bold align-top">${hari.date.split('-')[2]}</td>
                    <td class="pl-6 text-gray-500 text-sm leading-tight">${hari.name}</td>
                    <td class="pl-4"><button onclick="hapusHariRaya(${hari.id})" class="bg-red-500 text-white py-1 px-3 rounded-md hover:bg-red-600">Hapus</button></td>
                `;
                table.appendChild(row);
            });

            hariRayaList.appendChild(table);
        }

        function handleTambahHariRaya(event) {
            event.preventDefault();
            const nameInput = document.getElementById('namaHariRaya');
            const dateInput = document.getElementById('tanggalHariRaya');
            const name = nameInput.value;
            const date = dateInput.value;

            if (name && date) {
                const id = hariRaya.length > 0 ? hariRaya[hariRaya.length - 1].id + 1 : 1;
                hariRaya.push({
                    id,
                    name,
                    date
                });
                nameInput.value = '';
                dateInput.value = '';
                displayHariRaya();
            } else {
                alert("Nama dan tanggal harus diisi!");
            }
        }

        function hapusHariRaya(id) {
            hariRaya = hariRaya.filter(hari => hari.id !== id);
            displayHariRaya();
        }

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

            for (let i = 0; i < firstDay; i++) {
                cells.push('<td></td>');
            }

            while (day <= lastDate) {
                const isToday = (day === new Date().getDate() && month === new Date().getMonth() && year === new Date().getFullYear()) ? 'today' : '';
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

        displayHariRaya();
        renderCalendar(currentDate);
    </script>

</body>

</html>