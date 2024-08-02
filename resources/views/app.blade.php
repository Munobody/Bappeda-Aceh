<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAPPEDA ACEH</title>
    <link rel="icon" href="{{ asset('images/pancacita.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <style>
        body {
            background: linear-gradient(90deg, #fff 0%, #fff 100%);
            background-size: 400% 400%;
            animation: waveBackgroundAnimation 10s ease infinite;
            transition: background 0.5s, color 0.5s;
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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {
                transform: translateY(0);
            }
            40% {
                transform: translateY(-30px);
            }
            60% {
                transform: translateY(-15px);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 1s ease-out;
        }

        .animate-slideInLeft {
            animation: slideInLeft 1s ease-out;
        }

        .animate-slideInLeft.delay-500 {
            animation-delay: 0.5s;
        }

        .animate-bounce {
            animation: bounce 2s infinite;
        }

        [data-theme="dark"] {
            background: #121212;
            color: #ffffff;
        }

        .scrollable-table {
            max-height: 400px; /* Set the height of the table container */
            overflow-y: auto; /* Add vertical scrollbar */
        }

        /* Table styling */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #cbd5e1; /* Border color for cells */
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f1f5f9; /* Background color for header cells */
            color: #334155; /* Text color for header cells */
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f9fafb; /* Background color for alternate rows */
        }

        caption {
            padding: 8px;
            font-weight: bold;
            color: #334155; /* Text color for caption */
        }
    </style>
</head>
<body>
    @include('/components/navbar')
    @include('/components/messages')
    <div class="container mx-auto py-16 flex flex-col lg:flex-row items-center hero-section">
        <div class="text-left flex-1 p-4 lg:p-10">
            <div class="inline-block bg-green-100 text-green-800 py-2 px-4 rounded-full text-sm mb-4 animate-fadeIn">
                New Visualitation Data For BAPPEDA ACEH
            </div>
            <h1 class="text-4xl md:text-7xl font-bold text-green-800 mb-4 animate-slideInLeft">Data Visualitation</h1>
            <h1 class="text-2xl md:text-4xl font-bold text-green-800 mb-10 animate-slideInLeft delay-500">BAPPEDA ACEH</h1>
            <a href="/dashboard" class="bg-green-500 text-white py-3 px-8 rounded-full animate-bounce">GET Visualisasi Data</a>
        </div>
        <div class="flex-1 text-center lg:text-right">
            <img src="{{ asset('images/Pancacita.png') }}" alt="Pemerintah Aceh Logo" class="mx-auto w-32 md:w-48 shadow-lg transform transition duration-300 hover:scale-105">
        </div>
    </div>

    <div class="container mx-auto text-center py-16">
        <h2 class="text-2xl font-bold text-green-800 mb-4 shadow-2xl"> Asset Transportasi BAPPEDA ACEH</h2>
    </div>
    <div class="overflow-x-auto px-4 lg:px-24 mb-16 scrollable-table">
        <table class="min-w-full divide-y divide-gray-200 shadow-2xl">
            <caption class="caption-bottom mt-5">
                Table 1 Data Asset Transportasi Bappeda Aceh
            </caption>
            <!-- Table header -->
            <thead class="bg-gray-50">
                <tr>
                    <th class="border border-slate-300 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
                    <th class="border border-slate-300 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th class="border border-slate-300 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Asset</th>
                    <th class="border border-slate-300 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Department</th>
                    <th class="border border-slate-300 px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tahun</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <!-- PHP code to loop through CSV data and populate rows -->
                @php
                    // Path to your CSV file
                    $csvFile = storage_path('app/public/Transportasi-Bappeda-Aceh.csv');

                    // Check if the file exists
                    if (file_exists($csvFile)) {
                        // Open and read the CSV file
                        $file = fopen($csvFile, 'r');

                        // Initialize counter
                        $count = 1;

                        // Loop through each row in the CSV file
                        while (($data = fgetcsv($file)) !== FALSE) {
                            // Skip the header row
                            if ($count > 1) {
                                echo "<tr>";
                                echo "<th class='border border-slate-300 px-6 py-4 whitespace-nowrap'>" . ($count - 1) . "</th>"; // Display row number
                                echo "<td class='border border-slate-300 px-6 py-4 whitespace-nowrap'>" . $data[0] . "</td>"; // Display Name column
                                echo "<td class='border border-slate-300 px-6 py-4 whitespace-nowrap'>" . $data[1] . "</td>"; // Display Asset column
                                echo "<td class='border border-slate-300 px-6 py-4 whitespace-nowrap'>" . $data[2] . "</td>"; // Display Department column
                                echo "<td class='border border-slate-300 px-6 py-4 whitespace-nowrap'>" . $data[6] . "</td>"; // Display Tahun column
                                echo "</tr>";
                            }
                            $count++;
                        }
                        fclose($file); // Close the file
                    } else {
                        echo "<tr><td colspan='5' class='border border-slate-300 px-6 py-4 text-center'>CSV file not found!</td></tr>";
                    }
                @endphp
            </tbody>
        </table>
    </div>

    @include('components/footer')

    <script>
        // Function to toggle the theme
        function toggleTheme() {
            const body = document.body;
            const themeToggle = document.getElementById('themeToggle');
            
            // Determine the new theme based on the toggle's checked status
            const newTheme = themeToggle.checked ? 'dark' : 'light';
            body.setAttribute('data-theme', newTheme);

            // Save theme preference in local storage
            localStorage.setItem('theme', newTheme);
        }

        // Load saved theme preference on page load
        document.addEventListener('DOMContentLoaded', () => {
            const savedTheme = localStorage.getItem('theme') || 'light';
            const themeToggle = document.getElementById('themeToggle');
            
            // Set the body's data-theme attribute to the saved theme
            document.body.setAttribute('data-theme', savedTheme);
            
            // Set the toggle's checked status based on the saved theme
            if (themeToggle) {
                themeToggle.checked = (savedTheme === 'dark');
                themeToggle.addEventListener('change', toggleTheme);
            }
        });
    </script>
</body>
</html>
