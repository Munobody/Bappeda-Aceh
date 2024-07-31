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
    .timeline-container {
      position: relative;
      padding-left: 1.5rem;
    }
    .timeline-item {
      position: relative;
      margin-bottom: 1.5rem;
      padding-left: 1.5rem; /* Add padding to ensure content is not covered */
    }
    .timeline-item::before {
      content: "";
      position: absolute;
      left: 0;
      top: 0;
      width: 0.25rem;
      height: 100%;
      background-color: #ddd;
      z-index: 0; /* Ensure the timeline line is behind the content */
    }
    .timeline-item-content {
      position: relative;
      z-index: 1; /* Ensure the content is above the timeline line */
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
      bottom: 125%; /* Position above the tooltip */
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

  <!-- Timeline Section -->
  <div class="container mx-auto py-12 flex flex-col lg:flex-row items-center justify-center hero-section">
        <div class="text-left flex-1 p-4 lg:p-12">
            <h1 class="text-3xl md:text-5xl font-bold text-green-800 mb-4 animate-slideInLeft">Agenda Rapat</h1>
            <h1 class="text-2xl md:text-4xl font-bold text-green-800 mb-8 animate-slideInLeft delay-500">BAPPEDA ACEH</h1>
            <a href="/request" class="bg-green-500 text-white py-3 px-8 rounded-full animate-bounce">Booking Meeting Room</a>
        </div>
    </div>

  <div class="timeline-container mt-[-4rem]">
    <ol class="relative border-l border-gray-200 dark:border-gray-700">
      <li class="timeline-item">
        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">02 Agustus 2024, 08:00 - 10:00</time>
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Bidang Umum</h3>
        <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Peminjaman Barang Pegawai BAPPEDA</p>
        <div class="tooltip">
          <span class="tooltiptext">Ruang Rapat VIP</span>
          <span class="text-green-500 font-medium">Ruang Rapat VIP</span>
        </div>
      </li>
      <li class="timeline-item">
        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">03 Agustus 2024, 10:00 - 12:00</time>
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Bidang Kepegawaian</h3>
        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Rapat Evaluasi Rencana Pembangunan</p>
        <div class="tooltip">
          <span class="tooltiptext">Ruang Rapat Utama</span>
          <span class="text-gray-600 font-medium">Ruang Rapat Utama</span>
        </div>
      </li>
      <li class="timeline-item">
        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">04 Agustus 2024, 15.00 - 17.00</time>
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Bidang Perencanaan</h3>
        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Rapat Sosialisasi Program Pembangunan</p>
        <div class="tooltip">
          <span class="tooltiptext">Ruang Rapat Executive</span>
          <span class="text-gray-600 font-medium">Ruang Rapat Executive</span>
        </div>
      </li>
      <li class="timeline-item">
        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">05 Agustus 2024, 08.00 - 10.00</time>
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Bidang Perencanaan</h3>
        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Rapat Penyusunan Rencana Kerja</p>
        <div class="tooltip">
          <span class="tooltiptext">Ruang Rapat VIP</span>
          <span class="text-gray-600 font-medium">Ruang Rapat VIP</span>
        </div>
      </li>
      <li class="timeline-item">
        <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
        <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">05 Agustus 2024, 15.00 - 17.00</time>
        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Bidang Perencanaan</h3>
        <p class="text-base font-normal text-gray-500 dark:text-gray-400">Rapat Sosialisasi Program Pembangunan</p>
        <div class="tooltip">
          <span class="tooltiptext">Ruang Rapat Executive</span>
          <span class="text-gray-600 font-medium">Ruang Rapat Executive</span>
        </div>
      </li>
    </ol>
  </div>

   <!-- YouTube Video Section -->
   <div class="flex justify-center py-10 px-10">
    <div class="video-container">
      <iframe src="https://www.youtube.com/embed/RztA43D8330" frameborder="0" allowfullscreen></iframe>
    </div>
  </div>

  @include('components/footer')

</body>
</html>
