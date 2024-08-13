<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Permintaan Peminjaman Ruang</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        body {
            font-family: 'Roboto', sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #f3f4f6;
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #e5e7eb;
        }
        .content {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .footer {
            text-align: center;
            padding: 10px;
            font-size: 14px;
            color: #6b7280;
        }
        .list-item {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1 class="text-2xl font-bold text-gray-900">Notifikasi Permintaan Peminjaman Ruang</h1>
        </div>
        <div class="content">
            <p class="text-lg text-gray-700">Halo Admin,</p>
            <p class="text-gray-600">Anda memiliki permintaan peminjaman ruang baru:</p>
            <ul class="list-disc list-inside mt-4">
                <li class="list-item"><strong>Nama Bidang:</strong> {{ $booking->nama_bidang }}</li>
                <li class="list-item"><strong>Penanggung Jawab:</strong> {{ $booking->penanggung_jawab }}</li>
                <li class="list-item"><strong>Agenda Rapat:</strong> {{ $booking->agenda }}</li>
                <li class="list-item"><strong>Hari/Tanggal:</strong> {{ $booking->jadwal_mulai_formatted }}</li>
                <li class="list-item"><strong>Waktu:</strong> {{ $booking->jam }}</li>
            </ul>
            <p class="mt-4 text-gray-600">Silakan periksa aplikasi untuk detail lebih lanjut.</p>
        </div>
        <div class="footer">
            <p>Terima kasih,</p>
            <p>Tim Pengelola Ruang Rapat</p>
        </div>
    </div>
</body>
</html>

</html>