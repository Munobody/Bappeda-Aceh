<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        footer {
            background: #f3f4f6;
            padding: 1rem;
            text-align: center;
            border-top: 1px solid #e5e7eb;
        }
    </style>
</head>
<body>
    @include('/components/navbar')

    <div class="main-content">
        <div class="request-container">
            <h1 class="text-3xl font-bold mb-6">View Room Booking Requests</h1>

            <table class="request-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Bidang</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Jam</th>
                        <th>File</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Example row, repeat for each request -->
                    <tr>
                        <td>1</td>
                        <td>Bidang A</td>
                        <td>Deskripsi singkat</td>
                        <td>2024-08-01</td>
                        <td>10:00-12:00</td>
                        <td><a href="{{ asset('path/to/document.pdf') }}" target="_blank" class="text-blue-500">Lihat File</a></td>
                        <td><span class="text-gray-500">Pending</span></td>
                        <td>
                            <button class="status-btn approve" onclick="updateRequestStatus(1, 'approved')">Approve</button>
                            <button class="status-btn reject" onclick="updateRequestStatus(1, 'rejected')">Reject</button>
                        </td>
                    </tr>
                    <!-- End of example row -->
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        @include('components/footer')
    </footer>

    <script>
        function updateRequestStatus(requestId, status) {
            // Implement the logic to update request status, e.g., send AJAX request to server
            console.log(`Request ${requestId} is ${status}`);
        }
    </script>

    @vite('resources/js/app.js')
</body>
</html>
