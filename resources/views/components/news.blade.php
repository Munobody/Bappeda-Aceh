<div class="container mx-auto text-center py-16" id="news-section">
    <h2 class="text-2xl font-bold text-green-800 mb-4">Berita Terkini</h2>
    <div class="overflow-x-auto" style="margin-left: 100px; margin-right: 100px; margin-bottom: 100px;" id="news-container">
        <!-- Artikel berita akan dimasukkan secara dinamis di sini -->
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Fungsi untuk mengambil dan memperbarui berita
        function updateNews() {
            fetch('https://bappeda.acehprov.go.id/berita') // Pastikan URL ini mengarah ke endpoint API yang benar
                .then(response => response.json())
                .then(data => {
                    const newsContainer = document.getElementById('news-container');
                    newsContainer.innerHTML = ''; // Kosongkan kontainer sebelum memuat berita baru

                    data.forEach(news => {
                        const newsItem = document.createElement('div');
                        newsItem.classList.add('news-item', 'mb-8', 'flex', 'justify-center', 'items-center', 'gap-4');

                        newsItem.innerHTML = `
                            <img src="${news.imageUrl}" alt="News Image" class="w-32 h-32 object-cover rounded-lg shadow-lg">
                            <div>
                                <h3 class="text-xl font-bold text-gray-700">${news.title}</h3>
                                <p class="text-gray-600">${news.description}</p>
                                <a href="${news.link}" target="_blank" class="text-blue-500 underline">Baca selengkapnya</a>
                            </div>
                        `;

                        newsContainer.appendChild(newsItem);
                    });
                })
                .catch(error => console.error('Error fetching news:', error));
        }

        // Perbarui berita setiap 5 menit
        setInterval(updateNews, 300000); // 300000 ms = 5 menit

        // Pembaruan berita awal
        updateNews();
    });
</script>
