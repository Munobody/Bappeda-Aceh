<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAPPEDA Aceh - Visualisasi Alat Kantor</title>
    <link rel="icon" href="{{ asset('images/pancacita.png') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
    :root {
        --primary: #16a34a;
        --secondary: #15803d;
        --dark: #166534;
        --light: #dcfce7;
        --accent: #86efac;
    }

    * { font-family: 'Inter', system-ui, sans-serif; box-sizing: border-box; }
    body { background-color: #f9fafb; margin: 0; padding: 0; min-height: 100vh; }
    
    .dashboard-container { max-width: 1440px; margin: 0 auto; padding: 2rem 1rem; }
    
    .page-title {
        position: relative;
        color: var(--dark);
        margin-bottom: 2.5rem;
        padding-bottom: 1rem;
        text-align: center;
    }
    .page-title::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: var(--accent);
        border-radius: 4px;
    }
    
    .section-title { font-size: 1.25rem; font-weight: 600; color: var(--dark); margin-bottom: 1.5rem; text-align: center; }
    
    .dashboard-card {
        background-color: white;
        border-radius: 16px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        padding: 1.5rem;
        margin-bottom: 2rem;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        overflow: hidden;
    }
    .dashboard-card:hover { transform: translateY(-5px); box-shadow: 0 10px 25px rgba(22, 101, 52, 0.1); }
    
    .chart-grid { display: grid; grid-template-columns: 1fr; gap: 2rem; }
    
    .chart-container { position: relative; height: 400px; width: 100%; }
    .chart-container.chart-tall { height: 500px; }
    .chart-container.chart-very-tall { height: 600px; }
    
    .legend-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 0.75rem; margin-top: 1.5rem; }
    .legend-item {
        display: flex;
        align-items: center;
        padding: 0.5rem;
        border-radius: 8px;
        background-color: #f9fafb;
        transition: all 0.2s ease;
    }
    .legend-item:hover { background-color: var(--light); transform: translateX(5px); }
    .legend-color { width: 16px; height: 16px; border-radius: 4px; margin-right: 0.5rem; flex-shrink: 0; }
    .legend-text { font-size: 0.875rem; color: #4b5563; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    
    .data-summary {
        background-color: var(--light);
        border-radius: 12px;
        padding: 1.25rem;
        margin: 2rem 0;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .summary-value { font-size: 1.75rem; font-weight: 700; color: var(--dark); margin-left: 0.5rem; }
    
    .data-table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        opacity: 0;
        transform: translateY(20px);
        animation: fadeInUp 0.8s forwards;
        animation-delay: 0.2s;
    }
    .data-table th, .data-table td { padding: 1rem; text-align: left; }
    .data-table th {
        background-color: var(--primary);
        color: white;
        font-weight: 600;
        font-size: 0.9rem;
        letter-spacing: 0.025em;
    }
    .data-table tr:nth-child(even) { background-color: #f3f4f6; }
    .data-table tr:not(:last-child) td { border-bottom: 1px solid #e5e7eb; }
    .data-table td { font-size: 0.9rem; color: #4b5563; transition: all 0.2s ease; }
    .data-table tr:hover td { background-color: var(--light); color: var(--dark); }
    
    .back-button {
        display: inline-block;
        background-color: var(--primary);
        color: white;
        font-weight: 600;
        padding: 0.75rem 1.5rem;
        border-radius: 50px;
        text-decoration: none;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(22, 163, 74, 0.2);
        margin: 2rem 0;
    }
    .back-button:hover {
        background-color: var(--secondary);
        transform: translateY(-2px);
        box-shadow: 0 8px 15px rgba(22, 163, 74, 0.3);
    }
    .back-button:active { transform: translateY(0); }
    .back-button-container { text-align: center; margin-top: 2rem; }
    
    /* Modal styling */
    .modal-backdrop {
        position: fixed;
        inset: 0;
        background-color: rgba(0, 0, 0, 0.6);
        backdrop-filter: blur(4px);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 50;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }
    .modal-backdrop.visible { opacity: 1; visibility: visible; }
    .modal-content {
        background-color: white;
        border-radius: 16px;
        width: 90%;
        max-width: 400px;
        padding: 2rem;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
        transform: translateY(20px);
        transition: transform 0.3s ease;
    }
    .modal-backdrop.visible .modal-content { transform: translateY(0); }
    .modal-title { font-size: 1.5rem; font-weight: 600; color: var(--dark); margin-bottom: 1.5rem; }
    .modal-input {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e5e7eb;
        border-radius: 8px;
        font-size: 1rem;
        margin-bottom: 1.5rem;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }
    .modal-input:focus {
        outline: none;
        border-color: var(--accent);
        box-shadow: 0 0 0 3px rgba(134, 239, 172, 0.3);
    }
    .modal-buttons { display: flex; justify-content: flex-end; gap: 1rem; }
    .modal-button {
        padding: 0.75rem 1.5rem;
        border: none;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .modal-button.cancel { background-color: #e5e7eb; color: #4b5563; }
    .modal-button.cancel:hover { background-color: #d1d5db; }
    .modal-button.submit { background-color: var(--primary); color: white; }
    .modal-button.submit:hover { background-color: var(--secondary); }
    
    /* Animations */
    @keyframes fadeInUp { to { opacity: 1; transform: translateY(0); } }
    @keyframes floatIn {
        0% { opacity: 0; transform: translateY(30px); }
        100% { opacity: 1; transform: translateY(0); }
    }
    .animate-float { opacity: 0; transform: translateY(30px); animation: floatIn 0.8s forwards; }
    .delay-100 { animation-delay: 0.1s; }
    .delay-200 { animation-delay: 0.2s; }
    .delay-300 { animation-delay: 0.3s; }
    .delay-400 { animation-delay: 0.4s; }
    
    /* Responsive */
    @media (min-width: 1024px) {
        .chart-grid { grid-template-columns: repeat(2, 1fr); }
        .chart-full-width { grid-column: span 2; }
    }
    
    @media (max-width: 768px) {
        .dashboard-card { padding: 1rem; }
        .chart-container { height: 300px; }
        .chart-container.chart-tall { height: 400px; }
        .chart-container.chart-very-tall { height: 500px; }
        .legend-grid { grid-template-columns: repeat(auto-fill, minmax(150px, 1fr)); }
        .section-title { font-size: 1.125rem; }
        .data-table th, .data-table td { padding: 0.75rem; }
    }
    </style>
</head>

<body>
    @include('components.navbar')

    <div class="dashboard-container">
        <h1 class="page-title text-3xl font-bold mb-8 animate-float mt-20">Visualisasi Alat Kantor dan Rumah Tangga</h1>
        <h2 class="text-xl font-semibold text-emerald-700 text-center mb-12 animate-float delay-100">BAPPEDA ACEH</h2>

        <div class="chart-grid">
            <!-- Kategori Chart -->
            <div class="dashboard-card animate-float delay-200">
                <h3 class="section-title">Distribusi Barang Berdasarkan Kategori</h3>
                <div class="chart-container">
                    <canvas id="categoryChart"></canvas>
                </div>
            </div>

            <!-- Sub Kategori Chart -->
            <div class="dashboard-card animate-float delay-300">
                <h3 class="section-title">Distribusi Barang Berdasarkan Sub Kategori</h3>
                <div class="chart-container chart-tall">
                    <canvas id="subCategoryChart"></canvas>
                </div>
            </div>

            <!-- Tanggal Perolehan Chart -->
            <div class="dashboard-card chart-full-width animate-float delay-200">
                <h3 class="section-title">Distribusi Perolehan Barang Berdasarkan Tahun</h3>
                <div class="chart-container">
                    <canvas id="dateDistributionChart"></canvas>
                </div>
            </div>

            <!-- Nama Barang Chart -->
            <div class="dashboard-card chart-full-width animate-float delay-300">
                <h3 class="section-title">Distribusi Barang Berdasarkan Nama Barang</h3>
                <div class="chart-container chart-very-tall">
                    <canvas id="myChart"></canvas>
                </div>
            </div>
        </div>

        <!-- Data Summary -->
        <div class="data-summary animate-float delay-400">
            <div class="text-center">
                <h3 class="text-lg font-semibold text-emerald-800 mb-1">Total Keseluruhan Data:</h3>
                <div class="summary-value" id="totalDataCount">-</div>
            </div>
        </div>

        <!-- Legend -->
        <div class="dashboard-card animate-float delay-400">
            <h3 class="section-title">Keterangan Data</h3>
            <div class="legend-grid" id="legendContainer"></div>
        </div>

        <!-- Data Table -->
        <div class="dashboard-card">
            <h3 class="section-title">Detail Data Barang</h3>
            <div id="typeTableContainer" style="display: none;">
                <div class="overflow-x-auto">
                    <table class="data-table" id="typeTable">
                        <thead>
                            <tr>
                                <th>Nama Barang</th>
                                <th>Merk/Tipe</th>
                                <th>Tanggal Perolehan</th>
                            </tr>
                        </thead>
                        <tbody id="typeTableBody"></tbody>
                    </table>
                </div>
            </div>
            <div id="tableInstructions" class="text-center py-8 text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 mx-auto mb-3 text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                </svg>
                <p>Klik pada chart barang untuk melihat detail data</p>
            </div>
        </div>

        <div class="back-button-container">
            <a href="/" class="back-button">Kembali ke Halaman Utama</a>
        </div>

        <!-- Modal Password -->
        <div id="passwordModal" class="modal-backdrop">
            <div class="modal-content">
                <h2 class="modal-title">Masukkan Password</h2>
                <input type="password" id="passwordInput" class="modal-input" placeholder="Masukkan password">
                <div class="modal-buttons">
                    <button id="cancelButton" class="modal-button cancel">Batal</button>
                    <button id="submitPasswordButton" class="modal-button submit">Lanjutkan</button>
                </div>
            </div>
        </div>
    </div>

    @include('components.footer')

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Data from controller
        const data = {
            subCategory: @json($subCategoryData),
            dateDistribution: @json($dateDistributionData),
            assets: @json($processedData),
            category: @json($categoryData)
        };
        
        const correctPassword = 'Bappeda';
        let isAuthenticated = false;
        
        // DOM elements
        const modal = {
            container: document.getElementById('passwordModal'),
            input: document.getElementById('passwordInput'),
            cancel: document.getElementById('cancelButton'),
            submit: document.getElementById('submitPasswordButton')
        };
        
        // Table elements
        const table = {
            container: document.getElementById('typeTableContainer'),
            instructions: document.getElementById('tableInstructions'),
            body: document.getElementById('typeTableBody')
        };
        
        // Helper functions
        const ui = {
            showModal() {
                modal.container.classList.add('visible');
            },
            hideModal() {
                modal.container.classList.remove('visible');
            },
            validatePassword(input) {
                return input.trim() === correctPassword;
            },
            generateColors(count) {
                const baseHues = [10, 40, 120, 180, 210, 270, 320];
                return Array(count).fill().map((_, i) => {
                    const hue = baseHues[i % baseHues.length] + Math.floor(i / baseHues.length) * 30;
                    const saturation = 65 + (i % 3) * 10;
                    const lightness = 55 + (i % 5) * 3;
                    return `hsl(${hue}, ${saturation}%, ${lightness}%)`;
                });
            },
            showTableData(activeElements, labels, assetData) {
                table.body.innerHTML = '';
                
                if (activeElements.length > 0) {
                    const index = activeElements[0].index;
                    const selectedBarang = labels[index];
                    const selectedData = assetData[selectedBarang];
                    
                    table.container.style.display = 'block';
                    table.instructions.style.display = 'none';
                    
                    selectedData.details.forEach(detail => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${selectedBarang}</td>
                            <td>${detail['Merek/tipe'] || '-'}</td>
                            <td>${detail['Tanggal Perolehan'] || '-'}</td>
                        `;
                        table.body.appendChild(row);
                    });
                }
            },
            createLegend(labels, totals, colors, totalCount) {
                const container = document.getElementById('legendContainer');
                labels.forEach((label, i) => {
                    const percentage = ((totals[i] / totalCount) * 100).toFixed(1);
                    const item = document.createElement('div');
                    item.className = 'legend-item';
                    item.innerHTML = `
                        <span class="legend-color" style="background-color: ${colors[i]}"></span>
                        <span class="legend-text">${label}: ${totals[i]} (${percentage}%)</span>
                    `;
                    container.appendChild(item);
                });
            }
        };
        
        // Common chart options
        const chartOptions = {
            tooltipStyle: {
                backgroundColor: 'rgba(255, 255, 255, 0.9)',
                titleColor: '#166534',
                bodyColor: '#374151',
                bodyFont: { family: 'Inter' },
                borderColor: '#e5e7eb',
                borderWidth: 1,
                cornerRadius: 8,
                padding: 12
            }
        };
        
        // Setup modal events
        modal.cancel.addEventListener('click', ui.hideModal);
        
        // Create category chart
        const categoryLabels = Object.keys(data.category);
        const categoryValues = Object.values(data.category);
        const categoryColors = ui.generateColors(categoryLabels.length);
        
        new Chart(document.getElementById('categoryChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: categoryLabels,
                datasets: [{
                    label: 'Jumlah Barang per Kategori',
                    data: categoryValues,
                    backgroundColor: categoryColors,
                    borderColor: categoryColors.map(c => c.replace(')', ', 1)')),
                    borderWidth: 1,
                    borderRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: {
                        ...chartOptions.tooltipStyle,
                        callbacks: {
                            label: context => `Jumlah: ${context.raw}`
                        }
                    }
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: { font: { family: 'Inter' } }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f3f4f6' },
                        ticks: { font: { family: 'Inter' } }
                    }
                }
            }
        });
        
        // Create subcategory chart
        const subCategoryLabels = Object.keys(data.subCategory);
        const subCategoryValues = Object.values(data.subCategory);
        const subCategoryColors = ui.generateColors(subCategoryLabels.length);
        
        new Chart(document.getElementById('subCategoryChart').getContext('2d'), {
            type: 'doughnut',
            data: {
                labels: subCategoryLabels,
                datasets: [{
                    data: subCategoryValues,
                    backgroundColor: subCategoryColors,
                    borderColor: '#ffffff',
                    borderWidth: 2,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '65%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 15,
                            font: { family: 'Inter', size: 11 },
                            usePointStyle: true,
                            pointStyle: 'circle'
                        }
                    },
                    tooltip: chartOptions.tooltipStyle
                }
            }
        });
        
        // Date distribution chart
        const dateLabels = Object.keys(data.dateDistribution);
        const dateValues = Object.values(data.dateDistribution);
        const monthYearLabels = dateLabels.map(date => {
            const dateObj = new Date(date);
            return `${dateObj.getFullYear()}-${dateObj.getMonth() + 1}`;
        });
        const uniqueMonthYears = [...new Set(monthYearLabels)];
        
        new Chart(document.getElementById('dateDistributionChart').getContext('2d'), {
            type: 'line',
            data: {
                labels: uniqueMonthYears,
                datasets: [{
                    label: 'Jumlah Perolehan',
                    data: uniqueMonthYears.map(monthYear => {
                        return dateValues.reduce((acc, value, index) => {
                            const date = new Date(dateLabels[index]);
                            const formattedMonthYear = `${date.getFullYear()}-${date.getMonth() + 1}`;
                            return formattedMonthYear === monthYear ? acc + value : acc;
                        }, 0);
                    }),
                    borderColor: '#16a34a',
                    backgroundColor: 'rgba(22, 163, 74, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.2,
                    pointBackgroundColor: '#ffffff',
                    pointBorderColor: '#16a34a',
                    pointBorderWidth: 2,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: chartOptions.tooltipStyle
                },
                scales: {
                    x: {
                        grid: { display: false },
                        ticks: {
                            callback: (value, index) => {
                                const [year, month] = uniqueMonthYears[index].split('-');
                                const monthName = new Date(year, month - 1).toLocaleString('default', { month: 'short' });
                                return `${monthName} ${year}`;
                            },
                            font: { family: 'Inter' }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        grid: { color: '#f3f4f6' },
                        ticks: { font: { family: 'Inter' } }
                    }
                }
            }
        });
        
        // Asset distribution chart
        const assetLabels = Object.keys(data.assets);
        const assetTotals = assetLabels.map(key => data.assets[key].count);
        const totalCount = assetTotals.reduce((a, b) => a + b, 0);
        const assetColors = ui.generateColors(assetLabels.length);
        
        const mainChart = new Chart(document.getElementById('myChart').getContext('2d'), {
            type: 'bar',
            data: {
                labels: assetLabels,
                datasets: [{
                    label: 'Jumlah Barang',
                    data: assetTotals,
                    backgroundColor: assetColors,
                    borderWidth: 0,
                    borderRadius: 6,
                    barThickness: 12
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false },
                    tooltip: chartOptions.tooltipStyle
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: { color: '#f3f4f6' },
                        ticks: { font: { family: 'Inter' } }
                    },
                    y: {
                        grid: { display: false },
                        ticks: { font: { family: 'Inter', size: 11 } }
                    }
                },
                onClick: (evt, activeElements) => {
                    if (!isAuthenticated) {
                        ui.showModal();
                        
                        modal.submit.onclick = () => {
                            if (ui.validatePassword(modal.input.value)) {
                                isAuthenticated = true;
                                ui.hideModal();
                                ui.showTableData(activeElements, assetLabels, data.assets);
                            } else {
                                alert('Password salah! Silakan coba lagi.');
                            }
                        };
                    } else {
                        ui.showTableData(activeElements, assetLabels, data.assets);
                    }
                }
            }
        });
        
        // Create legend and set total count
        ui.createLegend(assetLabels, assetTotals, assetColors, totalCount);
        document.getElementById('totalDataCount').textContent = totalCount;
    });
    </script>
</body>
</html>