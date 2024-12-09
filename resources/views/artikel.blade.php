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

    <!-- Main Content -->
    <main class="container mx-auto py-8 px-6 mt-20"> <!-- Tambahkan margin atas -->
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
                content: "Yayasan Gases Bali menggelar Lomba Bintang Bapang Barong Ket dan Tari Rangda se-Bali untuk melestarikan seni budaya Bali, Jumat (6/3), di Dharma Negara Alaya, Denpasar. Kegiatan yang diikuti 9 penari Bapang Barong dan 11 penari Rangda ini dibuka oleh Kadis Kebudayaan Denpasar, IGN Bagus Mataram, mewakili Walikota Denpasar. Ketua Panitia, Komang Indra Wirawan, menjelaskan bahwa acara ini juga memperingati Hari Jadi ke-3 Yayasan Gases Bali dan mengenang alm. Mangku Wayan Candra. Tujuannya adalah memberikan edukasi tentang pakem dan tradisi seni Barong dan Rangda kepada generasi muda. Penilaian lomba meliputi Wiraga, Wirasa, dan Wirama, dengan harapan seniman mampu tampil di panggung lomba maupun saat ngayah. Walikota Denpasar, melalui sambutannya, mengapresiasi acara ini sebagai langkah pelestarian seni budaya Bali dan mendorong keberlanjutan kegiatan serupa untuk menguatkan jati diri seni budaya Bali."
            },
            {
                id: 2, // ID unik untuk artikel
                cover: "/img/Artikel/artikel2.png",
                title: "Keunikan Kebudayaan Masyarakat di Bali",
                date: "2024-12-08",
                content: "Bali, yang dikenal sebagai Pulau Dewata, resmi menjadi provinsi pada tahun 1958 dengan Denpasar sebagai ibu kota sejak 1960. Bali terkenal sebagai destinasi wisata dunia karena keindahan alam, pantai, dan desa asri, serta kekayaan budaya, seni, dan tradisi. Beberapa tradisi unik Bali meliputi Omed-Omedan, ritual ciuman pemuda-pemudi di Banjar Kaja Sesetan yang dilakukan sehari setelah Nyepi; Mekepung, balap kerbau di Jembrana yang diadakan pada bulan Juli-November; serta penggunaan nama depan seperti Wayan, Made, Nyoman, dan Ketut yang menunjukkan urutan kelahiran dalam keluarga. Selain itu, ada Perang Pandan, tradisi menghormati Dewa Indra di Desa Tenganan dengan menggunakan daun pandan berduri sebagai senjata, dan Mekotek, upacara di Desa Munggu untuk menolak bala yang dilakukan setiap Hari Raya Kuningan dengan pawai kayu berbentuk kerucut. Tradisi dan budaya ini memperkaya daya tarik Bali di mata dunia."
            },
            {
                id: 3, // ID unik untuk artikel
                cover: "/img/Artikel/artikel3.png",
                title: "Makna Hari Valentine Berdasarkan Perspektif Tri Hita Karana",
                date: "2023-02-13",
                content: "Hari Valentine, yang dirayakan setiap 14 Februari, dikenal sebagai hari kasih sayang, di mana orang-orang menunjukkan cinta kepada yang tersayang, sering kali melalui pemberian bunga, cokelat, atau hadiah lainnya. Namun, makna Valentine seharusnya lebih dari sekadar pemberian hadiah. Dalam budaya Bali, konsep Tri Hita Karana mengajarkan pentingnya keharmonisan antara manusia dengan Tuhan (Parhyangan), sesama manusia (Pawongan), dan alam (Palemahan). Pada Valentine, aspek Pawongan sangat relevan karena menekankan hubungan harmonis dengan orang lain. Makna harmonis di Hari Valentine mencakup lebih dari sekadar pemberian barang; ia mengajarkan pentingnya memperbaiki hubungan, saling meminta maaf, dan meningkatkan kualitas diri. Pemberian hanyalah simbol sementara, sementara kebahagiaan sejati berasal dari hubungan yang harmonis dan saling pengertian. Valentine seharusnya menjadi momen refleksi, bukan hanya soal hadiah. Apa makna Valentine bagi kamu?"
            }
        ];


        // Fungsi untuk menampilkan artikel di halaman
        function displayArticles() {
            const articleList = document.getElementById('article-list');
            articles.forEach(article => {
                const articleElement = document.createElement('article');
                articleElement.classList.add('flex', 'flex-col', 'md:flex-row', 'items-start', 'md:items-center',
                    'p-6', 'mb-6');
                articleElement.setAttribute('id', `article-${article.id}`); // Menambahkan ID ke elemen

                articleElement.innerHTML = `
      <img alt="Gambar Artikel" class="w-full md:w-1/3 mb-4 md:mb-0 md:mr-6 transition-transform duration-300 hover:scale-105" height="400" src="${article.cover}" width="400" />
      <div class="md:w-2/3">
        <h2 class="text-gray-800 text-4xl font-semibold mb-4">${article.title}</h2>
        <p class="text-gray-600 mb-4">Tanggal Rilis: ${article.date}</p>
        <p class="text-gray-800 mb-4 text-justify text-xl">${article.content}</p>
      </div>
    `;

                articleList.appendChild(articleElement);
            });
        }


        // Menjalankan fungsi untuk menampilkan artikel saat halaman dimuat
        displayArticles();
    </script>
</body>

</html>
