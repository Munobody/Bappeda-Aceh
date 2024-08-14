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
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <style>
        /* Styles remain the same */
        .chart-container {
            width: 100%;
            max-width: 900px;
            height: 600px;
            margin: 0 auto;
            margin-bottom: 20px;
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
            background-color: rgba(0, 123, 255, 0.1);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        .type-table-container {
            display: none;
            margin-top: 20px;
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
            transform: scale(1.1);
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
        }

        .chart-legend {
    margin: 10px 0; /* Adjust the margin as needed */
    text-align: center;
}

.legend-item {
    display: inline-block;
    margin: 5px;
    padding: 5px;
    border-radius: 5px;
    background-color: #f4f4f4;
}
    </style>
</head>
<body>
    @include('components/navbar')

    <div class="container mx-auto py-16">
        <h2 class="text-2xl font-bold text-green-800 mb-4 text-center">BAPPEDA ACEH - Vehicle Data Visualization</h2>
        
        <!-- Chart -->
        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>

      <!-- Add this block below your chart container in the second snippet -->
<div class="chart-legend">
    <h3 class="text-xl font-semibold mb-2">Keterangan Data:</h3>
    <div id="legendContainer"></div>
    <h1 class="font-bold text-xl text-emerald-800 mt-2">Jumlah Keseluruhan Data: <span id="totalDataCount"></span></h1>
</div>

        
        <!-- Data Table -->
        <div class="mt-12">
    <div class="type-table-container bg-green-400 rounded-lg overflow-x-auto" id="typeTableContainer">
        <table class="type-table bg-green-500 text-black w-full border-collapse rounded-lg shadow-md transition-transform duration-500 ease-in-out transform hover:scale-105" id="typeTable">
            <thead class="bg-green-600">
                <tr class="bg-green-800">
                    <th class="p-3 border-b">Kategori</th>
                    <th class="p-3 border-b">Merek</th>
                    <th class="p-3 border-b">Tipe</th>
                    <th class="p-3 border-b">Sub Kategori</th>
                    <th class="p-3 border-b">Nama Barang</th>
                </tr>
            </thead>
            <tbody class="bg-green-200" id="typeTableBody">
                <!-- Rows will be dynamically inserted here -->
            </tbody>
        </table>
    </div>  
  </div>
        <div class="back-button">
            <a href="/" class="btn-back">Back</a>
        </div>
    </div>
</div>

    

    <!-- Modal Password -->
    <div id="passwordModal" class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-lg p-6 max-w-md mx-auto">
            <h2 class="text-xl font-bold mb-4">Masukkan Password</h2>
            <input type="password" id="passwordInput" class="border border-gray-300 rounded w-full p-2 mb-4" placeholder="Password">
            <div class="flex justify-end">
                <button id="cancelButton" class="bg-[#508C9B] text-white py-2 px-4 rounded mr-2">Batal</button>
                <button id="submitPasswordButton" class="bg-[#134B70] text-white py-2 px-4 rounded">Submit</button>
            </div>
        </div>
    </div>
    @include('components/footer')
    <script>
document.addEventListener('DOMContentLoaded', function() {
    var data = @json($processedData); // Pass the processed data to the view
    var correctPassword = 'Bappeda'; // Ganti dengan password yang sesuai
    var isAuthenticated = false; // Flag untuk memastikan apakah user sudah mengautentikasi

    // Group data by kategori and then by merek
    var categories = {};

    data.forEach(function(item) {
        if (!categories[item.kategori]) {
            categories[item.kategori] = {};
        }

        if (!categories[item.kategori][item.merek]) {
            categories[item.kategori][item.merek] = [];
        }
        categories[item.kategori][item.merek].push(item); // Store details under each brand
    });

    var allMerekLabels = [];
    var datasets = [];
    var categoryColors = getDistinctColors(Object.keys(categories).length);
    var merekColors = getDistinctColors(getTotalUniqueMerekCount(data));
    var totalDataCount = data.length;

    Object.keys(categories).forEach(function(category, categoryIndex) {
        var brands = Object.keys(categories[category]);
        var brandTotals = brands.map(function(brand) {
            return categories[category][brand].length;
        });

        datasets.push({
            label: category,
            data: brandTotals,
            backgroundColor: brands.map((brand, brandIndex) => merekColors[brandIndex]),
            borderColor: '#000',
            borderWidth: 1
        });

        allMerekLabels = [...new Set([...allMerekLabels, ...brands])];
    });

    var ctx = document.getElementById('myChart').getContext('2d');

    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: allMerekLabels,
            datasets: datasets,
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            animation: {
                duration: 1000,
                easing: 'easeInOutBounce'
            },
            plugins: {
                datalabels: {
                    formatter: function(value, context) {
                        var total = context.chart._metasets[0].total;
                        var percentage = ((value / total) * 100).toFixed(2) + '%';
                        return percentage;
                    },
                    color: '#fff',
                    font: {
                        weight: 'bold'
                    },
                    align: 'center',
                    anchor: 'center'
                },
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        generateLabels: function(chart) {
                            var data = chart.data;
                            return data.labels.map(function(label, i) {
                                var meta = chart.getDatasetMeta(0);
                                var total = meta.total;
                                var count = data.datasets[0].data[i];
                                var percentage = ((count / total) * 100).toFixed(2) + '%';
                                return {
                                    text: `${label}: ${count} (${percentage})`,
                                    fillStyle: data.datasets[0].backgroundColor[i],
                                    strokeStyle: data.datasets[0].borderColor,
                                    lineWidth: data.datasets[0].borderWidth
                                };
                            });
                        }
                    }
                }
            },
            elements: {
                arc: {
                    borderWidth: 2,
                    hoverBorderColor: '#333',
                    hoverBorderWidth: 4,
                    hoverRadius: 10 // Adjust hover radius for better visibility
                }
            },
            interaction: {
                mode: 'nearest',
                intersect: false
            },
            tooltips: {
                callbacks: {
                    label: function(tooltipItem, data) {
                        var dataset = data.datasets[tooltipItem.datasetIndex];
                        var label = data.labels[tooltipItem.index];
                        var value = dataset.data[tooltipItem.index];
                        return `${label}: ${value}`;
                    }
                }
            }
        }
    });
// Generate legend items
var legendContainer = document.getElementById('legendContainer');
    var allLabels = allMerekLabels; // Assuming labels are the same as legend items
    var allData = datasets[0].data; // Assuming first dataset contains the data for legend
    var backgroundColors = datasets[0].backgroundColor;

    allLabels.forEach(function(label, index) {
        var total = allData[index];
        var percentage = ((total / totalDataCount) * 100).toFixed(2);
        var item = document.createElement('div');
        item.className = 'legend-item';
        item.innerHTML = `<span style="background-color: ${backgroundColors[index]}; padding: 5px; border-radius: 5px; display: inline-block; width: 15px; height: 15px; margin-right: 5px;"></span> ${label}: ${total} (${percentage}%)`;
        legendContainer.appendChild(item);
    });

    document.getElementById('totalDataCount').textContent = totalDataCount;

    document.getElementById('myChart').addEventListener('click', function(evt) {
        var activePoints = myChart.getElementsAtEventForMode(evt, 'nearest', { intersect: true }, false);

        if (activePoints.length > 0) {
            if (!isAuthenticated) {
                var modal = document.getElementById('passwordModal');
                modal.classList.remove('hidden');
            } else {
                // Show the table data
                showTableData(activePoints);
            }
        }
    });

    document.getElementById('submitPasswordButton').addEventListener('click', function() {
        var password = document.getElementById('passwordInput').value;

        if (password === correctPassword) {
            isAuthenticated = true; // Set flag to true
            var modal = document.getElementById('passwordModal');
            modal.classList.add('hidden');
            var activePoints = myChart.getActiveElements(); // Ambil elemen aktif saat ini

            if (activePoints.length > 0) {
                // Show the table data
                showTableData(activePoints);
            }
        } else {
            alert('Password salah. Silakan coba lagi.');
        }
    });

    document.getElementById('cancelButton').addEventListener('click', function() {
        var modal = document.getElementById('passwordModal');
        modal.classList.add('hidden');
    });

    function showTableData(activePoints) {
    var selectedCategory = activePoints[0].element.$context.dataset.label;
    var selectedBrand = myChart.data.labels[activePoints[0].index];
    var tableContainer = document.getElementById('typeTableContainer');
    var tableBody = document.getElementById('typeTableBody');
    tableBody.innerHTML = ''; // Clear existing rows

    // Add rows to table body
    categories[selectedCategory][selectedBrand].forEach(function(item) {
        var row = document.createElement('tr');

        var kategoriCell = document.createElement('td');
        var merekCell = document.createElement('td');
        var tipeCell = document.createElement('td');
        var subkategoriCell = document.createElement('td');
        var namabarangCell = document.createElement('td');

        kategoriCell.textContent = item.kategori || '-';
        merekCell.textContent = item.merek || '-';
        tipeCell.textContent = item.tipe || '-';
        subkategoriCell.textContent = item.subkategori || '-';
        namabarangCell.textContent = item.namabarang || '-';

        row.appendChild(kategoriCell);
        row.appendChild(merekCell);
        row.appendChild(tipeCell);
        row.appendChild(subkategoriCell);
        row.appendChild(namabarangCell);

        tableBody.appendChild(row);
    });

    // Display the table
    tableContainer.style.display = 'block';
}


    function getDistinctColors(count) {
        var colors = [];
        for (var i = 0; i < count; i++) {
            colors.push('hsl(' + (360 * i / count) + ', 100%, 50%)');
        }
        return colors;
    }

    function getTotalUniqueMerekCount(data) {
        var uniqueMereks = new Set(data.map(function(item) {
            return item.merek;
        }));
        return uniqueMereks.size;
    }
});
</script>
</body>
</html>
