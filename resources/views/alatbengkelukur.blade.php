<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAPPEDA Aceh Alat Bengkel & Ukur</title>
    <link rel="icon" href="{{ asset('images/pancacita.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    /* Default styling for other chart containers */
    .chart-container {
        width: 90%;
        /* Default width for other charts */
        max-width: 1200px;
        /* Max width for larger screens */
        height: 500px;
        /* Default height for other charts */
        margin: 0 auto;
        margin-bottom: 80px;
        /* Increased margin for spacing between charts */
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .chart-legend {
        margin: 20px 0;
        text-align: center;
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

    .type-table th,
    .type-table td {
        text-align: center;
        border: 1px solid #ddd;
        padding: 8px;
        transition: background-color 0.3s, box-shadow 0.3s;
    }

    .type-table th {
        background-color: #34d399;
        text-align: center;
        box-shadow: inset 0 -1px 0 rgba(0, 0, 0, 0.1);
    }

    .type-table tr:nth-child(even) {
        background: linear-gradient(to bottom, #ecfdf5, #ffffff);
    }

    .type-table tr:hover {
        background-color: #d1fae5;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    .type-table-container {
        margin-top: 40px;
        /* Increased margin for spacing above the table */
        display: none;
    }

    .back-button {
        margin-top: 40px;
        /* Increased margin for spacing above the button */
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

    .legend-item {
        display: inline-block;
        margin: 5px;
        padding: 5px;
        border-radius: 5px;
        background-color: #f4f4f4;
    }

    @media (max-width: 768px) {
        .chart-container {
            height: 300px;
            margin-bottom: 20px;
            /* Reduced margin for smaller screens */
        }

        .chart-legend {
            margin: 10px 0;
        }

        .type-table-container {
            margin-top: 20px;
            /* Reduced margin for smaller screens */
        }

        .back-button {
            margin-top: 20px;
            /* Reduced margin for smaller screens */
        }
    }
    </style>
</head>

<body>
    @include('components/navbar')

    <div class="container mx-auto py-16">
        <h2 class="text-2xl font-bold text-green-800 mb-4 text-center mt-12">BAPPEDA ACEH</h2>
        <h2 class="text-2xl font-bold text-green-800 mb-4 text-center">Data Visualisasi Alat Bengkel & Alat Ukur</h2>

        <!-- Tanggal Perolehan Chart -->
        <div class="chart-container">
            <h3 class="text-xl font-semibold mb-2">Distribusi Perolehan Barang Berdasarkan Tahun</h3>
            <canvas id="dateDistributionChart"></canvas>
        </div>

        <!-- Nama Merek/tipe Chart -->
        <div class="chart-container">
            <h3 class="text-xl font-semibold mb-2">Distribusi Barang Berdasarkan Merek/tipe Barang</h3>
            <canvas id="myChart"></canvas>
        </div>

        <div class="chart-legend">
            <h3 class="text-xl font-semibold mb-2">Keterangan Data:</h3>
            <div id="legendContainer"></div>
            <h1 class="font-bold text-xl text-emerald-800 mt-2">Jumlah Keseluruhan Data: <span
                    id="totalDataCount"></span></h1>
        </div>
        <div class="mt-2">
            <h3 class="text-2xl font-semibold text-center text-emerald-800">Keterangan Tabel</h3>
            <div class="type-table-container" id="typeTableContainer">
                <table class="type-table" id="typeTable">
                    <thead>
                        <tr>
                            <th>Nama Barang</th>
                            <th>Merek/Tipe</th>
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
        <div id="passwordModal"
            class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded-lg p-6 max-w-md mx-auto">
                <h2 class="text-xl font-bold mb-4">Masukkan Password</h2>
                <input type="password" id="passwordInput" class="border border-gray-300 rounded w-full p-2 mb-4"
                    placeholder="Password">
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
    var dateDistributionData = @json($dateDistributionData);
    var assetData = @json($processedData);
    var correctPassword = 'Bappeda'; // Ensure this matches the password you are entering
    var isAuthenticated = false;

    // Function to trim and validate the password
    function validatePassword(inputPassword) {
        return inputPassword.trim() === correctPassword;
    }

    // Render Tanggal Perolehan Chart
    var dateLabels = Object.keys(dateDistributionData);
    var dateValues = Object.values(dateDistributionData);

    // Prepare data with only year and month labels
    var monthYearLabels = dateLabels.map(date => {
        var dateObj = new Date(date);
        return `${dateObj.getFullYear()}-${dateObj.getMonth() + 1}`; // Format: YYYY-MM
    });

    // Extract unique month-year combinations for x-axis labels
    var uniqueMonthYears = [...new Set(monthYearLabels)];

    var dateCtx = document.getElementById('dateDistributionChart').getContext('2d');
    new Chart(dateCtx, {
        type: 'line',
        data: {
            labels: uniqueMonthYears,
            datasets: [{
                label: 'Distribusi Perolehan Barang Berdasarkan Tahun',
                data: uniqueMonthYears.map(monthYear => {
                    // Aggregate data for each month-year
                    return dateValues.reduce((acc, value, index) => {
                        var date = new Date(dateLabels[index]);
                        var formattedMonthYear =
                            `${date.getFullYear()}-${date.getMonth() + 1}`;
                        if (formattedMonthYear === monthYear) {
                            return acc + value;
                        }
                        return acc;
                    }, 0);
                }),
                borderColor: '#0000FF', // Blue color for the line
                backgroundColor: 'rgba(0, 0, 255, 0.2)', // Light blue background color
                borderWidth: 2,
                fill: true
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            // Show detailed day and month-year information
                            var originalLabel = dateLabels[context.dataIndex];
                            var date = new Date(originalLabel);
                            var day = date.getDate();
                            var month = date.toLocaleString('default', {
                                month: 'long'
                            });
                            var year = date.getFullYear();
                            var value = context.raw || 0;
                            return `${day} ${month} ${year}: ${value}`;
                        }
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        callback: function(value, index, values) {
                            // Show only month-year on x-axis
                            var label = uniqueMonthYears[index];
                            var [year, month] = label.split('-');
                            var monthName = new Date(year, month - 1).toLocaleString(
                                'default', {
                                    month: 'short'
                                });
                            return `${monthName} ${year}`;
                        }
                    }
                }
            }
        }
    });

    // Render Doughnut Chart
    var labels = Object.keys(assetData);
    var totals = labels.map(function(key) {
        return assetData[key].count;
    });

    var totalCount = totals.reduce((a, b) => a + b, 0);

    function getRandomColor() {
        var r = Math.floor(Math.random() * 256);
        var g = Math.floor(Math.random() * 256);
        var b = Math.floor(Math.random() * 256);
        return `rgba(${r}, ${g}, ${b}, 0.7)`;
    }

    var backgroundColors = labels.map(getRandomColor);
    var borderColors = backgroundColors.map(color => color.replace('0.7', '1'));

    var ctx = document.getElementById('myChart').getContext('2d');  
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Barang',
                data: totals,
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top'
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
                    var passwordModal = document.getElementById('passwordModal');
                    passwordModal.classList.remove('hidden');

                    document.getElementById('submitPasswordButton').onclick = function() {
                        var enteredPassword = document.getElementById('passwordInput').value;
                        if (validatePassword(enteredPassword)) {
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

    function showTableData(activeElements) {
    var typeTableContainer = document.getElementById('typeTableContainer');
    var typeTableBody = document.getElementById('typeTableBody');
    typeTableBody.innerHTML = '';

    if (activeElements.length > 0) {
        var index = activeElements[0].index;
        var selectedBarang = labels[index];
        var selectedData = assetData[selectedBarang];

        typeTableContainer.style.display = 'block';

        selectedData.details.forEach(function(detail) {
            var row = document.createElement('tr');
            var namaBarangCell = document.createElement('td');
            var merkTipeCell = document.createElement('td');
            var tanggalPerolehanCell = document.createElement('td');

            namaBarangCell.textContent = detail['Nama Barang'] || '-';
            merkTipeCell.textContent = selectedBarang;
            tanggalPerolehanCell.textContent = detail['Tanggal Perolehan'] || '-';

            row.appendChild(namaBarangCell);
            row.appendChild(merkTipeCell);
            row.appendChild(tanggalPerolehanCell);

            typeTableBody.appendChild(row);
        });
    }
}


    var legendContainer = document.getElementById('legendContainer');
    labels.forEach(function(label, index) {
        var total = totals[index];
        var percentage = ((total / totalCount) * 100).toFixed(2);
        var item = document.createElement('div');
        item.className = 'legend-item';
        item.innerHTML =
            `<span style="background-color: ${backgroundColors[index]}; padding: 5px; border-radius: 5px; display: inline-block; width: 15px; height: 15px; margin-right: 5px;"></span> ${label}: ${total} (${percentage}%)`;
        legendContainer.appendChild(item);
    });

    document.getElementById('totalDataCount').textContent = totalCount;
});
</script>


</body>

</html>