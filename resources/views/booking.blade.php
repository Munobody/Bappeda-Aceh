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
            width: 200px;
            height: 200px;
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
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            text-align: center;
            transform: scale(0.8);
            animation: modalFadeIn 0.5s ease-out forwards;
        }

        .blurred {
            filter: blur(5px);
        }

         /* New CSS for centering the form */
         .centered-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 4rem); /* Adjust height based on header/footer */
            padding: 1rem;
        }

        .form-container {
            max-width: 600px;
            width: 100%;
        }


    </style>
</head>
<body>
    @include('/components/navbar')
            

<div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
               
                
  <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.5 11.5 11 14l4-4m6 2a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/>




                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Terimakasih, Mohon Tunggu Verifikasi!</h3>
                <button data-modal-hide="popup-modal" type="button" class="text-white bg-green-600 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                Tutup
                </button>

            </div>
        </div>
    </div>
</div>


    <div id="content" class="container mx-auto py-12 flex flex-col lg:flex-row items-center justify-center hero-section p-12">
        <div class=" p-4 lg:p-12">
            <h1 class="text-3xl md:text-5xl font-bold text-green-800 mb-4 animate-slideInLeft">Form Peminjaman Ruang Rapat</h1>
            <h1 class="text-2xl md:text-4xl font-bold text-green-800 mb-8 animate-slideInLeft delay-500">BAPPEDA ACEH</h1>
        </div>
    </div>
    
    <div class="container mx-auto max-w-lg bg-white p-8 rounded-lg shadow-lg mb-16">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Form Peminjaman Ruang Rapat</h2>
        <form id="bookingForm" action="/submit-room-booking" method="POST" enctype="multipart/form-data">
            <!-- Nama Bidang atau Bagian -->
            <div class="mb-4">
                <label for="nama-bidang" class="block text-gray-700 font-bold mb-2">Nama Penanggung Jawab</label>
                <input type="text" id="nama-penanggung-jawab" name="penanggung_jawab" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="nama-bidang" class="block text-gray-700 font-bold mb-2">Nama Bidang Penyelenggara</label>
                <input type="text" id="nama-bidang" name="nama_bidang" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <!-- Deskripsi Singkat Ruang Rapat -->
            <div class="mb-4">
                <label for="deskripsi" class="block text-gray-700 font-bold mb-2">Agenda Rapat</label>
                <textarea id="deskripsi" name="deskripsi" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required></textarea>
            </div>
            <!-- Tanggal Peminjaman -->
            <div class="mb-4">
                <label for="tanggal-mulai" class="block text-gray-700 font-bold mb-2">Tanggal Mulai Kegiatan Rapat</label>
                <input type="datetime-local" id="tanggal-mulai" name="tanggal_mulai" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <div class="mb-4">
                <label for="tanggal-akhir" class="block text-gray-700 font-bold mb-2">Tanggal Akhir Kegiatan Rapat</label>
                <input type="datetime-local" id="tanggal-akhir" name="tanggal_akhir" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            
            <!-- Upload File -->
            <div class="mb-4">
                <label for="file" class="block text-gray-700 font-bold mb-2">Upload Surat Permohonan</label>
                <input type="file" id="file" name="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
            </div>
            <!-- Submit Button -->
            <div class="mb-4">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Kirim</button>
            </div>
        </form>
    </div>

    <div class="container mx-auto px-4 py-6">
    <div class="overflow-x-auto">
        <table class="table-auto mx-auto w-full bg-white shadow-md rounded-lg">
            <thead>
                <tr class="bg-gray-100 border-b">
                    <th class="py-3 px-4 text-left">No</th>
                    <th class="py-3 px-4 text-left">Hari/Tanggal</th>
                    <th class="py-3 px-4 text-left">Jam</th>
                    <th class="py-3 px-4 text-left">Status</th>   
                </tr>
            </thead>
            <tbody>
                @php
                $index = 1;
                @endphp

                @foreach ($booking as $data)
                <tr class="border-b">
                    <td class="py-3 px-4">{{ $index++ }}</td>
                    <td class="py-3 px-4">{{ $data->jadwal_mulai_formatted }}</td>
                    <td class="py-3 px-4">{{ $data->jam }}</td>
                    <td class="py-3 px-4">{{ $data->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const disabledDates = @json($disabledDates);

        const tanggalMulaiInput = document.getElementById('tanggal-mulai');
        tanggalMulaiInput.addEventListener('change', function () {
            const selectedDate = new Date(this.value);
            const formattedDate = selectedDate.toISOString().split('T')[0]; // Format: YYYY-MM-DD

            // Check if the selected date is in the disabled dates
            if (disabledDates.includes(formattedDate)) {
                alert('Tanggal ini sudah digunakan.');
                this.value = ''; // Clear the input
            }
        });

        // Disable all dates in the disabledDates array
        tanggalMulaiInput.setAttribute('min', new Date().toISOString().split('T')[0]); // Set minimum date to today


        const tanggalAkhirInput = document.getElementById('tanggal-akhir');
        tanggalAkhirInput.addEventListener('change', function () {
            const selectedDate = new Date(this.value);
            const formattedDate = selectedDate.toISOString().split('T')[0]; // Format: YYYY-MM-DD

            // Check if the selected date is in the disabled dates
            if (disabledDates.includes(formattedDate)) {
                alert('Tanggal ini sudah digunakan.');
                this.value = ''; // Clear the input
            }
        });

        // Disable all dates in the disabledDates array
        tanggalAkhirInput.setAttribute('min', new Date().toISOString().split('T')[0]); // Set minimum date to today
    });
</script>

</body>
@include('components/footer')
</html>
