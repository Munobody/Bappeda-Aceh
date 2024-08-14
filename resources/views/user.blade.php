<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAPPEDA Aceh Kantor</title>
    <link rel="icon" href="{{ asset('images/pancacita.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 100%;
            max-width: 800px;
            height: 600px;
            margin: 0 auto;
            margin-bottom: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 10px;
            background: #fff;
            padding: 20px;
            opacity: 0;
            transform: scale(0.9);
            animation: fadeInScale 1s forwards;
        }

        @keyframes fadeInScale {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        canvas {
            display: block;
        }

        .type-table {
            border-collapse: collapse;
            width: 100%;
            opacity: 0;
            transform: translateY(20px);
            animation: fadeInUp 1s forwards;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .type-table th, .type-table td {
            border: 1px solid #ddd;
            padding: 8px;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .type-table th {
            background-color: #f2f2f2;
            text-align: left;
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.1);
        }

        .type-table tr:nth-child(even) {
            background: linear-gradient(to bottom, #f9f9f9, #ffffff);
        }

        .type-table tr:hover {
            background-color: rgba(0, 123, 255, 0.2);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .type-table-container {
            margin-top: 20px;
            display: none;
            overflow-x: auto;
        }

        .back-button {
            margin-top: 30px;
            display: block;
            text-align: center;
        }

        .btn-back {
            background-color: #0f766e;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #2dd4bf;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .chart-legend {
            margin-top: 20px;
            text-align: center;
        }

        .chart-legend p {
            margin: 10px 0;
        }

        .chart-legend span {
            font-weight: bold;
        }
        
        .search-container {
            margin-bottom: 20px;
        }

        .search-input {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
        }

        .search-results {
            margin-top: 20px;
            display: none;
        }

        .glow {
            top: -10%;
            left: -10%;
            width: 120%;
            height: 120%;
            border-radius: 100%;
        }

        .glow-1 {
            animation: glow1 4s linear infinite;
        }

        .glow-2 {
            animation: glow2 4s linear infinite;
            animation-delay: 100ms;
        }

        .glow-3 {
            animation: glow3 4s linear infinite;
            animation-delay: 200ms;
        }

        .glow-4 {
            animation: glow4 4s linear infinite;
            animation-delay: 300ms;
        }

        @keyframes glow1 {
            0% { transform: translate(10%, 10%) scale(1); }
            25% { transform: translate(-10%, 10%) scale(1); }
            50% { transform: translate(-10%, -10%) scale(1); }
            75% { transform: translate(10%, -10%) scale(1); }
            100% { transform: translate(10%, 10%) scale(1); }
        }

        @keyframes glow2 {
            0% { transform: translate(-10%, 10%) scale(1); }
            25% { transform: translate(-10%, -10%) scale(1); }
            50% { transform: translate(10%, -10%) scale(1); }
            75% { transform: translate(10%, 10%) scale(1); }
            100% { transform: translate(-10%, 10%) scale(1); }
        }

        @keyframes glow3 {
            0% { transform: translate(-10%, -10%) scale(1); }
            25% { transform: translate(10%, -10%) scale(1); }
            50% { transform: translate(10%, 10%) scale(1); }
            75% { transform: translate(-10%, 10%) scale(1); }
            100% { transform: translate(-10%, -10%) scale(1); }
        }

        @keyframes glow4 {
            0% { transform: translate(10%, -10%) scale(1); }
            25% { transform: translate(10%, 10%) scale(1); }
            50% { transform: translate(-10%, 10%) scale(1); }
            75% { transform: translate(-10%, -10%) scale(1); }
            100% { transform: translate(10%, -10%) scale(1); }
        }

        @media (max-width: 640px) {
            .chart-container {
                height: 400px;
            }
        }
    </style>
</head>
<body class="bg-gray-100">
    @include('components/navbar')

    <div class="container mx-auto py-8 px-4 sm:px-6 lg:px-8 mt-40">
        <h2 class="text-3xl sm:text-4xl font-bold text-green-800 text-center">BAPPEDA ACEH </h2>
        <h2 class="text-3xl sm:text-4xl font-bold text-green-800 text-center">Data Peminjaman Barang Pegawai</h2>
        

        <div class="flex flex-col justify-center mb-2">
            <div class="relative p-4 sm:p-12 w-full sm:max-w-2xl mx-auto">
            <h2 class="text-xl sm:text-xl font-bold text-green-800 text-center">Search Here</h2>
                <div class="overflow-hidden z-0 rounded-full relative p-3">
                    <form role="form" class="relative flex z-50 bg-white rounded-full">
                        <input type="text" id="searchInput" placeholder="Masukkan pencarian Anda di sini" class="rounded-full flex-1 px-6 py-4 text-gray-700 focus:outline-none">
                        <button type="button" id="searchButton" class="bg-green-800 text-white rounded-full font-semibold px-8 py-4 hover:bg-green-400 focus:bg-indigo-600 focus:outline-none">Cari</button>
                    </form>
                    <div class="glow glow-1 z-10 bg-teal-800 absolute"></div>
                    <div class="glow glow-2 z-20 bg-emerald-400 absolute"></div>
                    <div class="glow glow-3 z-30 bg-emerald-600 absolute"></div>
                    <div class="glow glow-4 z-40 bg-teal-500 absolute"></div>
                </div>
            </div>
        </div>

        <div class="search-results">
            <h3 class="text-xl font-semibold mb-4">Hasil Pencarian:</h3>
            <div class="overflow-x-auto">
                <table class="type-table w-full" id="searchResultsTable">
                    <thead>
                        <tr>
                            <th>Sub Kategori</th>
                            <th>Nama Barang</th>
                            <th>Merek/Tipe</th>
                            <th>Pengguna</th>
                            <th>Bidang</th>
                        </tr>
                    </thead>
                    <tbody id="searchResultsBody">
                        <!-- Rows will be inserted dynamically here -->
                    </tbody>
                </table>
            </div>
        </div>

        <div class="chart-container mt-12">
            <canvas id="myChart"></canvas>
        </div>
        <div class="chart-legend">
            <p>Jumlah Keseluruhan Data: <span id="totalDataCount"></span></p>
        </div>
        <div class="mt-12">
            <h3 class="text-xl font-semibold text-center mb-4">Keterangan Barang</h3>
            <div class="type-table-container" id="typeTableContainer">
                <table class="type-table" id="typeTable">
                    <thead>
                        <tr>
                            <th>Kategori</th>
                            <th>Sub Kategori</th>
                            <th>Nama Barang</th>
                            <th>Merek/Tipe</th>
                            <th>Pengguna</th>
                            <th>Bidang</th>
                        </tr>
                    </thead>
                    <tbody id="typeTableBody">
                        <!-- Rows will be inserted dynamically here -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="back-button">
            <a href="/" class="btn-back bg-emerald-600">Kembali</a>
        </div>

        <!-- Modal Password -->
        <div id="passwordModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 max-w-md mx-auto">
                <h2 class="text-xl font-bold mb-4">Masukkan Password</h2>
                <input type="password" id="passwordInput" class="border border-gray-300 rounded w-full p-2 mb-4" placeholder="Password">
                <div class="flex justify-end">
                    <button id="cancelButton" class="bg-gray-300 text-gray-800 py-2 px-4 rounded mr-2">Batal</button>
                    <button id="submitPasswordButton" class="bg-blue-600 text-white py-2 px-4 rounded">Submit</button>
                </div>
            </div>
        </div>
    </div>
    @include('components/footer')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var data = @json($processedData);
        var correctPassword = 'Bappeda';
        var isAuthenticated = false;

        var labels = Object.keys(data);
        var totals = labels.map(function(key) {
            return data[key].count;
        });

        var paletteColors = [
            'rgba(255, 99, 132, 0.6)',
            'rgba(54, 162, 235, 0.6)',
            'rgba(255, 206, 86, 0.6)',
            'rgba(75, 192, 192, 0.6)',
            'rgba(153, 102, 255, 0.6)',
            'rgba(255, 159, 64, 0.6)'
        ];

        var ctx = document.getElementById('myChart').getContext('2d');
        var totalItems = totals.reduce(function(a, b) { return a + b; }, 0);

        var myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Barang',
                    data: totals,
                    backgroundColor: paletteColors,
                    borderColor: paletteColors,
                    borderWidth: 1,
                    hoverOffset: 4
                }],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                var value = context.raw || 0;
                                var percentage = ((value / totalItems) * 100).toFixed(2);
                                return label + ': ' + value + ' (' + percentage + '%)';
                            }
                        }
                    }
                },
                layout: {
                    padding: {
                        bottom: 30
                    }
                },
                elements: {
                    arc: {
                        borderWidth: 1,
                        borderColor: 'rgba(255, 255, 255, 0.8)'
                    }
                },
                onClick: function(evt, activeElements) {
                    if (!isAuthenticated) {
                        var passwordModal = document.getElementById('passwordModal');
                        passwordModal.classList.remove('hidden');

                        document.getElementById('submitPasswordButton').onclick = function() {
                            var enteredPassword = document.getElementById('passwordInput').value;
                            if (enteredPassword === correctPassword) {
                                isAuthenticated = true;
                                passwordModal.classList.add('hidden');
                                showTableData(activeElements);
                            } else {
                                alert('Password salah! Silakan coba lagi.');
                            }
                        };

                        document.getElementById('cancelButton').onclick = function() {
                            passwordModal.classList.add('hidden');
                        };
                    } else {
                        showTableData(activeElements);
                    }
                }
            }
        });  

        function populateTable() {
            var typeTableBody = document.getElementById('typeTableBody');
            typeTableBody.innerHTML = '';
            labels.forEach(function(key) {
                data[key].details.forEach(function(detail) {
                    var row = document.createElement('tr');
                    row.innerHTML = `
                        <td>${key}</td>
                        <td>${detail['Sub Kategori']}</td>
                        <td>${detail['Nama Barang']}</td>
                        <td>${detail['Merek/Tipe']}</td>
                        <td>${detail['Pengguna']}</td>
                        <td>${detail['Bidang']}</td>
                    `;
                    typeTableBody.appendChild(row);
                });
            });
        }

        populateTable();

        var searchInput = document.getElementById('searchInput');
        var searchButton = document.getElementById('searchButton');
        var searchResultsBody = document.getElementById('searchResultsBody');
        var searchResults = document.querySelector('.search-results');

        searchButton.addEventListener('click', performSearch);
        searchInput.addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                performSearch();
            }
        });

        function performSearch() {
            var searchTerm = searchInput.value.trim();
            if (searchTerm === '') {
                searchResults.style.display = 'none';
                return;
            }

            fetch('{{ route('user.search') }}?searchTerm=' + encodeURIComponent(searchTerm))
                .then(response => response.json())
                .then(data => {
                    searchResultsBody.innerHTML = '';
                    if (data.results.length > 0) {
                        data.results.forEach(result => {
                            var row = document.createElement('tr');
                            row.innerHTML = `
                                <td>${result['Sub Kategori']}</td>
                                <td>${result['Nama Barang']}</td>
                                <td>${result['Merek/Tipe']}</td>
                                <td>${result['Pengguna']}</td>
                                <td>${result['Bidang']}</td>
                            `;
                            searchResultsBody.appendChild(row);
                        });
                        searchResults.style.display = 'block';
                    } else {
                        searchResults.style.display = 'none';
                        alert('Tidak ada hasil yang ditemukan untuk pencarian ini.');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan saat melakukan pencarian. Silakan coba lagi.');
                });
        }

        function showTableData(activeElements) {
            if (activeElements.length > 0) {
                var chartElement = activeElements[0];
                var category = labels[chartElement.index];
                showCategoryDetails(category);
            }
        }

        function showCategoryDetails(category) {
            var details = data[category].details;
            var typeTableBody = document.getElementById('typeTableBody');

            typeTableBody.innerHTML = '';

            details.forEach(function(detail) {
                var row = document.createElement('tr');
                row.innerHTML = `
                    <td>${category}</td>
                    <td>${detail['Sub Kategori']}</td>
                    <td>${detail['Nama Barang']}</td>
                    <td>${detail['Merek/Tipe']}</td>
                    <td>${detail['Pengguna']}</td>
                    <td>${detail['Bidang']}</td>
                `;
                typeTableBody.appendChild(row);
            });

            var typeTableContainer = document.getElementById('typeTableContainer');
            typeTableContainer.style.display = 'block';
        }

        document.getElementById('totalDataCount').textContent = totalItems;

        function updateLegend() {
            var legend = document.querySelector('.chart-legend');
            legend.innerHTML = '<p>Jumlah Keseluruhan Data: <span id="totalDataCount">' + totalItems + '</span></p>';

            labels.forEach(function(label, index) {
                var value = totals[index];
                var percentage = ((value / totalItems) * 100).toFixed(2);
                var item = document.createElement('p');
                item.textContent = label + ': ' + value + ' (' + percentage + '%)';
                legend.appendChild(item);
            });
        }

        updateLegend();
    });
    </script>
</body>
</html>