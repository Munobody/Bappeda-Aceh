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

        @keyframes checkmark {
            0% {
                stroke-dashoffset: 50px;
            }
            100% {
                stroke-dashoffset: 0;
            }
        }

        @keyframes modalFadeIn {
            0% {
                transform: scale(0.8);
                opacity: 0;
            }
            100% {
                transform: scale(1);
                opacity: 1;
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

        .checkmark {
            width: 200px; /* Perbesar ukuran checkmark */
            height: 200px; /* Perbesar ukuran checkmark */
            position: relative;
            display: block;
            stroke-width: 2;
            stroke: #4CAF50;
            fill: none;
            margin: 0 auto 16px;
            stroke-linecap: round;
            stroke-linejoin: round;
            animation: checkmark 0.5s ease-in-out forwards;
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

        .modal-bg {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 50;
        }

        .modal-content {
            background-color: white;
            padding: 40px; /* Perbesar padding modal */
            border-radius: 15px; /* Perbesar border-radius modal */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            transform: scale(0.8);
            animation: modalFadeIn 0.5s ease-out forwards;
        }

        .blurred {
            filter: blur(5px);
        }
    </style>
</head>
<body>
    @include('/components/navbar')
    
    <div id="content" class="container mx-auto py-12 flex flex-col lg:flex-row items-center justify-center hero-section p-12">
        <div class="text-left flex-1 p-4 lg:p-12">
            <h1 class="text-3xl md:text-5xl font-bold text-green-800 mb-4 animate-slideInLeft">Form Peminjaman Ruang Rapat</h1>
            <h1 class="text-2xl md:text-4xl font-bold text-green-800 mb-8 animate-slideInLeft delay-500">BAPPEDA ACEH</h1>
        </div>
    </div>
    
    <div class="container mx-auto max-w-lg bg-white p-8 rounded-lg shadow-lg mb-16">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Form Peminjaman Ruang Rapat</h2>
        <form id="bookingForm" action="/submit-room-booking" method="POST" enctype="multipart/form-data">
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

    <!-- Success Modal -->
    <div id="successModal" class="modal-bg">
        <div class="modal-content">
            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                <circle cx="26" cy="26" r="25" fill="none" stroke-width="2"/>
                <path fill="none" d="M14 27l7 7 17-17" stroke-width="2"/>
            </svg>
            <p class="text-lg text-green-800 font-bold">Peminjaman Berhasil!</p>
        </div>
    </div>

    <script>
        document.getElementById("bookingForm").addEventListener("submit", function(event) {
            event.preventDefault(); // Mencegah perilaku submit default

            // Tampilkan modal sukses
            document.getElementById("successModal").style.display = "flex";
            document.getElementById("content").classList.add("blurred");

            // Redirect ke halaman lain setelah beberapa detik (misalnya 3 detik)
            setTimeout(function() {
                window.location.href = "/landingpage"; // Ganti "/halaman-baru" dengan URL yang diinginkan
            }, 3000);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite('resources/js/app.js')
    @include('components/footer')

</body>
</html>
