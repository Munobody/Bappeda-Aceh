<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAPPEDA ACEH</title>
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

    .container {
        width: 100%;
        max-width: 1280px;
        margin: 0 auto;
        padding: 0 1rem;
    }

    .hero-section {
        background: linear-gradient(to bottom, rgba(220, 252, 231, 0.5), rgba(255, 255, 255, 0.9));
        border-radius: 16px;
        box-shadow: 0 10px 25px rgba(22, 101, 52, 0.05);
        margin: 6rem auto 2rem;
        overflow: hidden;
        padding: 3rem 1rem;
    }

    .card-modern {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
        transition: all 0.3s cubic-bezier(0.165, 0.84, 0.44, 1);
        border-left: 4px solid var(--primary-color);
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .card-modern:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(22, 101, 52, 0.15);
    }
    
    .button-modern {
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
    
    .button-modern:hover {
        background: var(--secondary-color);
        transform: translateY(-2px);
        box-shadow: 0 15px 25px rgba(22, 101, 52, 0.2);
    }
    
    .button-modern::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: -100%;
        background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
        transition: 0.5s;
    }
    
    .button-modern:hover::after {
        left: 100%;
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
    
    .badge-modern::before {
        content: '🚀';
        font-size: 1rem;
    }

    .timeline-wrapper {
        position: relative;
        width: 100%;
        max-width: 1200px;
        margin: 0 auto;
    }

    .timeline-dot {
        background: white;
        border: 4px solid var(--primary-color);
        width: 20px;
        height: 20px;
        border-radius: 50%;
        position: relative;
        z-index: 2;
    }
    
    .timeline-dot::after {
        content: '';
        position: absolute;
        width: 12px;
        height: 12px;
        background: var(--accent-color);
        border-radius: 50%;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        animation: pulse 2s infinite;
    }
    
    .timeline-line {
        width: 3px;
        background: linear-gradient(to bottom, var(--primary-color), var(--accent-color));
        border-radius: 3px;
        position: absolute;
        top: 0;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1;
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

    @keyframes slideDown {
        from {
            max-height: 0;
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            max-height: 5000px;
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes fadeInTimeline {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .timeline-container {
        overflow: hidden;
        max-height: 0;
        opacity: 0;
        transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
        width: 100%;
        padding: 2rem 0;
    }

    .timeline-container.show {
        animation: slideDown 0.8s cubic-bezier(0.4, 0, 0.2, 1) forwards;
        opacity: 1;
    }

    .timeline-grid {
        display: grid;
        grid-template-columns: 1fr 60px 1fr;
        gap: 0;
        position: relative;
    }

    .timeline-item {
        opacity: 0;
        padding: 1rem;
        margin-bottom: 2rem;
    }

    .timeline-item.show {
        animation: fadeInTimeline 0.6s cubic-bezier(0.4, 0, 0.2, 1) forwards;
    }
    
    .timeline-left {
        grid-column: 1 / 2;
        grid-row: auto;
        padding-right: 2rem;
        text-align: right;
    }
    
    .timeline-center {
        grid-column: 2 / 3;
        grid-row: auto;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
    }
    
    .timeline-right {
        grid-column: 3 / 4;
        grid-row: auto;
        padding-left: 2rem;
        text-align: left;
    }
    
    .icon-container {
        width: 48px;
        height: 48px;
        background: var(--light-color);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
        font-size: 1.5rem;
        transition: all 0.3s ease;
    }

    .card-modern:hover .icon-container {
        transform: scale(1.1) rotate(5deg);
        background: var(--accent-color);
    }
    
    .logo-container {
        background: white;
        border-radius: 16px;
        padding: 20px;
        box-shadow: 0 10px 25px rgba(22, 101, 52, 0.1);
        transition: transform 0.3s ease;
        display: inline-block;
    }
    
    .logo-container:hover {
        transform: scale(1.05);
    }
    
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

    .card-content {
        display: flex;
        flex-direction: column;
        height: 100%;
        justify-content: space-between;
    }

    .card-footer {
        margin-top: auto;
        padding-top: 1rem;
    }

    /* Animation classes */
    .animate-fadeIn {
        animation: fadeIn 1s ease-in forwards;
    }

    .animate-slideInLeft {
        animation: slideInLeft 1s ease-out forwards;
    }

    .delay-500 {
        animation-delay: 0.5s;
    }

    @keyframes fadeIn {
        from { opacity: 0; }
        to { opacity: 1; }
    }

    @keyframes slideInLeft {
        from {
            transform: translateX(-30px);
            opacity: 0;
        }
        to {
            transform: translateX(0);
            opacity: 1;
        }
    }

    /* Responsive styles */
    @media (max-width: 768px) {
        .timeline-grid {
            grid-template-columns: 1fr;
        }

        .timeline-left, .timeline-right {
            grid-column: 1;
            text-align: left;
            padding: 0 0 0 2.5rem;
        }

        .timeline-center {
            display: none;
        }

        .timeline-line {
            left: 20px;
        }

        .timeline-item::before {
            content: '';
            position: absolute;
            left: 20px;
            width: 20px;
            height: 20px;
            background: white;
            border: 4px solid var(--primary-color);
            border-radius: 50%;
            z-index: 2;
        }

        .timeline-item::after {
            content: '';
            position: absolute;
            left: 24px;
            width: 12px;
            height: 12px;
            background: var(--accent-color);
            border-radius: 50%;
            transform: translate(-50%, -50%);
            animation: pulse 2s infinite;
            z-index: 3;
        }
    }
    </style>
</head>

<body class="scrollbar-custom">
    @include('/components/navbar')
    
    <div class="container">
        <div class="hero-section">
            <div class="text-center p-4 lg:p-10">
                <div class="badge-modern mb-6 animate-fadeIn">
                    New Visualization Data For BAPPEDA ACEH
                </div>
                <h1 class="text-4xl md:text-6xl font-bold text-green-800 mb-4 animate-slideInLeft">Visualisasi Data</h1>
                <h2 class="text-2xl md:text-3xl font-semibold text-green-700 mb-10 animate-slideInLeft delay-500">BAPPEDA ACEH</h2>
                <div class="logo-container , mb-8 animate-fadeIn delay-500">
                    <img src="{{ asset('images/pancacita.png') }}" alt="BAPPEDA ACEH"
                        class="w-36 h-36 mx-auto object-contain">
                </div>
                
                <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
                    Platform visualisasi data Badan Perencanaan Pembangunan Daerah Aceh untuk mendukung pengambilan keputusan berbasis data
                </p>
                
                <button id="openModal" class="button-modern text-xl">
                    <span>Lihat Visualisasi Data</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Timeline Container -->
        <div id="timelineContainer" class="timeline-container">
            <h2 class="text-3xl font-bold text-green-800 text-center mb-8">Katalog Visualisasi Data</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- First Card -->
                <div class="timeline-item" data-delay="300">
                    <a href="https://bappeda.acehprov.go.id/pejabat" class="card-modern block p-6 h-full">
                        <div class="card-content">
                            <div>
                                <div class="icon-container">🏗️</div>
                                <h3 class="text-lg font-semibold lg:text-xl text-green-800 group-hover:text-green-600">
                                    Visualization Alat Besar Data
                                </h3>
                                <p class="mt-2 leading-6 text-gray-600">
                                    Visualisasi yang dibuat berdasarkan data alat besar yang terdapat di Bappeda Aceh
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="flex items-center text-green-600 font-medium group-hover:translate-x-1 transition-transform">
                                    <span>Lihat Detail</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Second Card -->
                <div class="timeline-item" data-delay="400">
                    <a href="/alatangkutan" class="card-modern block p-6 h-full">
                        <div class="card-content">
                            <div>
                                <div class="icon-container">🚗</div>
                                <h3 class="text-lg font-semibold lg:text-xl text-green-800 group-hover:text-green-600">
                                    Visualization Alat Angkutan Data
                                </h3>
                                <p class="mt-2 leading-6 text-gray-600">
                                    Visualisasi yang dibuat berdasarkan data alat angkutan yang terdapat di Bappeda Aceh
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="flex items-center text-green-600 font-medium group-hover:translate-x-1 transition-transform">
                                    <span>Lihat Detail</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Third Card -->
                <div class="timeline-item" data-delay="500">
                    <a href="/alatbengkelukur" class="card-modern block p-6 h-full">
                        <div class="card-content">
                            <div>
                                <div class="icon-container">🔧</div>
                                <h3 class="text-lg font-semibold lg:text-xl text-green-800 group-hover:text-green-600">
                                    Visualization Alat Bengkel & Alat Ukur
                                </h3>
                                <p class="mt-2 leading-6 text-gray-600">
                                    Visualisasi yang dibuat berdasarkan data alat bengkel dan alat ukur yang terdapat di Bappeda Aceh
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="flex items-center text-green-600 font-medium group-hover:translate-x-1 transition-transform">
                                    <span>Lihat Detail</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Fourth Card -->
                <div class="timeline-item" data-delay="600">
                    <a href="/alatkantor" class="card-modern block p-6 h-full">
                        <div class="card-content">
                            <div>
                                <div class="icon-container">🖨️</div>
                                <h3 class="text-lg font-semibold lg:text-xl text-green-800 group-hover:text-green-600">
                                    Visualization Alat Kantor Data
                                </h3>
                                <p class="mt-2 leading-6 text-gray-600">
                                    Visualisasi yang dibuat berdasarkan data asset peralatan yang terdapat di Bappeda Aceh
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="flex items-center text-green-600 font-medium group-hover:translate-x-1 transition-transform">
                                    <span>Lihat Detail</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Fifth Card -->
                <div class="timeline-item" data-delay="700">
                    <a href="/komputer" class="card-modern block p-6 h-full">
                        <div class="card-content">
                            <div>
                                <div class="icon-container">💻</div>
                                <h3 class="text-lg font-semibold lg:text-xl text-green-800 group-hover:text-green-600">
                                    Visualization Komputer Data
                                </h3>
                                <p class="mt-2 leading-6 text-gray-600">
                                    Visualisasi yang dibuat berdasarkan data asset komputer yang terdapat di Bappeda Aceh
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="flex items-center text-green-600 font-medium group-hover:translate-x-1 transition-transform">
                                    <span>Lihat Detail</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Sixth Card -->
                <div class="timeline-item" data-delay="800">
                    <a href="/alatstudio" class="card-modern block p-6 h-full">
                        <div class="card-content">
                            <div>
                                <div class="icon-container">🎥</div>
                                <h3 class="text-lg font-semibold lg:text-xl text-green-800 group-hover:text-green-600">
                                    Visualization Alat Studio Data
                                </h3>
                                <p class="mt-2 leading-6 text-gray-600">
                                    Visualisasi yang dibuat berdasarkan data peralatan studio yang terdapat di Bappeda Aceh
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="flex items-center text-green-600 font-medium group-hover:translate-x-1 transition-transform">
                                    <span>Lihat Detail</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Seventh Card -->
                <div class="timeline-item" data-delay="900">
                    <a href="/alatolahraga" class="card-modern block p-6 h-full">
                        <div class="card-content">
                            <div>
                                <div class="icon-container">🏀</div>
                                <h3 class="text-lg font-semibold lg:text-xl text-green-800 group-hover:text-green-600">
                                    Visualization Peralatan Olahraga
                                </h3>
                                <p class="mt-2 leading-6 text-gray-600">
                                    Visualisasi yang dibuat berdasarkan data peralatan olah raga yang terdapat di Bappeda Aceh
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="flex items-center text-green-600 font-medium group-hover:translate-x-1 transition-transform">
                                    <span>Lihat Detail</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Eighth Card -->
                <div class="timeline-item" data-delay="1000">
                    <a href="/alatlainnya" class="card-modern block p-6 h-full">
                        <div class="card-content">
                            <div>
                                <div class="icon-container">📦</div>
                                <h3 class="text-lg font-semibold lg:text-xl text-green-800 group-hover:text-green-600">
                                    Visualization Alat Lainnya
                                </h3>
                                <p class="mt-2 leading-6 text-gray-600">
                                    Visualisasi yang dibuat berdasarkan data peralatan lainnya yang terdapat di Bappeda Aceh
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="flex items-center text-green-600 font-medium group-hover:translate-x-1 transition-transform">
                                    <span>Lihat Detail</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <!-- Ninth Card -->
                <div class="timeline-item md:col-span-2" data-delay="1100">
                    <a href="/user" class="card-modern block p-6 h-full">
                        <div class="card-content">
                            <div>
                                <div class="icon-container">👥</div>
                                <h3 class="text-lg font-semibold lg:text-xl text-green-800 group-hover:text-green-600">
                                    Visualisasi Data Pemakaian Barang
                                </h3>
                                <p class="mt-2 leading-6 text-gray-600">
                                    Visualisasi yang dibuat berdasarkan data peminjaman pegawai Bappeda Aceh
                                </p>
                            </div>
                            <div class="card-footer">
                                <div class="flex items-center text-green-600 font-medium group-hover:translate-x-1 transition-transform">
                                    <span>Lihat Detail</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    
    @include('components/footer')

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const openModalButton = document.getElementById('openModal');
        const timelineContainer = document.getElementById('timelineContainer');
        const timelineItems = document.querySelectorAll('.timeline-item');

        openModalButton.addEventListener('click', function(e) {
            e.preventDefault();

            // Show the timeline container
            timelineContainer.classList.add('show');

            // Animate each timeline item with staggered delay
            timelineItems.forEach((item) => {
                const delay = item.getAttribute('data-delay') || 300;
                setTimeout(() => {
                    item.classList.add('show');
                }, parseInt(delay));
            });

            // Auto scroll to the timeline
            setTimeout(() => {
                timelineContainer.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }, 300);
        });
    });
    </script>
</body>

</html>