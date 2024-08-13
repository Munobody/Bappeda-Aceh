<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User request page</title>
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

    <!-- Table Section -->
    <div class="container mx-auto py-6 px-4 mt-24"> <!-- Reduced py-10 to py-6 -->
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

                @php
                $index=1;
                @endphp

                

                    @foreach ($ruang_rapat as $data)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $index++}}</td>
                        <td class="py-2 px-4 border-b">{{$data->nama}}</td>
                        <td class="py-2 px-4 border-b">{{$data->lokasi}}</td>
                        <td class="py-2 px-4 border-b">{!! nl2br($data->fasilitas) !!} </td>
                        <td class="py-2 px-4 border-b">{{$data->kapasitas}} orang</td>
                        <td class="py-2 px-4 border-b">
                            <ul class="bullet-list">
                                <li>Operator : {{$data->operator}}</li>
                                <li>Cs : {{$data->cs}}</li>
                            </ul>
                        </td>
                        <td class="py-2 px-4 border-b">
                        <a href="/booking?id={{$data->id}}" class="bg-green-500 text-white py-2 px-4 rounded-full hover:bg-green-600 inline-block text-center">Booking</a>
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

