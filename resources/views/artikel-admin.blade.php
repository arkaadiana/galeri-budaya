<html lang="en">

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
    </style>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body class="min-h-screen grid grid-cols-4 overflow-hidden">

    <!-- Sidebar -->
    <x-sidebar></x-sidebar>

    <!-- Main Content -->
    <main class="container col-span-3 mx-auto py-12 px-6 mt-20 bg-white text-gray-800 overflow-y-auto h-screen flex-1">
        <!-- Add Button -->
        <div class="mb-6 flex justify-end">
            <button id="add-article-btn" class="bg-purple-700 text-white px-4 py-2 rounded-lg g-violet-500 hover:bg-violet-600 active:bg-violet-700 focus:outline-none focus:ring focus:ring-violet-300 me-4">
                Tambah Artikel
            </button>
        </div>

        <!-- Form to Add Article -->
        <section id="add-article-form" class="hidden">
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Cover Image</label>
                <input type="file" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Judul Artikel</label>
                <input type="text" id="article-title" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan judul artikel">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Tanggal</label>
                <input type="date" id="article-date" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                <textarea id="article-description" class="w-full px-4 py-2 border border-gray-300 rounded-lg" rows="5" placeholder="Masukkan deskripsi artikel"></textarea>
            </div>
            <div class="flex justify-end">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="addArticle()">Simpan Artikel</button>
                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 ml-4" onclick="cancelAddArticle()">Batal</button>
            </div>
        </section>

        <!-- Form to Edit Article -->
        <section id="edit-article-form" class="hidden">
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Cover Image</label>
                <input type="file" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Judul Artikel</label>
                <input type="text" id="edit-article-title" class="w-full px-4 py-2 border border-gray-300 rounded-lg" placeholder="Masukkan judul artikel">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Tanggal</label>
                <input type="date" id="edit-article-date" class="w-full px-4 py-2 border border-gray-300 rounded-lg">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 font-semibold mb-2">Deskripsi</label>
                <textarea id="edit-article-description" class="w-full px-4 py-2 border border-gray-300 rounded-lg" rows="5" placeholder="Masukkan deskripsi artikel"></textarea>
            </div>
            <div class="flex justify-end">
                <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="updateArticle()">Perbarui Artikel</button>
                <button class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 ml-4" onclick="cancelEditArticle()">Batal</button>
            </div>
        </section>

        <!-- Daftar Artikel -->
        <section id="article-list">
            <!-- Artikel akan diisi oleh JavaScript -->
        </section>
    </main>

    <script>
        // Data dummy yang mensimulasikan data dari database
        const articles = [{
                id: 1, // ID unik untuk artikel
                cover: "/img/Artikel/artikel1.png",
                title: "Lestarikan Pakem dan Gegurat Seni Budaya Bali, Gases Bali Gelar Lomba Bintang Bapang Barong dan Rangda se-Bali",
                date: "2024-12-09",
                content: "Yayasan Gases Bali menggelar Lomba Bintang Bapang Barong Ket dan Tari Rangda se-Bali untuk melestarikan seni budaya Bali, Jumat (6/3), di Dharma Negara Alaya, Denpasar... Dalam lomba tersebut, para peserta menampilkan pertunjukan seni budaya Bali yang menggambarkan kekuatan dan keberagaman tradisi yang ada di Bali. Lomba ini dihadiri oleh ribuan penonton dan diikuti oleh berbagai kelompok seni dari seluruh Bali."
            },
            {
                id: 2, // ID unik untuk artikel
                cover: "/img/Artikel/artikel2.png",
                title: "Keunikan Kebudayaan Masyarakat di Bali",
                date: "2024-12-08",
                content: "Bali, yang dikenal sebagai Pulau Dewata, resmi menjadi provinsi pada tahun 1958 dengan Denpasar sebagai ibu kota sejak 1960. Bali memiliki kebudayaan yang kaya, mulai dari upacara adat, tarian tradisional, hingga seni lukis dan ukiran. Keunikan kebudayaan Bali membuatnya terkenal di seluruh dunia sebagai destinasi wisata budaya."
            },
            {
                id: 3, // ID unik untuk artikel
                cover: "/img/Artikel/artikel3.png",
                title: "Makna Hari Valentine Berdasarkan Perspektif Tri Hita Karana",
                date: "2023-02-13",
                content: "Hari Valentine, yang dirayakan setiap 14 Februari, dikenal sebagai hari kasih sayang, di mana orang-orang menunjukkan cinta kepada yang tersayang. Namun, jika dilihat dari perspektif Tri Hita Karana, filosofi hidup yang berasal dari Bali, Hari Valentine bukan hanya tentang cinta antar sesama manusia, tetapi juga tentang hubungan manusia dengan Tuhan dan alam semesta. Konsep ini mengajarkan untuk menjaga keseimbangan dalam kehidupan."
            }
        ];

        // Fungsi untuk menampilkan artikel di halaman
        function displayArticles() {
            const articleList = document.getElementById('article-list');
            articleList.innerHTML = ''; // Clear the list first
            articles.forEach(article => {
                const articleElement = document.createElement('article');
                articleElement.classList.add('flex', 'flex-col', 'md:flex-row', 'items-start', 'md:items-center', 'p-6', 'mb-6');
                articleElement.setAttribute('id', `article-${article.id}`); // Menambahkan ID ke elemen

                articleElement.innerHTML = `
                    <img alt="Gambar Artikel" class="w-full md:w-1/3 mb-4 md:mb-0 md:mr-6 transition-transform duration-300 hover:scale-105" height="400" src="${article.cover}" width="400" />
                    <div class="md:w-2/3">
                        <h2 class="text-gray-800 text-4xl font-semibold mb-4">${article.title}</h2>
                        <p class="text-gray-600 mb-4">Tanggal Rilis: ${article.date}</p>
                        <p class="text-gray-800 mb-4 text-justify text-xl">${article.content}</p>
                        <div class="flex space-x-4">
                            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600" onclick="editArticle(${article.id})">Perbarui</button>
                            <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600" onclick="deleteArticle(${article.id})">Hapus</button>
                        </div>
                    </div>
                `;
                articleList.appendChild(articleElement);
            });
        }

        // Fungsi untuk menampilkan form saat tombol tambah artikel diklik
        document.getElementById('add-article-btn').addEventListener('click', function () {
            document.getElementById('add-article-form').classList.remove('hidden');
        });

        // Fungsi untuk menambahkan artikel baru
        function addArticle() {
            const title = document.getElementById('article-title').value;
            const date = document.getElementById('article-date').value;
            const content = document.getElementById('article-description').value;

            // ID unik untuk artikel baru
            const newArticle = {
                id: articles.length + 1,
                cover: "/img/Artikel/cover.png", // Placeholder cover image
                title: title,
                date: date,
                content: content
            };

            // Menambahkan artikel baru ke dalam array
            articles.push(newArticle);

            // Menyembunyikan form dan memperbarui daftar artikel
            cancelAddArticle();
            displayArticles();
        }

        // Fungsi untuk membatalkan penambahan artikel
        function cancelAddArticle() {
            document.getElementById('add-article-form').classList.add('hidden');
        }

        // Fungsi untuk memilih artikel yang ingin diedit
        function editArticle(id) {
            const article = articles.find(a => a.id === id);
            document.getElementById('edit-article-title').value = article.title;
            document.getElementById('edit-article-date').value = article.date;
            document.getElementById('edit-article-description').value = article.content;

            // Menyembunyikan form tambah artikel dan menampilkan form edit artikel
            document.getElementById('add-article-form').classList.add('hidden');
            document.getElementById('edit-article-form').classList.remove('hidden');
            document.getElementById('edit-article-form').setAttribute('data-id', id);
        }

        // Fungsi untuk memperbarui artikel
        function updateArticle() {
            const id = parseInt(document.getElementById('edit-article-form').getAttribute('data-id'));
            const title = document.getElementById('edit-article-title').value;
            const date = document.getElementById('edit-article-date').value;
            const content = document.getElementById('edit-article-description').value;

            // Memperbarui artikel dalam array
            const article = articles.find(a => a.id === id);
            article.title = title;
            article.date = date;
            article.content = content;

            // Menyembunyikan form dan memperbarui daftar artikel
            cancelEditArticle();
            displayArticles();
        }

        // Fungsi untuk membatalkan pengeditan artikel
        function cancelEditArticle() {
            document.getElementById('edit-article-form').classList.add('hidden');
        }

        // Fungsi untuk menghapus artikel
        function deleteArticle(id) {
            const index = articles.findIndex(a => a.id === id);
            if (index !== -1) {
                articles.splice(index, 1);
                displayArticles();
            }
        }

        // Menampilkan artikel saat halaman pertama kali dimuat
        window.onload = displayArticles;
    </script>
</body>

</html>
