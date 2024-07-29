<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User</title>
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

        .bullet-list {
            list-style-type: disc; /* Change to disc (bullets) */
            padding-left: 1.5rem; /* Add space on the left for bullets */
            margin: 0; /* Remove margin for the list */
        }

        .datepicker {
            position: relative;
        }

        .datepicker input {
            cursor: pointer;
        }

        .datepicker .datepicker-calendar {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 10;
            background: white;
            border: 1px solid #ddd;
            border-radius: 0.5rem;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    @include('/components/navbar')
    
    <div class="container mx-auto py-12 flex flex-col lg:flex-row items-center justify-center hero-section">
        <div class="text-left flex-1 p-4 lg:p-8">
            <h1 class="text-3xl md:text-5xl font-bold text-green-800 mb-4 animate-slideInLeft">Form Peminjaman Ruang Rapat</h1>
            <h1 class="text-2xl md:text-4xl font-bold text-green-800 mb-8 animate-slideInLeft delay-500">BAPPEDA ACEH</h1>
            <a href="/dashboard" class="bg-green-500 text-white py-3 px-8 rounded-full animate-bounce">Booking Meeting Room</a>
        </div>
        <div class="flex-1 text-center lg:text-right">
            <img src="{{ asset('images/logo 2.png') }}" alt="Pemerintah Aceh Logo" class="mx-auto w-32 md:w-48 shadow-lg transform transition duration-300 hover:scale-105">
        </div>
    </div>
    
    <div class="container mx-auto max-w-lg bg-white p-8 rounded-lg shadow-lg mb-12">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Form Peminjaman Ruang Rapat</h2>
        <form action="/submit-room-booking" method="POST" enctype="multipart/form-data">
            <!-- Nama Bidang atau Bagian -->
            <div class="mb-4">
                <label for="nama-bidang" class="block text-gray-700 font-bold mb-2">Nama Bidang atau Bagian</label>
                <input type="text" id="nama-bidang" name="nama_bidang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <!-- Deskripsi Singkat Ruang Rapat -->
            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Deskripsi Singkat Ruang Rapat</label>
                <textarea id="deskripsi" name="deskripsi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
            </div>
            <!-- Tanggal Peminjaman -->
            <div class="mb-4 datepicker">
                <label for="tanggal" class="block text-gray-700 font-bold mb-2">Tanggal Peminjaman</label>
                <input type="date" id="tanggal" name="tanggal" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <!-- Jam Peminjaman -->
            <div class="mb-4">
                <label for="jam" class="block text-gray-700 font-bold mb-2">Jam Peminjaman</label>
                <select id="jam" name="jam" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                    <option value="08:00-10:00">08:00-10:00</option>
                    <option value="10:00-12:00">10:00-12:00</option>
                    <option value="13:00-15:00">13:00-15:00</option>
                    <option value="15:00-17:00">15:00-17:00</option>
                </select>
            </div>
            <!-- Upload File -->
            <div class="mb-4">
                <label for="file" class="block text-gray-700 font-bold mb-2">Upload File</label>
                <input type="file" id="file" name="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <!-- Submit Button -->
            <div class="mb-4">
                <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded-full hover:bg-green-700 focus:outline-none focus:shadow-outline">Submit</button>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite('resources/js/app.js')
    @include('components/footer')

</body>
</html>
