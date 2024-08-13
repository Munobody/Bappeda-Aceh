<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAPPEDA Aceh Dashboard</title>
    <link rel="icon" href="{{ asset('images/pancacita.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
    width: 100%;
    max-width: 1200px; /* Ubah max-width sesuai kebutuhan */
    height: 800px; /* Ubah height sesuai kebutuhan */
    margin: 0 auto;
    margin-bottom: 20px;
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Shadow for 3D effect */
        }

        .type-table th, .type-table td {
            border: 1px solid #ddd;
            padding: 8px;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .type-table th {
            background-color: #f2f2f2;
            text-align: left;
            box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.1); /* Inner shadow for header */
        }

        .type-table tr:nth-child(even) {
            background: linear-gradient(to bottom, #f9f9f9, #ffffff);
        }

        .type-table tr:hover {
            background-color: rgba(0, 123, 255, 0.1);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2); /* Shadow on hover */
        }

        .type-table-container {
            margin-top: 20px;
            display: none; /* Initially hidden */
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

        /* Custom styles for 3D effect */
        .chart-bar {
            transition: all 0.3s ease;
        }
        .chart-bar:hover {
            transform: scale(1.1); /* Slightly enlarge the bar on hover */
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3); /* Add shadow for 3D effect */
        }
    </style>
</head>
<body>
    @include('components/navbar')
    @include('components/messages')

    <div class="container mx-auto py-16">
        <h2 class="text-2xl font-bold text-green-800 mb-4 text-center">BAPPEDA ACEH - Data Visualisasi Barang</h2>
        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>
        <div class="mt-12">
            <h3 class="text-xl font-semibold text-center">Keterangan Barang</h3>
            <div class="type-table-container" id="typeTableContainer">
                <table class="type-table" id="typeTable">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Merk/Tipe</th>
                            <th>Tanggal Perolehan</th>
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
        var data = @json($processedData); // Pass the processed data to the view
        var correctPassword = 'Bappeda'; // Ganti dengan password yang sesuai
        var isAuthenticated = false; // Flag untuk memastikan apakah user sudah mengautentikasi

        console.log('Processed Data:', data); // Log data for debugging

        var labels = Object.keys(data);
        var totals = labels.map(function(key) {
            return data[key].count;
        });

        function getRandomColor() {
            var r = Math.floor(Math.random() * 256);
            var g = Math.floor(Math.random() * 256);
            var b = Math.floor(Math.random() * 256);
            return `rgba(${r}, ${g}, ${b}, 0.7)`;
        }

        var backgroundColors = labels.map(getRandomColor);
        var borderColors = backgroundColors.map(color => color.replace('0.7', '1'));

        var ctx = document.getElementById('myChart').getContext('2d');

        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Barang',
                    data: totals,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(context) {
                                var label = context.label || '';
                                var value = context.raw || 0;
                                return label + ': ' + value;
                            }
                        }
                    }
                },
                onClick: function(evt, activeElements) {
                    if (!isAuthenticated) {
                        // Show the password modal if not authenticated
                        var passwordModal = document.getElementById('passwordModal');
                        passwordModal.classList.remove('hidden');

                        // Handle password submission
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

                        // Handle cancel button
                        document.getElementById('cancelButton').onclick = function() {
                            passwordModal.classList.add('hidden');
                        };
                    } else {
                        showTableData(activeElements);
                    }
                }
            }
        });

        function showTableData(activeElements) {
            var typeTableContainer = document.getElementById('typeTableContainer');
            var typeTableBody = document.getElementById('typeTableBody');
            typeTableBody.innerHTML = ''; // Clear existing rows

            if (activeElements.length > 0) {
                var index = activeElements[0].index;
                var selectedBarang = labels[index];
                var selectedData = data[selectedBarang];

                // Display the type table
                typeTableContainer.style.display = 'block';

                // Populate the type table
                selectedData.details.forEach(function(detail) {
                    var row = document.createElement('tr');
                    var namaBarangCell = document.createElement('td');
                    var merkTipeCell = document.createElement('td');
                    var tanggalPerolehanCell = document.createElement('td');

                    namaBarangCell.textContent = selectedBarang;
                    merkTipeCell.textContent = detail['Merek/tipe'] || '-'; // Default to '-' if not found
                    tanggalPerolehanCell.textContent = detail['Tanggal Perolehan'] || '-'; // Default to '-' if not found

                    row.appendChild(namaBarangCell);
                    row.appendChild(merkTipeCell);
                    row.appendChild(tanggalPerolehanCell);

                    typeTableBody.appendChild(row);
                });
            }
        }
    });
    </script>
</body>
</html>
