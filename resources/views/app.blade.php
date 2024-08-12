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

        /* Modal Styling */
        #dataModal {
            display: none; /* Initially hidden */
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        #dataModal.show {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 0.5rem;
            max-width: 90%;
            width: 400px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .modal-content a {
            display: block;
            margin-bottom: 0.5rem;
            color: #134B70; /* Link color */
            text-decoration: none;
        }

        .close-button {
            margin-top: 1rem;
            background-color: #ef4444; /* Red color */
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.25rem;
            cursor: pointer;
        }
    </style>
</head>
<body>
    @include('/components/navbar')
    <div class="container mx-auto py-16 flex flex-col lg:flex-row items-center hero-section">
        <div class="text-left flex-1 p-4 lg:p-10">
            <div class="inline-block bg-green-100 text-green-800 py-2 px-4 rounded-full text-sm mb-4 animate-fadeIn">
                New Visualitation Data For BAPPEDA ACEH
            </div>
            <h1 class="text-4xl md:text-7xl font-bold text-green-800 mb-4 animate-slideInLeft">Data Visualitation</h1>
            <h1 class="text-2xl md:text-4xl font-bold text-green-800 mb-10 animate-slideInLeft delay-500">BAPPEDA ACEH</h1>
            <a href="#" id="openModal" class="bg-green-500 text-white py-3 px-8 rounded-full animate-bounce">GET Visualisasi Data</a>
        </div>
        <div class="flex-1 text-center lg:text-right">
            <img src="{{ asset('images/Pancacita.png') }}" alt="Pemerintah Aceh Logo" class="mx-auto w-32 md:w-48 shadow-lg transform transition duration-300 hover:scale-105">
        </div>
    </div>

    <!-- Modal -->
    <div id="dataModal">
    <div class="modal-content text-center">
        <h2 class="text-2xl font-bold mb-4 text-green-500">Pilih Halaman Data</h2>
        <ul class="text-black space-y-2">
    <li>
        <a href="/komputer" class="font-bold text-black hover:text-gray-800">Komputer</a>
    </li>
    <li>
        <a href="/dashboard" class="text-black hover:text-gray-800">Transpotasi</a>
    </li>
    <li>
        <a href="/page3" class="text-blackhover:text-gray-800">Halaman Data 3</a>
    </li>
</ul>

        <button id="closeModal" class="close-button bg-green-600 text-white hover:bg-green-700">Close</button>
    </div>
</div>



    @include('components/footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('dataModal');
            const openModalButton = document.getElementById('openModal');
            const closeModalButton = document.getElementById('closeModal');

            openModalButton.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent default link behavior
                modal.classList.add('show');
            });

            closeModalButton.addEventListener('click', function() {
                modal.classList.remove('show');
            });

            modal.addEventListener('click', function(event) {
                if (event.target === modal) {
                    modal.classList.remove('show');
                }
            });
        });
    </script>
</body>
</html>
