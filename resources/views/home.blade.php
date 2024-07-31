<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
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
            max-height: 400px;
            overflow-y: auto;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #cbd5e1;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f1f5f9;
            color: #334155;
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }

        caption {
            padding: 8px;
            font-weight: bold;
            color: #334155;
        }

        .bullet-list {
            list-style-type: disc;
            padding-left: 1.5rem;
            margin: 0;
        }

        .timeline-container {
            padding: 2rem;
            margin-top: -6rem; /* Adjust margin to move timeline up */
        }

        .timeline-item {
            position: relative;
            padding-left: 2rem;
            margin-bottom: 2rem;
        }

        .timeline-item::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            border-left: 2px solid #d1d5db;
        }

        .timeline-item time {
            display: block;
            font-size: 0.875rem; /* Ukuran font untuk waktu */
            font-weight: 500;    /* Berat font untuk membedakan waktu */
            color: #4b5563;      /* Warna teks untuk waktu */
        }

        .tooltip {
            position: relative;
            display: inline-block;
            cursor: pointer;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 160px;
            background-color: #333;
            color: #fff;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%; /* Position the tooltip above the text */
            left: 50%;
            margin-left: -80px;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>
<body>
    @include('/components/navbar')
    
    <div class="container mx-auto py-12 flex flex-col lg:flex-row items-center justify-center hero-section">
        <div class="text-left flex-1 p-4 lg:p-12">
            <h1 class="text-3xl md:text-5xl font-bold text-green-800 mb-4 animate-slideInLeft">Agenda Rapat</h1>
            <h1 class="text-2xl md:text-4xl font-bold text-green-800 mb-8 animate-slideInLeft delay-500">BAPPEDA ACEH</h1>
            <a href="/request" class="bg-green-500 text-white py-3 px-8 rounded-full animate-bounce">Booking Meeting Room</a>
        </div>
    </div>

    <div class="timeline-container mt-[-6rem]">
        <ol class="relative border-l border-gray-200 dark:border-gray-700">
            <li class="timeline-item">
                <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">02 Agustus 2024, 08:00 - 10:00</time>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Bidang Umum</h3>
                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Peminjaman Barang Pegawai BAPPEDA</p>
                <div class="tooltip">
                    <span class="tooltiptext">Ruang Rapat VIP</span>
                    <span class="text-green-500 font-medium">Ruang Rapat VIP</span>
                </div>
            </li>
            <li class="timeline-item">
                <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">03 Agustus 2024, 10:00 - 12:00</time>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Bidang Kepegawaian</h3>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Rapat Evaluasi Rencana Pembangunan</p>
                <div class="tooltip">
                    <span class="tooltiptext">Ruang Rapat Utama</span>
                    <span class="text-gray-600 font-medium">Ruang Rapat Utama</span>
                </div>
            </li>
            <li class="timeline-item">
                <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">04 Agustus 2024, 15.00 - 17.00</time>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Bidang Perencanaan</h3>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Rapat Sosialisasi Program Pembangunan</p>
                <div class="tooltip">
                    <span class="tooltiptext">Ruang Rapat Executive</span>
                    <span class="text-gray-600 font-medium">Ruang Rapat Executive</span>
                </div>
            </li>
            <li class="timeline-item">
                <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">05 Agustus 2024, 08.00 - 10.00</time>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Bidang Perencanaan</h3>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Rapat Penyusunan Rencana Kerja</p>
                <div class="tooltip">
                    <span class="tooltiptext">Ruang Rapat VIP</span>
                    <span class="text-gray-600 font-medium">Ruang Rapat VIP</span>
                </div>
            </li>
            <li class="timeline-item">
                <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">05 Agustus 2024, 15.00 - 17.00</time>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Bidang Perencanaan</h3>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Rapat Sosialisasi Program Pembangunan</p>
                <div class="tooltip">
                    <span class="tooltiptext">Ruang Rapat Executive</span>
                    <span class="text-gray-600 font-medium">Ruang Rapat Executive</span>
                </div>
            </li>
        </ol>
    </div>

    @include('components/footer')

</body>
</html>
