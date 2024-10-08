<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>View Requests</title>
    <link rel="icon" href="{{ asset('images/pancacita.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <style>
        html, body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* memastikan halaman minimal setinggi viewport */
            background: linear-gradient(90deg, #fff 0%, #fff 100%);
            background-size: 400% 400%;
            animation: waveBackgroundAnimation 10s ease infinite;
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

        .main-content {
            flex: 1;
            padding: 2rem;
            margin-top: 80px; /* Jarak agar tidak tertutup navbar */
        }

        .request-container {
            max-width: 1200px;
            margin: auto;
            padding: 2rem;
            background-color: #ffffff;
            border-radius: 0.5rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .request-table {
            width: 100%;
            border-collapse: collapse;
        }

        .request-table th, .request-table td {
            border: 1px solid #e5e7eb;
            padding: 1rem;
            text-align: left;
        }

        .request-table th {
            background-color: #f3f4f6;
        }

        .request-table tbody tr:nth-child(even) {
            background-color: #f9fafb;
        }

        .status-btn {
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            color: #ffffff;
            font-weight: bold;
            margin: 0.25rem; /* Spasi antara tombol */
        }

        .approve {
            background-color: #10b981;
        }

        .reject {
            background-color: #ef4444;
        }

        .approve:hover {
            background-color: #059669;
        }

        .reject:hover {
            background-color: #dc2626;
        }

        /* footer {
            background: #f3f4f6;
            padding: 1rem;
            text-align: center;
            border-top: 1px solid #e5e7eb;
            width: 100%; /* memastikan footer menggunakan lebar penuh */
            flex-shrink: 0; /* mencegah footer mengecil saat konten utama lebih sedikit */
        } */
    </style>
</head>
<body>
    @include('/components/navbar')

    <div class="main-content">
        <div class="request-container">
            <h1 class="text-3xl font-bold mb-6">Daftar Permintaan Peminjaman Ruang</h1>

            <form method="GET" action="{{ route('viewrequest') }}" class="mb-6">
            <div class="flex space-x-4">
                <select name="status" class="form-select">
                    <option value="">-- Semua Status --</option>
                    <option value="Disetujui" {{ request('status') === 'Disetujui' ? 'selected' : '' }}>Disetujui</option>
                    <option value="Ditolak" {{ request('status') === 'Ditolak' ? 'selected' : '' }}>Ditolak</option>
                    <option value="Menunggu" {{ request('status') === 'Menunggu' ? 'selected' : '' }}>Menunggu</option>
                </select>

                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
            </div>
        </form>



            <table class="request-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bidang</th>
                        <th>Penaggung Jawab</th>
                        <th>Agenda Rapat</th>
                        <th>Hari/Tanggal</th>
                        <th>Waktu</th>
                        <th>File</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example row, repeat for each request -->
                     @php
                     $index=1;
                     @endphp

                    @foreach ($booking as $data)
                    <tr>
        <td class="py-3 px-4">{{ $index++ }}</td>
        <td class="py-3 px-4">{{ $data->nama_bidang }}</td>
        <td class="py-3 px-4">{{ $data->penanggung_jawab }}</td>
        <td class="py-3 px-4">{{ $data->agenda }}</td>
        <td class="py-3 px-4">{{ $data->jadwal_mulai_formatted }}</td>
        <td class="py-3 px-4">{{ $data->jam }}</td><td class="py-3 px-4"><a href="/download?file={{ $data->surat }}"class="text-blue-500 hover:underline">Dokumen</a>
        
        <td class="py-2 px-4 border-b">
            @if($data->status === 'Disetujui')
                <div class="bg-green-100 text-green-800 border border-green-300 rounded px-3 py-1 text-sm">
                    Disetujui
                </div>
            @elseif($data->status === 'Ditolak')
                <div class="bg-red-100 text-red-800 border border-red-300 rounded px-3 py-1 text-sm">
                    Ditolak
                </div>
            @else
                <button class="status-btn approve" onclick="updateRequestStatus({{ $data->id }}, 'Disetujui')">Setuju</button>
                <button class="status-btn reject" onclick="updateRequestStatus({{ $data->id }}, 'Ditolak')">Tolak</button>
            @endif
        </td>
    </tr>
                    @endforeach
                    <!-- End of example row -->
                </tbody>
            </table>
        </div>
    </div>
        @include('components/footer')
        <script>
    function updateRequestStatus(id, status) {
        fetch('/booking/update-status', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ id: id, status: status })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Temukan baris dengan ID yang sesuai
                document.querySelectorAll('tr').forEach(row => {
                    // Temukan cell pertama yang berisi ID
                    const firstCell = row.querySelector('td:first-child');
                    if (firstCell && firstCell.innerText.trim() == id) {
                        const statusCell = row.querySelector('td:nth-child(8)');
                        if (statusCell) {
                            if (status === 'Disetujui') {
                                statusCell.innerHTML = '<div class="bg-green-100 text-green-800 border border-green-300 rounded px-3 py-1 text-sm">Disetujui</div>';
                            } else if (status === 'Ditolak') {
                                statusCell.innerHTML = '<div class="bg-red-100 text-red-800 border border-red-300 rounded px-3 py-1 text-sm">Ditolak</div>';
                            }
                        } else {
                            console.error('Status cell not found');
                        }
                    }
                });
            } else {
                alert('Update failed');
            }
        })
        .catch(error => console.error('Error:', error));
    }
</script>

    @vite('resources/js/app.js')
</body>
</html>
