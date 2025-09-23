
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SI-IRA | BAPPEDA ACEH</title>
  <link rel="icon" href="{{ asset('images/pancacita.png') }}" type="image/x-icon">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  @vite('resources/css/app.css')
  <style>
    :root {
      --primary-color: #16a34a; /* green-600 */
      --secondary-color: #15803d; /* green-700 */
      --dark-color: #166534; /* green-800 */
      --light-color: #dcfce7; /* green-100 */
      --accent-color: #86efac; /* green-300 */
    }

    * {
      font-family: 'Inter', system-ui, sans-serif;
      box-sizing: border-box;
    }

    body {
      background-color: #f9fafb;
      background-size: cover;
      transition: all 0.3s ease;
      margin: 0;
      padding: 0;
      min-height: 100vh;
    }

    .hero-section {
      background: linear-gradient(to bottom, rgba(220, 252, 231, 0.5), rgba(255, 255, 255, 0.9));
      border-radius: 16px;
      box-shadow: 0 10px 25px rgba(22, 101, 52, 0.05);
      margin: 6rem auto 2rem;
      overflow: hidden;
      padding: 3rem 1rem;
    }

    .badge-modern {
      background: var(--light-color);
      color: var(--dark-color);
      font-weight: 600;
      padding: 8px 16px;
      border-radius: 50px;
      font-size: 0.875rem;
      display: inline-flex;
      align-items: center;
      gap: 6px;
    }
    .booking-btn {
      background: var(--primary-color);
      color: white;
      padding: 14px 28px;
      border-radius: 50px;
      font-weight: 600;
      transition: all 0.3s ease;
      position: relative;
      overflow: hidden;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      box-shadow: 0 10px 20px rgba(22, 101, 52, 0.15);
      cursor: pointer;
      border: none;
    }
    
    .booking-btn:hover {
      background: var(--secondary-color);
      transform: translateY(-2px);
      box-shadow: 0 15px 25px rgba(22, 101, 52, 0.2);
    }
    
    .booking-btn::after {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%;
      top: 0;
      left: -100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: 0.5s;
    }
    
    .booking-btn:hover::after {
      left: 100%;
    }

    .timeline {
      position: relative;
      max-width: 1200px;
      margin: 0 auto;
      padding: 3rem 0;
      list-style: none;
    }

    .timeline::before {
      content: '';
      position: absolute;
      top: 0;
      left: 50%;
      transform: translateX(-50%);
      bottom: 0;
      width: 3px;
      background: linear-gradient(to bottom, var(--primary-color), var(--accent-color));
      border-radius: 3px;
      animation: draw 2s ease-out forwards;
    }

    .timeline li {
      position: relative;
      width: 50%;
      padding: 1.5rem;
      opacity: 0;
      transform: translateY(50px) scale(0.95);
      animation: fadeInSlideUpScale 1s forwards;
      animation-delay: calc(0.3s * var(--i));
    }

    .timeline li:nth-child(odd) {
      left: 0;
      text-align: right;
      transform-origin: right center;
    }

    .timeline li:nth-child(even) {
      left: 50%;
      text-align: left;
      transform-origin: left center;
    }

    .timeline li::before {
      content: '';
      position: absolute;
      top: 2rem;
      width: 20px;
      height: 20px;
      border-radius: 50%;
      background: white;
      border: 4px solid var(--primary-color);
      z-index: 10;
    }

    .timeline li::after {
      content: '';
      position: absolute;
      top: 2rem;
      width: 12px;
      height: 12px;
      border-radius: 50%;
      background: var(--accent-color);
      z-index: 11;
      animation: pulse 2s infinite;
    }

    .timeline li:nth-child(odd)::before {
      right: -0.75rem;
    }

    .timeline li:nth-child(odd)::after {
      right: -0.55rem;
      transform: translate(50%, 50%);
    }

    .timeline li:nth-child(even)::before {
      left: -0.75rem;
    }

    .timeline li:nth-child(even)::after {
      left: -0.55rem;
      transform: translate(-50%, 50%);
    }

    .timeline time {
      color: var(--dark-color);
      font-weight: 700;
      font-size: 1rem;
      display: block;
      margin-bottom: 0.25rem;
    }

    .timeline .timeline-content {
      padding: 1.5rem;
      background-color: #ffffff;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
      position: relative;
      margin: 1rem 0;
      transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
      border-left: 4px solid var(--primary-color);
    }

    .timeline .timeline-content:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 30px rgba(22, 101, 52, 0.15);
    }

    .timeline .timeline-content .location {
      color: #6b7280;
      font-style: normal;
      font-size: 0.875rem;
      display: flex;
      align-items: center;
      gap: 0.5rem;
    }

    .timeline .timeline-content .description {
      margin: 1rem 0;
      color: #4b5563;
      line-height: 1.5;
    }

    .waiting-list {
      max-width: 1200px;
      margin: 0 auto;
      padding: 2rem 1rem;
    }

    .waiting-list-table {
      width: 100%;
      border-collapse: separate;
      border-spacing: 0;
      border-radius: 0.75rem;
      overflow: hidden;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
    }

    .waiting-list-table th, .waiting-list-table td {
      padding: 1rem;
      text-align: left;
    }

    .waiting-list-table th {
      background-color: var(--primary-color);
      color: #fff;
      font-weight: 600;
    }

    .waiting-list-table tr:nth-child(even) {
      background-color: var(--light-color);
    }

    .waiting-list-table tr:not(:last-child) td {
      border-bottom: 1px solid #e5e7eb;
    }

    .waiting-list-table td {
      font-size: 0.9rem;
      color: #4b5563;
      padding: 1rem;
    }

    .waiting-list-table .department {
      font-weight: 600;
      color: #2d3748;
    }

    .waiting-list-table .date {
      color: var(--dark-color);
    }

    .waiting-list-table .time {
      color: var(--secondary-color);
    }

    .status-badge {
      display: inline-block;
      padding: 0.25rem 0.75rem;
      border-radius: 9999px;
      font-size: 0.75rem;
      font-weight: 600;
      text-align: center;
    }

    .status-pending {
      background-color: #fef3c7;
      color: #92400e;
    }

    .status-approved {
      background-color: #d1fae5;
      color: #065f46;
    }

    .status-rejected {
      background-color: #fee2e2;
      color: #b91c1c;
    }

    .section-title {
      position: relative;
      display: inline-block;
      font-weight: 700;
      color: var(--dark-color);
      margin-bottom: 2rem;
    }

    .section-title::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 0;
      width: 60%;
      height: 4px;
      background: var(--accent-color);
      border-radius: 4px;
    }

    /* Animation classes */
    .animate-fadeIn {
      animation: fadeIn 1s ease-in forwards;
    }

    @keyframes fadeIn {
      from { opacity: 0; }
      to { opacity: 1; }
    }

    @keyframes pulse {
      0% {
        box-shadow: 0 0 0 0 rgba(134, 239, 172, 0.6);
      }
      70% {
        box-shadow: 0 0 0 10px rgba(134, 239, 172, 0);
      }
      100% {
        box-shadow: 0 0 0 0 rgba(134, 239, 172, 0);
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

    .animate-bounce {
      animation: bounce 2s infinite;
    }

    @keyframes bounce {
      0%, 20%, 50%, 80%, 100% {
        transform: translateY(0);
      }
      40% {
        transform: translateY(-15px);
      }
      60% {
        transform: translateY(-7px);
      }
    }
    
    /* Responsive adjustments */
    @media (max-width: 768px) {
      .timeline::before {
        left: 2rem;
      }
      
      .timeline li {
        width: 100%;
        left: 0 !important;
        text-align: left !important;
        padding-left: 3rem;
      }
      
      .timeline li::before {
        left: 1rem !important;
        right: auto !important;
      }
      
      .timeline li::after {
        left: 1.2rem !important;
        right: auto !important;
        transform: translate(-50%, 50%) !important;
      }

      .waiting-list {
        padding: 2rem 0.5rem;
      }

      .waiting-list-table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
      }
    }

    /* Custom scrollbar for consistency */
    .scrollbar-custom::-webkit-scrollbar {
      width: 6px;
    }
    
    .scrollbar-custom::-webkit-scrollbar-track {
      background: rgba(22, 101, 52, 0.05);
      border-radius: 10px;
    }
    
    .scrollbar-custom::-webkit-scrollbar-thumb {
      background: var(--accent-color);
      border-radius: 10px;
    }
  </style>
</head>
<body class="scrollbar-custom">
  @include('components.navbar')
  
  <div class="container mx-auto py-12 px-4">
    <!-- Hero Section -->
    <div class="hero-section flex flex-col items-center justify-center text-center py-16 px-4">
      <div class="badge-modern mb-6 animate-fadeIn">
        Sistem Informasi Reservasi Ruang Rapat
      </div>
      <h1 class="text-4xl md:text-6xl font-bold text-green-800 mb-4">SI-IRA</h1>
      <h2 class="text-xl md:text-2xl font-semibold text-green-700 mb-6">BAPPEDA ACEH</h2>
      <p class="text-gray-600 max-w-lg mx-auto mb-8">
        Platform reservasi ruang rapat untuk memudahkan koordinasi dan pengelolaan jadwal pertemuan di lingkungan BAPPEDA Aceh.
      </p>
      <a href="/request" class="booking-btn animate-bounce">
        <span>Booking Meeting Room</span>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
        </svg>
      </a>
    </div>
    
    <!-- Timeline Section -->
    <div class="mt-16 mb-12">
      <h2 class="section-title text-2xl md:text-3xl text-center mx-auto">Jadwal Rapat Mendatang</h2>
      
      <ul class="timeline">
        @php $index=1; @endphp
        @foreach($booking as $data)
          @if($index > 5) @php break @endphp @endif
          <li style="--i: {{$index++}}">
            <div class="timeline-content">
              <time datetime="{{ $data->jadwal_mulai_formatted }}">{{ $data->jadwal_mulai_formatted }}</time>
              <p class="location">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                {{ $data->jam }}
              </p>
              <h3 class="text-xl font-bold text-green-800 mt-2">{{ $data->nama_bidang }}</h3>
              <p class="location mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                </svg>
                {{ $data->RuangRapat->nama }}
              </p>
              <p class="description">{{ $data->agenda }}</p>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
    
    <!-- Waiting List Section -->
    <div class="waiting-list">
      <h2 class="section-title text-2xl md:text-3xl mb-6">Waiting List</h2>
      
      <div class="overflow-hidden rounded-lg shadow bg-white">
        <div class="overflow-x-auto">
          <table class="waiting-list-table">
            <thead>
              <tr>
                <th>No</th>
                <th>Judul Rapat</th>
                <th>Bidang</th>
                <th>Ruang Rapat</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Status</th>   
              </tr>
            </thead>
            <tbody>
              @php
              $row = 0;
              $index = 1;
              @endphp

              @foreach ($booking as $data)
                @php
                if($row < 5){
                  $row++;
                  continue;
                }
                @endphp
                <tr>
                  <td>{{ $index++ }}</td>
                  <td class="font-medium">{{ $data->agenda }}</td>
                  <td class="department">{{ $data->nama_bidang }}</td>
                  <td>{{ $data->RuangRapat->nama }}</td>
                  <td class="date">{{ $data->jadwal_mulai_formatted }}</td>
                  <td class="time">{{ $data->jam }}</td>
                  <td>
                    <span class="status-badge {{ $data->status == 'pending' ? 'status-pending' : ($data->status == 'approved' ? 'status-approved' : 'status-rejected') }}">
                      {{ ucfirst($data->status) }}
                    </span>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  
  @include('components.footer')

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Make timeline items appear with scroll
      const timelineItems = document.querySelectorAll('.timeline li');
      
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.style.animationPlayState = 'running';
          }
        });
      }, {
        threshold: 0.1
      });
      
      timelineItems.forEach(item => {
        item.style.animationPlayState = 'paused';
        observer.observe(item);
      });
      
      // Apply saved theme on page load if it exists
      const savedTheme = localStorage.getItem('theme') || 'light';
      if (typeof setTheme === 'function') {
        setTheme(savedTheme);
      }
    });
  </script>
</body>
</html>