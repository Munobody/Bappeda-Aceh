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
      animation: draw 2s ease-out forwards; /* Animate the line */
    }

    .timeline li {
      position: relative;
      width: 50%;
      padding: 1rem;
      opacity: 0; /* Start hidden */
      transform: translateY(50px) scale(0.95); /* Initial slide-in and scale effect */
      animation: fadeInSlideUpScale 1s forwards; /* Apply animation */
      animation-delay: calc(0.3s * var(--i)); /* Stagger animation delay */
    }

    .timeline li:nth-child(odd) {
      left: 0;
      text-align: right;
      transform-origin: right center; /* Transform origin for odd items */
    }

    .timeline li:nth-child(even) {
      left: 50%;
      text-align: left;
      transform-origin: left center; /* Transform origin for even items */
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

    .timeline .timeline-content .description {
      margin: 1rem 0;
    }

    .waiting-list {
      max-width: 1200px;
      margin: 0 auto;
      padding: 2rem 0;
    }

    .waiting-list-table {
      width: 100%;
      border-collapse: collapse;
      border-radius: 0.75rem; /* Rounded corners */
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Shadow effect */
    }

    .waiting-list-table th, .waiting-list-table td {
      padding: 1rem;
      text-align: left;
      border-bottom: 1px solid #d1d5db; /* Gray-300 */
    }

    .waiting-list-table th {
      background-color: #34d399; /* Green-400 */
      color: #fff;
    }

    .waiting-list-table tr:nth-child(even) {
      background-color: #d1fae5; /* Green-100 */
    }

    .waiting-list-table td {
      font-size: 0.875rem;
      color: #4b5563; /* Gray-700 */
    }

    .waiting-list-table .department {
      font-weight: bold;
      color: #2d3748; /* Gray-800 */
    }

    .waiting-list-table .date {
      color: #4f46e5; /* Indigo-500 */
    }

    .waiting-list-table .time {
      color: #22c55e; /* Green-500 */
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

    @keyframes fadeInSlideUpScale {
      0% {
        opacity: 0;
        transform: translateY(50px) scale(0.95);
      }
      50% {
        opacity: 0.5;
        transform: translateY(-10px) scale(1.02);
      }
      100% {
        opacity: 1;
        transform: translateY(0) scale(1);
      }
    }

    @keyframes draw {
      0% {
        height: 0;
      }
      100% {
        height: 100%;
      }
    }
  </style>
</head>
<body>
@include('/components/navbar') 
<div class="container mx-auto py-12 flex items-center justify-center hero-section">
    <div class="text-center flex-1 p-4 lg:p-12">
        <h1 class="text-3xl md:text-5xl font-bold text-green-800 mb-4 animate-slideInLeft">Si - IRA</h1>
        <h1 class="text-2xl md:text-4xl font-bold text-green-800 mb-8 animate-slideInLeft delay-500">BAPPEDA ACEH</h1>
    </div>
</div>

 

    <ul class="timeline">
      <li style="--i: 1">
        <div class="timeline-content">
          <time datetime="2024-08-02">02 Agustus 2024</time>
          <h2 class="text-xl font-bold">Rapat Koordinasi</h2>
          <p class="location">Ruang Rapat 1</p>
          <p class="description">Deskripsi rapat koordinasi dengan pihak terkait mengenai rencana anggaran.</p>
        </div>
      </li>
      <li style="--i: 2">
        <div class="timeline-content">
          <time datetime="2024-08-05">05 Agustus 2024</time>
          <h2 class="text-xl font-bold">Evaluasi Proyek</h2>
          <p class="location">Ruang Rapat 2</p>
          <p class="description">Evaluasi perkembangan proyek yang sedang berlangsung dan perencanaan kedepannya.</p>
        </div>
      </li>
      <li style="--i: 3">
        <div class="timeline-content">
          <time datetime="2024-08-10">10 Agustus 2024</time>
          <h2 class="text-xl font-bold">Rapat Konsultasi</h2>
          <p class="location">Ruang Rapat 3</p>
          <p class="description">Konsultasi dengan para ahli mengenai kebijakan dan strategi pengembangan.</p>
        </div>
      </li>
      <li style="--i: 4">
        <div class="timeline-content">
          <time datetime="2024-08-15">15 Agustus 2024</time>
          <h2 class="text-xl font-bold">Penyusunan Rencana</h2>
          <p class="location">Ruang Rapat 4</p>
          <p class="description">Penyusunan rencana kerja untuk bulan berikutnya.</p>
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

  <!-- Waiting List Section -->
  <div class="waiting-list container mx-auto py-12">
    <h2 class="text-2xl md:text-4xl font-bold mb-8 text-green-800 text-center">Waiting List</h2>
    <table class="waiting-list-table mx-auto">
      <thead>
        <tr>
          <th class="text-left">No.</th>
          <th class="text-left">Nama Departemen</th>
          <th class="text-left">Tanggal</th>
          <th class="text-left">Waktu</th>
          <th class="text-left">Deskripsi</th>
        </tr>
      </thead>
      <tbody>
        <!-- Example rows -->
        <tr>
          <td>1</td>
          <td class="department">Departemen A</td>
          <td class="date">01 Agustus 2024</td>
          <td class="time">08:00 - 10:00</td>
          <td>Rapat internal untuk evaluasi.</td>
        </tr>
        <tr>
          <td>2</td>
          <td class="department">Departemen B</td>
          <td class="date">03 Agustus 2024</td>
          <td class="time">10:00 - 12:00</td>
          <td>Diskusi proyek baru.</td>
        </tr>
        <tr>
          <td>3</td>
          <td class="department">Departemen C</td>
          <td class="date">07 Agustus 2024</td>
          <td class="time">13:00 - 15:00</td>
          <td>Rapat persiapan event.</td>
        </tr>
        <tr>
          <td>4</td>
          <td class="department">Departemen D</td>
          <td class="date">09 Agustus 2024</td>
          <td class="time">15:00 - 17:00</td>
          <td>Review dan perencanaan strategi.</td>
        </tr>
      </tbody>
    </table>
  </div>
</body>
@include('components/footer')
</html>
