<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Room page</title>
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

        /* Container for heading and button */
        .heading-button-container {
            margin-bottom: 1.5rem; /* Adjust spacing as needed */
        }

        .heading-button-container h2 {
            margin: 0 auto; /* Center the heading */
            font-size: 1.5rem; /* Adjust font size if needed */
            color: #374151; /* Text color for heading */
            text-align: center;
        }

        .button-container {
            display: flex;
            justify-content: flex-start; /* Align button to the left */
            margin-top: 1rem; /* Adjust spacing as needed */
        }

        .button-container a {
            background-color: #10b981; /* Green button color */
            color: #ffffff;
            padding: 0.5rem 1rem;
            border-radius: 10px; /* Set corner radius to 10px */
            text-align: center;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .button-container a:hover {
            background-color: #059669; /* Darker green on hover */
        }

        .edit-button {
            background-color: #10b981; /* Green button color */
            color: #ffffff;
        }

        .delete-button {
            background-color: #ef4444; /* Red button color */
            color: #ffffff;
        }

        .edit-button:hover {
            background-color: #059669; /* Darker green on hover */
        }

        .delete-button:hover {
            background-color: #dc2626; /* Darker red on hover */
        }
    </style>
</head>
<body>
    @include('/components/navbar') 
    <div class="container mx-auto py-12 flex flex-col lg:flex-row items-center justify-center hero-section">
        <div class="text-left flex-1 p-4 lg:p-12">
            <h1 class="text-3xl md:text-5xl font-bold text-green-800 mb-4 animate-slideInLeft">Halaman Admin Ruang Rapat</h1>
            <h1 class="text-2xl md:text-4xl font-bold text-green-800 mb-8 animate-slideInLeft delay-500">BAPPEDA ACEH</h1>
        </div>
    </div>

    <!-- Table Section -->
    <div class="container mx-auto py-6 px-4 ">
        <div class="heading-button-container">
            <h2>Daftar Ruang Rapat</h2>
            <div class="button-container">
                <a href="/create-room">Buat Ruang Rapat Baru</a>
            </div>
        </div>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-[10px]">
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
                            <a href="/edit-room?id=1" class="edit-button py-2 px-4 rounded-lg inline-block text-center">Edit</a>
                            <a href="/delete-room?id=1" class="delete-button py-2 px-4 rounded-lg inline-block text-center ml-2">Delete</a>
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
                            <a href="/edit-room?id=1" class="edit-button py-2 px-4 rounded-lg inline-block text-center">Edit</a>
                            <a href="/delete-room?id=1" class="delete-button py-2 px-4 rounded-lg inline-block text-center ml-2">Delete</a>
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
                            <a href="/edit-room?id=1" class="edit-button py-2 px-4 rounded-lg inline-block text-center">Edit</a>
                            <a href="/delete-room?id=1" class="delete-button py-2 px-4 rounded-lg inline-block text-center ml-2">Delete</a>
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
                            <a href="/edit-room?id=1" class="edit-button py-2 px-4 rounded-lg inline-block text-center">Edit</a>
                            <a href="/delete-room?id=1" class="delete-button py-2 px-4 rounded-lg inline-block text-center ml-2">Delete</a>
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
                            <a href="/edit-room?id=1" class="edit-button py-2 px-4 rounded-lg inline-block text-center">Edit</a>
                            <a href="/delete-room?id=1" class="delete-button py-2 px-4 rounded-lg inline-block text-center ml-2">Delete</a>
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
                            <a href="/edit-room?id=1" class="edit-button py-2 px-4 rounded-lg inline-block text-center">Edit</a>
                            <a href="/delete-room?id=1" class="delete-button py-2 px-4 rounded-lg inline-block text-center ml-2">Delete</a>
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
                            <a href="/edit-room?id=1" class="edit-button py-2 px-4 rounded-lg inline-block text-center">Edit</a>
                            <a href="/delete-room?id=1" class="delete-button py-2 px-4 rounded-lg inline-block text-center ml-2">Delete</a>
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
