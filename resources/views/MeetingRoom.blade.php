<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meeting Room page</title>
    <link rel="icon" href="{{ asset('images/pancacita.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
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
            padding: 0.5rem 1rem; /* Adjusted padding with rem */
            text-align: left;
            font-size: 1rem; /* Adjusted font size */
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
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap; /* Ensure content wraps on smaller screens */
            margin-bottom: 1.5rem; /* Adjust spacing as needed */
        }

        .heading-button-container h2 {
            margin: 0 auto; /* Center the heading */
            font-size: 1.5rem; /* Adjust font size if needed */
            color: #374151; /* Text color for heading */
            text-align: center;
        }

        .button-container {
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

    <div id="content" class="container mx-auto py-12 flex flex-col lg:flex-row items-center justify-center hero-section px-12 mt-20 mb-10">
        <div class="lg:px-12 lg:pt-12">
            <h1 class="text-3xl md:text-5xl font-bold text-green-800 mb-4 animate-slideInLeft">Halaman Admin Ruang Rapat</h1>
            <h1 class="text-2xl md:text-4xl font-bold text-green-800 animate-slideInLeft text-center">BAPPEDA ACEH</h1>
        </div>
    </div>

    <!-- Table Section -->
    <div class="container mx-auto py-6 px-16 mt-[-12rem] mt-5">
        <div class="heading-button-container">
            <div class="button-container">
                <a href="/Room">+ Ruang Rapat</a>
            </div>
            <div class="button-container">
                <a style="background-color:#2183a3" href="/viewrequest">Lihat Daftar Permintaan</a>
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

                @php
                $index=1;
                @endphp

                    @foreach ($ruang_rapat as $data)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $index++ }}</td>
                        <td class="py-2 px-4 border-b">{{ $data->nama }}</td>
                        <td class="py-2 px-4 border-b">{{ $data->lokasi }}</td>
                        <td class="py-2 px-4 border-b">{!! nl2br($data->fasilitas) !!}</td>
                        <td class="py-2 px-4 border-b">{{ $data->kapasitas }} orang</td>
                        <td class="py-2 px-4 border-b">
                            <ul class="bullet-list">
                                <li>Operator: {{ $data->operator }}</li>
                                <li>CS: {{ $data->cs }}</li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <a href="/Edit?id={{ $data->id }}" class="edit-button py-2 px-4 rounded-lg inline-block text-center">Edit</a>
                            <form action="{{ route('room.delete') }}" method="POST" style="display: inline;">
                                @csrf
                                <input type="hidden" name="id" value="{{ $data->id }}">
                                <button type="submit" class="delete-button py-2 px-4 rounded-lg inline-block text-center ml-2">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite('resources/js/app.js')
    @include('components/footer')
</body>
</html>
