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
    .timeline {
      padding-left: 200px;
      position: relative;
      max-width: 1200px; /* Maximum width for the timeline container */
      margin: 0 auto; /* Center the timeline */
      padding: 2rem 0;
      list-style: none;
    }
    .timeline:before {
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
      padding: 1rem; /* Reduced padding */
    }
    .timeline li:nth-child(odd) {
      left: 0;
      text-align: right;
    }
    .timeline li:nth-child(even) {
      left: 50%;
      text-align: left;
    }
    .timeline li:before {
      content: '';
      position: absolute;
      top: 1.5rem;
      width: 1.5rem; /* Larger dot */
      height: 1.5rem; /* Larger dot */
      border-radius: 50%;
      background-color: #4f46e5; /* Indigo-500 */
      border: 4px solid #fff; /* Larger border */
      z-index: 10;
    }
    .timeline li:nth-child(odd):before {
      right: -0.75rem; /* Adjust position for larger dot */
    }
    .timeline li:nth-child(even):before {
      left: -0.75rem; /* Adjust position for larger dot */
    }
    .timeline time {
      color: #4f46e5; /* Indigo-500 */
      font-weight: bold;
      font-size: 1.125rem; /* Larger font size */
    }
    .timeline .timeline-content {
      padding: 1.5rem; /* Adjusted padding */
      background-color: #f9fafb; /* Gray-50 */
      border-radius: 0.75rem; /* Larger border radius */
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Larger shadow */
      position: relative;
      margin-bottom: 1.5rem; /* Adjusted margin */
      font-size: 1rem; /* Adjusted font size */
      width: 800px; /* Increased width to make cards rectangular */
      max-width: 100%; /* Ensure the card does not overflow the container */
    }
    .timeline .timeline-content .location {
      color: #6b7280; /* Gray-600 */
      font-style: italic;
      font-size: 0.875rem; /* Smaller font size */
    }
  </style>
</head>
<body>
  @include('components/navbar')

  <div class="hero min-h-screen">
    <div class="hero-overlay bg-opacity-60"></div>
    <div class="hero-content text-neutral-content text-center flex flex-col justify-center items-center px-4">
      <div class="max-w-md">
        <h1 class="mb-5 text-4xl md:text-5xl font-bold">Hello there</h1>
        <p class="mb-5 text-sm md:text-base">
          Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem
          quasi. In deleniti eaque aut repudiandae et a id nisi.
        </p>
        <button class="btn btn-primary">Get Started</button>
      </div>
    </div>
  </div>
<div class="mt-20">
  @include('components/carousel')
  </div>

<div class="container mx-auto text-center p-4">
    <h2 class="text-2xl font-bold text-green-800 mb-4">Some count that matters</h2>
    <p class="text-gray-600 mb-8">Our achievement in the journey depicted in numbers</p>
    <div class="flex flex-wrap justify-center space-x-0 lg:space-x-16 text-green-800">
        <div class="text-center mb-6 w-1/2 lg:w-auto">
            <div class="text-4xl font-bold">192</div>
            <div>Pegawai</div>
        </div>
        <div class="text-center mb-6 w-1/2 lg:w-auto">
            <div class="text-4xl font-bold">300+</div>
            <div>Taken business legalities</div>
        </div>
        <div class="text-center w-1/2 lg:w-auto">
            <div class="text-4xl font-bold">50</div>
            <div>Years of Journey</div>
        </div>
    </div>
</div>
<div class="container mx-auto py-12 mt-20">
    <div class="text-center p-4">
    <h1 class="text-3xl md:text-5xl font-bold text-green-800 mb-4" style="text-shadow: 1px 1px 0 #ffffff, -1px -1px 0 #ffffff, 1px -1px 0 #ffffff, -1px 1px 0 #ffffff;">
  Agenda Rapat
</h1>
<h1 class="text-2xl md:text-4xl font-bold text-green-800 mb-8" style="text-shadow: 1px 1px 0 #ffffff, -1px -1px 0 #ffffff, 1px -1px 0 #ffffff, -1px 1px 0 #ffffff;">
  BAPPEDA ACEH
</h1>
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
          <div class="text-lg font-bold">Bidang Umum</div>
          <p>Peminjaman Barang Pegawai BAPPEDA</p>
          <div class="location">Ruang Rapat VIP</div>
        </div>
      </li>
    </ul>
  </div>

  @include('components/footer')

</body>
</html>
