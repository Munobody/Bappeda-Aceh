<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAPPEDA ACEH</title>
    <link rel="icon" href="{{ asset('images/pancacita.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <style>
        body {
            background-size: cover; 
            transition: background 0.5s, color 0.5s;
        }

        @keyframes slideDown {
            from {
                max-height: 0;
                opacity: 0;
            }
            to {
                max-height: 1000px; /* Ensure this value is large enough to cover the timeline's height */
                opacity: 1;
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
            transition: max-height 1s ease, opacity 1s ease;
        }

        .timeline-container.show {
            animation: slideDown 1s ease forwards;
            opacity: 1;
        }

        .timeline-item {
            opacity: 0;
        }

        .timeline-item.show {
            animation: fadeInTimeline 1s ease forwards;
        }
    </style>
</head>
<body>
    @include('/components/navbar')
    <div class="container mx-auto py-16 flex flex-col items-center justify-center hero-section">
        <div class="text-center flex-1 p-4 lg:p-10">
            <div class="inline-block bg-green-100 text-green-800 py-2 px-4 rounded-full text-sm mb-4 animate-fadeIn">
                New Visualitation Data For BAPPEDA ACEH
            </div>
            <h1 class="text-4xl md:text-7xl font-bold text-green-800 mb-4 animate-slideInLeft">Visualisasi Data</h1>
            <h1 class="text-2xl md:text-4xl font-bold text-green-800 mb-10 animate-slideInLeft delay-500">BAPPEDA ACEH</h1>
            <p></p>
            <a href="#" id="openModal" class="bg-green-500 text-white py-3 px-8 rounded-full animate-bounce text-xl">GET Visualisasi Data</a>
            <img src="{{ asset('images/pancacita.png') }}" alt="BAPPEDA ACEH" class="mb-10 w-full max-w-md mx-auto rounded-lg">
        </div>
        
        <!-- Timeline Container -->
        <div id="timelineContainer" class="timeline-container p-4">
            <div class="flex flex-col grid-cols-9 p-2 mx-auto md:grid">
                <!-- First Event -->
                <div class="flex md:contents flex-row-reverse timeline-item delay-300">
                    <a href="/komputer" class="relative p-4 my-6 text-black bg-white rounded-xl col-start-1 col-end-5 mr-auto md:mr-0 md:ml-auto hover:bg-green-600 transition duration-300 ease-in-out shadow-2xl">
                        <h3 class="text-lg font-semibold lg:text-xl">Visualization Komputer Data</h3>
                        <p class="mt-2 leading-6">Visualisasi yang dibuat berdasarkan data asset komputer yang terdapat di Bappeda Aceh</p>
                    </a>
                    <div class="relative col-start-5 col-end-6 mr-7 md:mx-auto">
                        <div class="flex items-center justify-center w-6 h-full">
                            <div class="w-1 h-full bg-green-300 rounded-t-full bg-gradient-to-b from-green-400 to-green-300">
                            </div>
                        </div>
                        <div class="absolute w-6 h-6 -mt-3 bg-white border-4 border-green-400 rounded-full top-1/2"></div>
                    </div>
                </div>

                <!-- Second Event -->
                <div class="flex md:contents timeline-item delay-600">
                    <div class="relative col-start-5 col-end-6 mr-7 md:mx-auto">
                        <div class="flex items-center justify-center w-6 h-full">
                            <div class="w-1 h-full bg-green-300"></div>
                        </div>
                        <div class="absolute w-6 h-6 -mt-3 bg-white border-4 border-green-400 rounded-full top-1/2"></div>
                    </div>
                    <a href="/kantor" class="relative p-4 my-6 text-black bg-white rounded-xl col-start-6 col-end-10 mr-auto hover:bg-green-400 transition duration-300 ease-in-out shadow-2xl">
                        <h3 class="text-lg font-semibold lg:text-xl">Visualization Alat Kantor Data</h3>
                        <p class="mt-2 leading-6">Visualisasi yang dibuat berdasarkan data asset Peralatan yang terdapat di Bappeda Aceh</p>
                    </a>
                </div>

                <!-- Third Event -->
                <div class="flex md:contents flex-row-reverse timeline-item delay-900">
                    <a href="/dashboard" class="relative p-4 my-6 text-black bg-white rounded-xl col-start-1 col-end-5 mr-auto md:mr-0 md:ml-auto hover:bg-green-400 transition duration-300 ease-in-out shadow-2xl">
                        <h3 class="text-lg font-semibold lg:text-xl">Visualization Transportasi Data</h3>
                        <p class="mt-2 leading-6">Visualisasi yang dibuat berdasarkan data asset transportasi yang terdapat di Bappeda Aceh</p>
                    </a>
                    <div class="relative col-start-5 col-end-6 mr-7 md:mx-auto">
                        <div class="flex items-center justify-center w-6 h-full">
                            <div class="w-1 h-full bg-green-300 rounded-t-full bg-gradient-to-b from-green-400 to-green-300">
                            </div>
                        </div>
                        <div class="absolute w-6 h-6 -mt-3 bg-white border-4 border-green-400 rounded-full top-1/2"></div>
                    </div>
                </div>

                <!-- Fourth Event -->
                <div class="flex md:contents timeline-item delay-1200">
                    <div class="relative col-start-5 col-end-6 mr-7 md:mx-auto">
                        <div class="flex items-center justify-center w-6 h-full">
                            <div class="w-1 h-full bg-green-300"></div>
                        </div>
                        <div class="absolute w-6 h-6 -mt-3 bg-white border-4 border-green-400 rounded-full top-1/2"></div>
                    </div>
                    <a href="your-link-4.html" class="relative p-4 my-6 text-gray-800 bg-white rounded-xl col-start-6 col-end-10 mr-auto hover:bg-green-400 transition duration-300 ease-in-out shadow-2xl">
                        <h3 class="text-lg font-semibold lg:text-xl">Visualisasi Data Pemakaian Barang</h3>
                        <p class="mt-2 leading-6">Visualisai yang dibuat berdasarkan data peminjaman pegawai Bappeda Aceh</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <!-- <div id="dataModal">
        <div class="modal-content text-center">
            <h2 class="text-2xl font-bold mb-4 text-green-500">Pilih Halaman Data</h2>
            <ul class="text-black space-y-2">
                <li>
                    <a href="/komputer" class="text-black hover:text-gray-800">Komputer</a>
                </li>
                <li>
                    <a href="/dashboard" class="text-black hover:text-gray-800">Transportasi</a>
                </li>
                <li>
                    <a href="/kantor" class="text-black hover:text-gray-800">Alat Kantor</a>
                </li>
            </ul>

            <button id="closeModal" class="close-button bg-green-600 text-white hover:bg-green-700">Close</button>
        </div>
    </div> -->

    @include('components/footer')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const openModalButton = document.getElementById('openModal');
            const timelineContainer = document.getElementById('timelineContainer');
            const timelineItems = document.querySelectorAll('.timeline-item');

            openModalButton.addEventListener('click', function(e) {
                e.preventDefault();
                
                // Show the timeline with animation
                timelineContainer.classList.add('show');

                // Animate each timeline item
                timelineItems.forEach((item, index) => {
                    setTimeout(() => {
                        item.classList.add('show');
                    }, index * 300);
                });

                // Auto scroll to the timeline
                setTimeout(() => {
                    timelineContainer.scrollIntoView({ behavior: 'smooth' });
                }, 500);
            });
        });
    </script>
</body>
</html>
