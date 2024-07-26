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
    </style>
</head>
<body>
    @include('/components/navbar') 
    <div class="container mx-auto py-12 flex flex-col lg:flex-row items-center justify-center hero-section">
        <div class="text-left flex-1 p-4 lg:p-8">
            <h1 class="text-3xl md:text-5xl font-bold text-green-800 mb-4 animate-slideInLeft">Pengajuan Peminjaman Ruang Rapat</h1>
            <h1 class="text-2xl md:text-4xl font-bold text-green-800 mb-8 animate-slideInLeft delay-500">BAPPEDA ACEH</h1>
            <a href="/dashboard" class="bg-green-500 text-white py-3 px-8 rounded-full animate-bounce">Booking Meeting Room</a>
        </div>
        <div class="flex-1 text-center lg:text-right">
            <img src="{{ asset('images/logo 2.png') }}" alt="Pemerintah Aceh Logo" class="mx-auto w-32 md:w-48 shadow-lg transform transition duration-300 hover:scale-105">
        </div>
    </div>

    <!-- Table Section -->
    <div class="container mx-auto py-6 px-4"> <!-- Reduced py-10 to py-6 -->
        <h2 class="text-2xl font-bold text-green-800 mb-6 text-center">Daftar Ruang Rapat</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">No</th>
                        <th class="py-2 px-4 border-b">Nama Ruang Rapat</th>
                        <th class="py-2 px-4 border-b">Lokasi</th>
                        <th class="py-2 px-4 border-b">Fasilitas</th>
                        <th class="py-2 px-4 border-b">Kapasitas</th>
                        <th class="py-2 px-4 border-b">Petugas</th>
                        <th class="py-2 px-4 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr>
                        <td class="py-2 px-4 border-b">1</td>
                        <td class="py-2 px-4 border-b">Ruang Rapat VIP</td>
                        <td class="py-2 px-4 border-b">Lobby Lantai 1</td>
                        <td class="py-2 px-4 border-b">
                            <ul class="bullet-list">
                                <li>Kursi : 25 Unit</li>
                                <li>Meja Rapat 1 Set</li>
                                <li>Layar Proyektor 1 Unit</li>
                                <li>Sound System 1 Unit</li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b">25 orang</td>
                        <td class="py-2 px-4 border-b">
                            <ul class="bullet-list">
                                <li>Operator : Fauzi Noor</li>
                                <li>Cs : Herwandi</li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b">
                    <a href="/booking?id=1" class="bg-green-500 text-white py-2 px-4 rounded-full hover:bg-green-600 inline-block text-center">Booking</a>
                        </td>
                    </tr>
                    <!-- Row 2 -->
                    <tr>
                        <td class="py-2 px-4 border-b">2</td>
                        <td class="py-2 px-4 border-b">Ruang Rapat Executive</td>
                        <td class="py-2 px-4 border-b">Selasar Lantai 1(Depan Musholla)</td>
                        <td class="py-2 px-4 border-b">
                            <ul class="bullet-list">
                                <li>Kursi : 30 Unit</li>
                                <li>Meja Rapat 1 Set</li>
                                <li>Meja Operator 1 Set</li>
                                <li>Vidiotron 1 Unit</li>
                                <li>Mic Conference</li>
                                <li>Camera Zoom 1 Unit</li>
                                <li>PC 1 Unit</li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b">30 orang</td>
                        <td class="py-2 px-4 border-b">
                            <ul class="bullet-list">
                                <li>Operator : Abd. Rani</li>
                                <li>Cs : Gunawan</li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b">
                        <a href="/booking?id=2" class="bg-green-500 text-white py-2 px-4 rounded-full hover:bg-green-600 inline-block text-center">Booking</a>
                        </td>
                    </tr>
                    <!-- Row 3 -->
                    <tr>
                        <td class="py-2 px-4 border-b">3</td>
                        <td class="py-2 px-4 border-b">Ruang Rapat 2.A</td>
                        <td class="py-2 px-4 border-b">Lobby Lantai 2(Bisa Connect ke 2.B)</td>
                        <td class="py-2 px-4 border-b">
                            <ul class="bullet-list">
                                <li>Kursi : 50 Unit</li>
                                <li>Meja Rapat 1 Set</li>
                                <li>Meja Operator 1 Set</li>
                                <li>Layar Proyektor 1 Unit</li>
                                <li>Sound System 1 Unit</li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b">50 orang</td>
                        <td class="py-2 px-4 border-b">
                            <ul class="bullet-list">
                                <li>Operator : Abd. Rani</li>
                                <li>Cs : Herwandi</li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b">
                        <a href="/booking?id=3" class="bg-green-500 text-white py-2 px-4 rounded-full hover:bg-green-600 inline-block text-center">Booking</a>
                        </td>
                    </tr>
                    <!-- Row 4 -->
                    <tr>
                        <td class="py-2 px-4 border-b">4</td>
                        <td class="py-2 px-4 border-b">Ruang Rapat 2.B</td>
                        <td class="py-2 px-4 border-b">Lobby Lantai 2(Bisa Connect ke 2.A)</td>
                        <td class="py-2 px-4 border-b">
                            <ul class="bullet-list">
                                <li>Kursi : 50 Unit</li>
                                <li>Meja Rapat 1 Set</li>
                                <li>Meja Operator 1 Set</li>
                                <li>Layar Proyektor 3 Unit</li>
                                <li>Mic Conference</li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b">50 orang</td>
                        <td class="py-2 px-4 border-b">
                            <ul class="bullet-list">
                                <li>Operator : Fauzi Noor</li>
                                <li>Cs : Fidarliani</li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b">
                        <a href="/booking?id=4" class="bg-green-500 text-white py-2 px-4 rounded-full hover:bg-green-600 inline-block text-center">Booking</a>
                        </td>
                    </tr>
                    <!-- Row 5 -->
                    <tr>
                        <td class="py-2 px-4 border-b">5</td>
                        <td class="py-2 px-4 border-b">Ruang Rapat 2.C</td>
                        <td class="py-2 px-4 border-b">Selasar Lantai 2 Dekat Ruang Litbang</td>
                        <td class="py-2 px-4 border-b">
                            <ul class="bullet-list">
                                <li>Kursi : 40 Unit</li>
                                <li>Meja Rapat 1 Set</li>
                                <li>Meja Operator 1 Set</li>
                                <li>Layar Proyektor 1 Unit</li>
                                <li>Mic Conference</li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b">40 orang</td>
                        <td class="py-2 px-4 border-b">
                            <ul class="bullet-list">
                                <li>Operator : Abd.Rani</li>
                                <li>Cs : Salman</li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b">
                        <a href="/booking?id=5" class="bg-green-500 text-white py-2 px-4 rounded-full hover:bg-green-600 inline-block text-center">Booking</a>
                        </td>
                    </tr>
                    <!-- Row 6 -->
                    <tr>
                        <td class="py-2 px-4 border-b">6</td>
                        <td class="py-2 px-4 border-b">Ruang Rapat 3 Kemiskinan</td>
                        <td class="py-2 px-4 border-b">Lantai 3 Dekat Ruang Kemiskinan</td>
                        <td class="py-2 px-4 border-b">
                            <ul class="bullet-list">
                                <li>Kursi : 20 Unit</li>
                                <li>Meja Rapat 1 Set</li>
                                <li>Meja Operator 1 Set</li>
                                <li>Layar Proyektor 1 Unit</li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b">20 orang</td>
                        <td class="py-2 px-4 border-b">
                            <ul class="bullet-list">
                                <li>Operator : Abd.Rani</li>
                                <li>Cs : Darmawan</li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b">
                        <a href="/booking?id=6" class="bg-green-500 text-white py-2 px-4 rounded-full hover:bg-green-600 inline-block text-center">Booking</a>
                        </td>
                    </tr>
                    <!-- Row 7 -->
                    <tr>
                        <td class="py-2 px-4 border-b">7</td>
                        <td class="py-2 px-4 border-b">Aula Prof. A. Madjid Ibrahim</td>
                        <td class="py-2 px-4 border-b">Lantai 4</td>
                        <td class="py-2 px-4 border-b">
                            <ul class="bullet-list">
                                <li>Kursi : 150 Unit</li>
                                <li>Meja Rapat 1 Set</li>
                                <li>Meja Operator 2 Set</li>
                                <li>Vidiotron 1 Unit</li>
                                <li>Layar Proyektor 2 Unit</li>
                                <li>Mic Conference</li>
                                <li>Kursi Sofa 1 Set</li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b">150 orang</td>
                        <td class="py-2 px-4 border-b">
                            <ul class="bullet-list">
                                <li>Operator : Fauzi Noor & Abd.Rani</li>
                                <li>Cs : Optional</li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b">
                        <a href="/booking?id=7" class="bg-green-500 text-white py-2 px-4 rounded-full hover:bg-green-600 inline-block text-center">Booking</a>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite('resources/js/app.js')
    @include('components/footer')

</body>
</html>
