<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BAPPEDA ACEH</title>
  <link rel="icon" href="{{ asset('images/pancacita.png') }}" type="image/x-icon">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.3.1/dist/full.css" rel="stylesheet">
  <style>
    .hero {
      background-image: url('{{ asset('images/kantor.jpg') }}');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
    }

    .timeline {
      position: relative;
      max-width: 1200px;
      margin: 0 auto;
      padding: 2rem 0;
      list-style: none;
    }

    .timeline::before {
      content: '';
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      bottom: 0;
      width: 2px;
      background-color: #d1d5db; /* Gray-300 */
    }

    .timeline li {
      position: relative;
      width: 50%;
      padding: 1rem;
    }

    .timeline li:nth-child(odd) {
      left: 0;
      text-align: right;
    }

    .timeline li:nth-child(even) {
      left: 50%;
      text-align: left;
    }

    .timeline li::before {
      content: '';
      position: absolute;
      top: 1.5rem;
      width: 1.5rem;
      height: 1.5rem;
      border-radius: 50%;
      background-color: #4f46e5; /* Indigo-500 */
      border: 4px solid #fff;
      z-index: 10;
    }

    .timeline li:nth-child(odd)::before {
      right: -0.75rem;
    }

    .timeline li:nth-child(even)::before {
      left: -0.75rem;
    }

    .timeline time {
      color: #4f46e5; /* Indigo-500 */
      font-weight: bold;
      font-size: 1.125rem;
    }

    .timeline .timeline-content {
      padding: 1.5rem;
      background-color: #f9fafb; /* Gray-50 */
      border-radius: 0.75rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      position: relative;
      margin-bottom: 1.5rem;
      font-size: 1rem;
      width: 100%;
      max-width: 800px;
      margin-left: auto;
      margin-right: auto;
    }

    .timeline .timeline-content .location {
      color: #6b7280; /* Gray-600 */
      font-style: italic;
      font-size: 0.875rem;
    }

    .tooltip {
      position: relative;
      display: inline-block;
    }

    .tooltip .tooltiptext {
      visibility: hidden;
      width: 120px;
      background-color: #555;
      color: #fff;
      text-align: center;
      border-radius: 5px;
      padding: 5px 0;
      position: absolute;
      z-index: 1;
      bottom: 125%;
      left: 50%;
      margin-left: -60px;
      opacity: 0;
      transition: opacity 0.3s;
    }

    .tooltip:hover .tooltiptext {
      visibility: visible;
      opacity: 1;
    }

    .animate-slideInLeft {
      animation: slideInLeft 1s ease-out;
    }

    @keyframes slideInLeft {
      0% {
        transform: translateX(-100%);
        opacity: 0;
      }
      100% {
        transform: translateX(0);
        opacity: 1;
      }
    }

    .animate-bounce {
      animation: bounce 1s infinite;
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

    /* Custom styles for the table */
    .table {
      width: 100%;
      border-collapse: collapse;
    }

    .table th, .table td {
      padding: 0.75rem;
      text-align: left;
      border-bottom: 1px solid #e5e7eb; /* Gray-200 */
    }

    .table thead {
      background-color: #f3f4f6; /* Gray-100 */
    }

    .table th {
      font-weight: bold;
      color: #4b5563; /* Gray-700 */
    }

    .table tbody tr:nth-of-type(odd) {
      background-color: #f9fafb; /* Gray-50 */
    }

    .table tbody tr:hover {
      background-color: #e5e7eb; /* Gray-200 */
    }
  </style>
</head>
<body>
  @include('components/navbar')

  <!-- Timeline Section -->
  <div class="container mx-auto py-12 mt-20">
    <div class="text-center p-4">
      <h1 class="text-3xl md:text-5xl font-bold text-green-800 mb-4" style="text-shadow: 1px 1px 0 #ffffff, -1px -1px 0 #ffffff, 1px -1px 0 #ffffff, -1px 1px 0 #ffffff;">
        Si - IRA
      </h1>
      <h1 class="text-2xl md:text-4xl font-bold text-green-800 mb-8" style="text-shadow: 1px 1px 0 #ffffff, -1px -1px 0 #ffffff, 1px -1px 0 #ffffff, -1px 1px 0 #ffffff;">
        BAPPEDA ACEH
      </h1>
      <a href="/request" class="bg-green-500 text-white py-3 px-8 rounded-full animate-bounce">Booking Meeting Room</a>
    </div>

    <ul class="timeline">
      <li>
        <div class="timeline-content">
          <time>05 Agustus 2024, 15:00 - 17:00</time>
          <div class="text-lg font-bold">Bidang Perencanaan</div>
          <p>Rapat Sosialisasi Program Pembangunan</p>
          <div class="location">Ruang Rapat Executive</div>
        </div>
      </li>
      <li>
        <div class="timeline-content">
          <time>05 Agustus 2024, 08:00 - 10:00</time>
          <div class="text-lg font-bold">Bidang Perencanaan</div>
          <p>Rapat Penyusunan Rencana Kerja</p>
          <div class="location">Ruang Rapat VIP</div>
        </div>
      </li>
      <li>
        <div class="timeline-content">
          <time>04 Agustus 2024, 15:00 - 17:00</time>
          <div class="text-lg font-bold">Bidang Perencanaan</div>
          <p>Rapat Sosialisasi Program Pembangunan</p>
          <div class="location">Ruang Rapat Executive</div>
        </div>
      </li>
      <li>
        <div class="timeline-content">
          <time>03 Agustus 2024, 10:00 - 12:00</time>
          <div class="text-lg font-bold">Bidang Kepegawaian</div>
          <p>Rapat Evaluasi Rencana Pembangunan</p>
          <div class="location">Ruang Rapat Utama</div>
        </div>
      </li>
      <li>
        <div class="timeline-content">
          <time>02 Agustus 2024, 08:00 - 10:00</time>
          <div class="text-lg font-bold">Bidang Keuangan</div>
          <p>Rapat Evaluasi Kinerja Keuangan</p>
          <div class="location">Ruang Rapat Utama</div>
        </div>
      </li>
    </ul>
  </div>

  <!-- Waiting List Section -->
  <div class="container mx-auto py-12">
    <h2 class="text-2xl md:text-3xl font-bold text-green-800 mb-4">Waiting List Booking</h2>
    <div class="overflow-x-auto">
      <table class="table">
        <thead>
          <tr>
            <th class="py-3 px-4">No</th>
            <th class="py-3 px-4">Judul Rapat</th>
            <th class="py-3 px-4">Bidang</th>
            <th class="py-3 px-4">Nama Ruang Rapat</th>
            <th class="py-3 px-4">Hari/Tanggal</th>
            <th class="py-3 px-4">Jam</th>
            <th class="py-3 px-4">Status</th>   
          </tr>
        </thead>
        <tbody>
          <!-- Example Row -->

          @php
          $index=1;
          @endphp

           @foreach ($booking as $data)
           <tr>
            <td class="py-3 px-4">{{ $index++}}</td>
            <td class="py-3 px-4">{{ $data->agenda}}</td>
            <td class="py-3 px-4">{{ $data->nama_bidang}}</td>
            <td class="py-3 px-4">{{ $data->RuangRapat->nama}}</td>
            <td class="py-3 px-4">{{$data->jadwal_mulai_formatted}}</td>
            <td class="py-3 px-4">{{$data->jam}}</td>
            <td class="py-3 px-4">{{$data->status}}</td>
          </tr>
           @endforeach
        
          
          <!-- Additional rows as needed -->
        </tbody>
      </table>
    </div>
  </div>

  @include('components/footer')
</body>
</html>
