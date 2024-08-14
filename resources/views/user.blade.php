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
            margin-bottom: 40px; /* Tambah jarak bawah */
            display: flex;
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
            border-radius: 10px; /* Optional: rounded corners */
            background: #fff; /* Optional: background color */
            padding: 20px; /* Optional: padding for better spacing */
            opacity: 0; /* Initially hidden */
            transform: scale(0.9); /* Slightly scaled down */
            animation: fadeInScale 1s forwards; /* Animation when appearing */
        }

        @keyframes fadeInScale {
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        canvas {
            display: block; /* Ensure the canvas takes full space of its container */
        }

        body {
            background-image: url('{{ asset('images/bg.jpg') }}'); /* Path to your background image */
            background-size: cover; /* Cover the entire page */
            background-position: center; /* Center the image */
            background-attachment: fixed; /* Fix the image in place */
            background-repeat: no-repeat; /* Prevent the image from repeating */
            animation: waveBackgroundAnimation 10s ease infinite;
        }

        @keyframes waveBackgroundAnimation {
            0% {
                background-position: 0% 50%;
            }
            50% {
                background-position: 100% 50%;
            }
            100% {
                background-position: 0% 50%;
            }
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
        }

        .back-button {
            margin-top: 30px;
            display: block;
            text-align: center;
        }

        .btn-back {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .chart-bar {
            transition: all 0.3s ease;
        }

        .chart-bar:hover {
            transform: scale(1.2); /* Increased scale for hover */
            box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.4); /* Increased shadow for hover */
        }

        .chart-bar:active {
            transform: scale(1.1); /* Slightly smaller scale for click */
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3); /* Shadow effect for click */
        }

        .chart-legend {
            margin-top: 20px; /* Tambah jarak atas untuk memberi jarak dari chart */
            text-align: center; /* Center align text */
        }

        .chart-legend p {
            margin: 10px 0; /* Jarak antar elemen dalam keterangan */
        }

        .chart-legend span {
            font-weight: bold; /* Agar teks persentase lebih menonjol */
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
        }

    </style>
</head>
<body>
    @include('components/navbar')

    <div class="container mx-auto py-32">
        <h2 class="text-4xl font-bold text-green-800 mb-4 text-center">BAPPEDA ACEH - Data Visualisasi Barang</h2>


        <div class="search-container">
            <input type="text" id="searchInput" class="search-input" placeholder="Cari pengguna...">
        </div>

        <div class="search-results">
            <h3 class="text-xl font-semibold">Hasil Pencarian:</h3>
            <table class="type-table" id="searchResultsTable">
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

        <div class="chart-container mt-20">
            <canvas id="myChart"></canvas>
        </div>
        <div class="chart-legend">
            <p>Jumlah Keseluruhan Data: <span id="totalDataCount"></span></p>
        </div>
        <div class="mt-12">
            <h3 class="text-xl font-semibold text-center">Keterangan Barang</h3>
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
            <a href="/" class="btn-back">Back</a>
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

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var data = @json($processedData);
        var correctPassword = 'Bappeda';
        var isAuthenticated = false;

        var labels = Object.keys(data);
        var totals = labels.map(function(key) {
            return data[key].count;
        });

        // Use solid colors instead of gradients
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
                position: 'bottom', // Letakkan legenda di bawah
                labels: {
                    padding: 20 // Jarak antara label dan chart
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
                bottom: 30 // Jarak antara chart dan legenda
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


        // Display Data Table
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

        // Search Feature
        var searchInput = document.getElementById('searchInput');
        var searchResultsBody = document.getElementById('searchResultsBody');

        searchInput.addEventListener('input', function() {
            var searchTerm = searchInput.value;
            fetch('{{ route('user.search') }}?searchTerm=' + encodeURIComponent(searchTerm))
                .then(response => response.json())
                .then(data => {
                    searchResultsBody.innerHTML = '';
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
                });
        });


        function showTableData(activeElements) {
            if (activeElements.length > 0) {
                var chartElement = activeElements[0];
                var category = chartElement.index;
                showCategoryDetails(labels[category]);
            }
        }

        function showCategoryDetails(category) {
    var details = data[category].details;
    var typeTableBody = document.getElementById('typeTableBody');

    typeTableBody.innerHTML = '';

    details.forEach(function(detail) {
        var row = document.createElement('tr');

        var kategoriCell = document.createElement('td');
        kategoriCell.textContent = category;
        row.appendChild(kategoriCell);

        var subKategoriCell = document.createElement('td');
        subKategoriCell.textContent = detail['Sub Kategori'];
        row.appendChild(subKategoriCell);

        var namaBarangCell = document.createElement('td');
        namaBarangCell.textContent = detail['Nama Barang'];
        row.appendChild(namaBarangCell);

        var merekTipeCell = document.createElement('td');
        merekTipeCell.textContent = detail['Merek/Tipe'];
        row.appendChild(merekTipeCell);

        var penggunaCell = document.createElement('td');
        penggunaCell.textContent = detail['Pengguna'];
        row.appendChild(penggunaCell);

        var bidangCell = document.createElement('td');
        bidangCell.textContent = detail['Bidang'];
        row.appendChild(bidangCell);

        typeTableBody.appendChild(row);
    });

    var typeTableContainer = document.getElementById('typeTableContainer');
    typeTableContainer.style.display = 'block';
}


        document.getElementById('totalDataCount').textContent = totalItems;

        // Update legend with percentages
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
