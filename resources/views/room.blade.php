<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Ruang Rapat Baru</title>
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

        .form-container {
            max-width: 600px;
            margin: auto;
            padding: 2rem;
            background-color: #f9fafb;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container h1 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: #374151;
            text-align: center;
        }

        .form-container label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
            color: #374151;
        }

        .form-container input, .form-container textarea {
            width: 100%;
            padding: 0.75rem;
            margin-bottom: 1rem;
            border: 1px solid #d1d5db;
            border-radius: 0.375rem;
        }

        .form-container button {
            width: 100%;
            padding: 0.75rem;
            background-color: #10b981;
            color: #ffffff;
            border: none;
            border-radius: 0.375rem;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .form-container button:hover {
            background-color: #059669;
        }
    </style>
</head>
<body>
    @include('/components/navbar')

    <main class="container mx-auto p-4 mt-20 mb-8">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h1 class="text-2xl font-semibold mb-4">Tambah Ruang Rapat Baru</h1>
            <form action="/Room/Store" method="post">
                @csrf
                <div class="mb-4">
                    <label for="room_name" class="block text-gray-700">Nama Ruang Rapat</label>
                    <input type="text" id="room_name" name="room_name" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="location" class="block text-gray-700">Lokasi</label>
                    <input type="text" id="location" name="location" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="facilities" class="block text-gray-700">Fasilitas</label>
                    <textarea id="facilities" name="facilities" class="w-full p-2 border border-gray-300 rounded" required></textarea>
                </div>
                <div class="mb-4">
                    <label for="capacity" class="block text-gray-700">Kapasitas</label>
                    <input type="number" id="capacity" name="capacity" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="operator" class="block text-gray-700">operator</label>
                    <input type="text" id="operator" name="operator" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <div class="mb-4">
                    <label for="cs" class="block text-gray-700">CS</label>
                    <input type="text" id="cs" name="cs" class="w-full p-2 border border-gray-300 rounded" required>
                </div>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Submit</button>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite('resources/js/app.js')
    @include('components/footer')
</body>
</html>
