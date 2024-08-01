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
            max-width: 900px;
            height: 600px;
            margin: 0 auto;
            margin-bottom: 20px;
        }

        body {
            background: linear-gradient(90deg, #fff 0%, #fff 100%);
            background-size: 400% 400%;
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
        <h2 class="text-2xl font-bold text-green-800 mb-4 text-center">BAPPEDA ACEH - Vehicle Data Visualization</h2>
        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>
        <div class="mt-12">
            <h3 class="text-xl font-semibold text-center">Keterangan Type</h3>
            <div class="type-table-container" id="typeTableContainer">
                <table class="type-table" id="typeTable">
                    <thead>
                        <tr>
                            <th>No Polisi</th>
                            <th>Tahun Pembuatan</th>
                            <th>Type</th>
                            <th>Jumlah</th>
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
    </div>

    <div class="flex items-center justify-center min-h-screen">
    <div class="flex flex-col items-center space-y-6">
      <img src="{{ asset('images/visdat.jpeg') }}" alt="Example Image" class="shadow-lg rounded-lg w-180 h-auto mt-20">
      <img src="{{ asset('images/visdat1.jpeg') }}" alt="Example Image" class="shadow-lg rounded-lg w-150 h-auto">
    </div>
  </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var data = @json($processedData); // Pass the processed data to the view

            // Prepare the labels and datasets for the chart
            var labels = data.map(function(item) {
                return item.merk; 
            });

            // Calculate the total number of vehicles per merk
            var merkTotals = data.map(function(item) {
                return Object.values(item.types).reduce((a, b) => a + b.length, 0);
            });

            // Generate random colors for each merk
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
                        label: 'Total Kendaraan',
                        data: merkTotals,
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
                        borderWidth: 3, // Increase border width for better 3D effect
                        backgroundColor: labels.map((_, index) => {
                            var gradient = ctx.createLinearGradient(0, 0, 0, 400);
                            gradient.addColorStop(0, backgroundColors[index]);
                            gradient.addColorStop(1, 'rgba(0, 0, 0, 0.1)');
                            return gradient;
                        }),
                    }],
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Jumlah Total Kendaraan per Merk'
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                stepSize: 1
                            }
                        }
                    },
                    animation: {
                        duration: 2000, // Duration of the animation in milliseconds
                        easing: 'easeOutElastic', // Easing function for the animation
                        onComplete: function() {
                            console.log('Chart animation complete');
                        }
                    },
                    onClick: function(evt, activeElements) {
                        var typeTableContainer = document.getElementById('typeTableContainer');
                        var typeTableBody = document.getElementById('typeTableBody');
                        typeTableBody.innerHTML = ''; // Clear existing rows

                        if (activeElements.length > 0) {
                            var index = activeElements[0].index;
                            var selectedMerk = labels[index];
                            var selectedData = data.find(item => item.merk === selectedMerk);

                            // Display the type table
                            typeTableContainer.style.display = 'block';

                            // Populate the type table
                            Object.keys(selectedData.types).forEach(function(type) {
                                selectedData.types[type].forEach(function(detail) {
                                    var row = document.createElement('tr');
                                    var noPolisiCell = document.createElement('td');
                                    var tahunPembuatanCell = document.createElement('td');
                                    var typeCell = document.createElement('td');
                                    var countCell = document.createElement('td');

                                    noPolisiCell.textContent = detail.no_polisi;
                                    tahunPembuatanCell.textContent = detail.tahun_pembuatan;
                                    typeCell.textContent = type;
                                    countCell.textContent = '1'; // Each detail represents one vehicle

                                    row.appendChild(noPolisiCell);
                                    row.appendChild(tahunPembuatanCell);
                                    row.appendChild(typeCell);
                                    row.appendChild(countCell);

                                    typeTableBody.appendChild(row);
                                });
                            });
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
