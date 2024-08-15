<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BAPPEDA ACEH</title>
    <link rel="icon" href="{{ asset('images/pancacita.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <style>
<<<<<<< HEAD
    body {
        background-size: cover;
        transition: background 0.5s, color 0.5s;
    }

    @keyframes slideDown {
        from {
=======
        body {
            background-size: cover;
            transition: background 0.5s, color 0.5s;
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideDown {
            from { max-height: 0; opacity: 0; }
            to { max-height: 1000px; opacity: 1; }
        }

        @keyframes fadeInTimeline {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Animasi garis berjalan */
        @keyframes lineProgress {
            from { width: 0; }
            to { width: 100%; }
        }

        .hero-section h1 {
            animation: fadeIn 2s ease-in-out, slideDown 2s ease-in-out;
        }

        .hero-section img {
            animation: zoomIn 2s ease-in-out;
        }

        .hero-section a {
            animation: fadeIn 1s ease-in-out 1s;
        }

        .timeline-container {
            overflow: hidden;
>>>>>>> Muatta
            max-height: 0;
            opacity: 0;
        }

        to {
            max-height: 1000px;
            /* Ensure this value is large enough to cover the timeline's height */
            opacity: 1;
        }
    }

    @keyframes fadeInTimeline {
        from {
            opacity: 0;
<<<<<<< HEAD
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
=======
            transform: scale(0.95);
            transition: transform 0.5s ease, opacity 0.5s ease;
        }

        .timeline-item.show {
            opacity: 1;
            transform: scale(1);
        }

        /* Modifikasi delay agar sesuai dengan garis berjalan */
        .timeline-container.show .timeline-item.delay-300 {
            animation: fadeInTimeline 0.5s ease forwards 1.5s;
        }

        .timeline-container.show .timeline-item.delay-600 {
            animation: fadeInTimeline 0.5s ease forwards 3s;
        }

        .timeline-container.show .timeline-item.delay-900 {
            animation: fadeInTimeline 0.5s ease forwards 4.5s;
        }

        .timeline-container.show .timeline-item.delay-1200 {
            animation: fadeInTimeline 0.5s ease forwards 6s;
        }

        /* Garis horizontal berjalan */
        .progress-line {
            position: absolute;
            height: 4px;
            background-color: #22c55e; /* Warna hijau sesuai tema */
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            width: 0;
            animation: lineProgress 5s linear forwards;
>>>>>>> Muatta
        }
    }

    .timeline-container {
        overflow: hidden;
        max-height: 100vh;
        /* Adjust as necessary */
        overflow-y: auto;
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
                New Visualisation Data For BAPPEDA ACEH
            </div>
            <h1 class="text-4xl md:text-7xl font-bold text-green-800 mb-4 animate-slideInLeft">Visualisasi Data</h1>
<<<<<<< HEAD
            <h1 class="text-2xl md:text-4xl font-bold text-green-800 mb-10 animate-slideInLeft delay-500">BAPPEDA ACEH
            </h1>
            <p></p>
            <a href="#" id="openModal" class="bg-green-500 text-white py-3 px-8 rounded-full animate-bounce text-xl">GET
                Visualisasi Data</a>
            <img src="{{ asset('images/pancacita.png') }}" alt="BAPPEDA ACEH"
                class="mb-10 w-full max-w-md mx-auto rounded-lg">
=======
            <h1 class="text-2xl md:text-4xl font-bold text-green-800 mb-10 animate-slideInLeft delay-500">BAPPEDA ACEH</h1>
            <a href="#" id="openModal" class="bg-green-500 text-white py-3 px-8 rounded-full animate-bounce text-xl">GET Visualisasi Data</a>
            <img src="{{ asset('images/pancacita.png') }}" alt="BAPPEDA ACEH" class="mb-10 w-full max-w-md mx-auto rounded-lg">
>>>>>>> Muatta
        </div>

        <!-- Timeline Container -->
        <div id="timelineContainer" class="timeline-container p-4">
            <div class="relative flex flex-col grid-cols-9 p-2 mx-auto md:grid">
                <!-- Progress Line -->
                <div class="progress-line"></div>

                <!-- First Event -->
                <div class="flex md:contents flex-row-reverse timeline-item delay-300">
                    <a href="/alatbesar"
                        class="relative p-4 my-6 text-black bg-white rounded-xl col-start-1 col-end-5 mr-auto md:mr-0 md:ml-auto hover:bg-green-200 transition duration-300 ease-in-out shadow-2xl">
                        <h3 class="text-lg font-semibold lg:text-xl">Visualization Alat Besar Data</h3>
                        <p class="mt-2 leading-6">Visualisasi yang dibuat berdasarkan data alat besar yang terdapat di
                            Bappeda Aceh</p>
                    </a>
                    <div class="relative col-start-5 col-end-6 mr-7 md:mx-auto">
                        <div class="flex items-center justify-center w-6 h-full">
<<<<<<< HEAD
                            <div
                                class="w-1 h-full bg-green-300 rounded-t-full bg-gradient-to-b from-green-400 to-green-300">
                            </div>
=======
                            <div class="w-1 h-full bg-green-300 rounded-t-full bg-gradient-to-b from-green-400 to-green-300"></div>
>>>>>>> Muatta
                        </div>
                        <div class="absolute w-6 h-6 -mt-3 bg-white border-4 border-green-400 rounded-full top-1/2">
                        </div>
                    </div>
                </div>

                <!-- Second Event -->
                <div class="flex md:contents timeline-item delay-600">
                    <div class="relative col-start-5 col-end-6 mr-7 md:mx-auto">
                        <div class="flex items-center justify-center w-6 h-full">
                            <div class="w-1 h-full bg-green-300"></div>
                        </div>
                        <div class="absolute w-6 h-6 -mt-3 bg-white border-4 border-green-400 rounded-full top-1/2">
                        </div>
                    </div>
                    <a href="/alatangkutan"
                        class="relative p-4 my-6 text-black bg-white rounded-xl col-start-6 col-end-10 mr-auto hover:bg-green-200 transition duration-300 ease-in-out shadow-2xl">
                        <h3 class="text-lg font-semibold lg:text-xl">Visualization Alat Angkutan Data</h3>
                        <p class="mt-2 leading-6">Visualisasi yang dibuat berdasarkan data alat angkutan yang terdapat
                            di Bappeda Aceh</p>
                    </a>
                </div>

                <!-- Third Event -->
                <div class="flex md:contents flex-row-reverse timeline-item delay-900">
                    <a href="/alatbengkelukur"
                        class="relative p-4 my-6 text-black bg-white rounded-xl col-start-1 col-end-5 mr-auto md:mr-0 md:ml-auto hover:bg-green-200 transition duration-300 ease-in-out shadow-2xl">
                        <h3 class="text-lg font-semibold lg:text-xl">Visualization Alat Bengkel & Alat Ukur Data</h3>
                        <p class="mt-2 leading-6">Visualisasi yang dibuat berdasarkan data alat bengkel dan alat ukur
                            yang terdapat di Bappeda Aceh</p>
                    </a>
                    <div class="relative col-start-5 col-end-6 mr-7 md:mx-auto">
                        <div class="flex items-center justify-center w-6 h-full">
<<<<<<< HEAD
                            <div
                                class="w-1 h-full bg-green-300 rounded-t-full bg-gradient-to-b from-green-400 to-green-300">
                            </div>
=======
                            <div class="w-1 h-full bg-green-300 rounded-t-full bg-gradient-to-b from-green-400 to-green-300"></div>
>>>>>>> Muatta
                        </div>
                        <div class="absolute w-6 h-6 -mt-3 bg-white border-4 border-green-400 rounded-full top-1/2">
                        </div>
                    </div>
                </div>

                <!-- Fourth Event -->
                <div class="flex md:contents timeline-item delay-600">
                    <div class="relative col-start-5 col-end-6 mr-7 md:mx-auto">
                        <div class="flex items-center justify-center w-6 h-full">
                            <div class="w-1 h-full bg-green-300"></div>
                        </div>
                        <div class="absolute w-6 h-6 -mt-3 bg-white border-4 border-green-400 rounded-full top-1/2">
                        </div>
                    </div>
                    <a href="/alatkantor"
                        class="relative p-4 my-6 text-black bg-white rounded-xl col-start-6 col-end-10 mr-auto hover:bg-green-200 transition duration-300 ease-in-out shadow-2xl">
                        <h3 class="text-lg font-semibold lg:text-xl">Visualization Alat Kantor Data</h3>
                        <p class="mt-2 leading-6">Visualisasi yang dibuat berdasarkan data asset peralatan yang terdapat
                            di Bappeda Aceh</p>
                    </a>
                </div>

                <!-- Fifth Event -->
                <div class="flex md:contents flex-row-reverse timeline-item delay-300">
                    <a href="/komputer"
                        class="relative p-4 my-6 text-black bg-white rounded-xl col-start-1 col-end-5 mr-auto md:mr-0 md:ml-auto hover:bg-green-200 transition duration-300 ease-in-out shadow-2xl">
                        <h3 class="text-lg font-semibold lg:text-xl">Visualization Komputer Data</h3>
                        <p class="mt-2 leading-6">Visualisasi yang dibuat berdasarkan data asset komputer yang terdapat
                            di Bappeda Aceh</p>
                    </a>
                    <div class="relative col-start-5 col-end-6 mr-7 md:mx-auto">
                        <div class="flex items-center justify-center w-6 h-full">
                            <div
                                class="w-1 h-full bg-green-300 rounded-t-full bg-gradient-to-b from-green-400 to-green-300">
                            </div>
                        </div>
                        <div class="absolute w-6 h-6 -mt-3 bg-white border-4 border-green-400 rounded-full top-1/2">
                        </div>
                    </div>
                </div>

                <!-- Sixth Event -->
                <div class="flex md:contents timeline-item delay-600">
                    <div class="relative col-start-5 col-end-6 mr-7 md:mx-auto">
                        <div class="flex items-center justify-center w-6 h-full">
                            <div class="w-1 h-full bg-green-300"></div>
                        </div>
                        <div class="absolute w-6 h-6 -mt-3 bg-white border-4 border-green-400 rounded-full top-1/2">
                        </div>
                    </div>
                    <a href="/alatstudio"
                        class="relative p-4 my-6 text-black bg-white rounded-xl col-start-6 col-end-10 mr-auto hover:bg-green-200 transition duration-300 ease-in-out shadow-2xl">
                        <h3 class="text-lg font-semibold lg:text-xl">Visualization Alat Studio Data</h3>
                        <p class="mt-2 leading-6">Visualisasi yang dibuat berdasarkan data peralatan studio yang
                            terdapat di Bappeda Aceh</p>
                    </a>
                </div>

                <!-- Seventh Event -->
                <div class="flex md:contents flex-row-reverse timeline-item delay-300">
                    <a href="/alatolahraga"
                        class="relative p-4 my-6 text-black bg-white rounded-xl col-start-1 col-end-5 mr-auto md:mr-0 md:ml-auto hover:bg-green-200 transition duration-300 ease-in-out shadow-2xl">
                        <h3 class="text-lg font-semibold lg:text-xl">Visualization Peralatan Olahraga</h3>
                        <p class="mt-2 leading-6">Visualisasi yang dibuat berdasarkan data peralatan olah raga yang
                            terdapat di Bappeda Aceh</p>
                    </a>
                    <div class="relative col-start-5 col-end-6 mr-7 md:mx-auto">
                        <div class="flex items-center justify-center w-6 h-full">
                            <div
                                class="w-1 h-full bg-green-300 rounded-t-full bg-gradient-to-b from-green-400 to-green-300">
                            </div>
                        </div>
                        <div class="absolute w-6 h-6 -mt-3 bg-white border-4 border-green-400 rounded-full top-1/2">
                        </div>
                    </div>
                </div>

                <!-- Eighth Event -->
                <div class="flex md:contents timeline-item delay-600">
                    <div class="relative col-start-5 col-end-6 mr-7 md:mx-auto">
                        <div class="flex items-center justify-center w-6 h-full">
                            <div class="w-1 h-full bg-green-300"></div>
                        </div>
                        <div class="absolute w-6 h-6 -mt-3 bg-white border-4 border-green-400 rounded-full top-1/2">
                        </div>
                    </div>
                    <a href="/alatlainnya"
                        class="relative p-4 my-6 text-black bg-white rounded-xl col-start-6 col-end-10 mr-auto hover:bg-green-200 transition duration-300 ease-in-out shadow-2xl">
                        <h3 class="text-lg font-semibold lg:text-xl">Visualization Alat Lainnya</h3>
                        <p class="mt-2 leading-6">Visualisasi yang dibuat berdasarkan data peralatan olah raga yang
                            terdapat di Bappeda Aceh</p>
                    </a>
                </div>

                <!-- Eighth Event -->
                <div class="flex md:contents flex-row-reverse timeline-item delay-900">
                    <a href="/user"
                        class="relative p-4 my-6 text-black bg-white rounded-xl col-start-1 col-end-5 mr-auto md:mr-0 md:ml-auto hover:bg-green-200 transition duration-300 ease-in-out shadow-2xl">
                        <h3 class="text-lg font-semibold lg:text-xl">Visualisasi Data Pemakaian Barang</h3>
                        <p class="mt-2 leading-6">Visualisai yang dibuat berdasarkan data peminjaman pegawai Bappeda
                            Aceh</p>
                    </a>
                    <div class="relative col-start-5 col-end-6 mr-7 md:mx-auto">
                        <div class="flex items-center justify-center w-6 h-full">
                            <div
                                class="w-1 h-full bg-green-300 rounded-t-full bg-gradient-to-b from-green-400 to-green-300">
                            </div>
                        </div>
                        <div class="absolute w-6 h-6 -mt-3 bg-white border-4 border-green-400 rounded-full top-1/2">
                        </div>
                    </div>
                </div>

                <!-- Ninth Event -->
                <div class="flex md:contents timeline-item delay-1200">
                    <div class="relative col-start-5 col-end-6 mr-7 md:mx-auto">
                        <div class="flex items-center justify-center w-6 h-full">
                            <div class="w-1 h-full bg-green-300"></div>
                        </div>
                        <div class="absolute w-6 h-6 -mt-3 bg-white border-4 border-green-400 rounded-full top-1/2">
                        </div>
                    </div>
<<<<<<< HEAD
                    <a href="/dashboard"
                        class="relative p-4 my-6 text-gray-800 bg-white rounded-xl col-start-6 col-end-10 mr-auto hover:bg-green-200 transition duration-300 ease-in-out shadow-2xl">
                        <h3 class="text-lg font-semibold lg:text-xl">Visualization Transportasi Data</h3>
                        <p class="mt-2 leading-6">Visualisasi yang dibuat berdasarkan data asset transportasi yang
                            terdapat di Bappeda Aceh</p>
=======
                    <a href="/user" class="relative p-4 my-6 text-gray-800 bg-white rounded-xl col-start-6 col-end-10 mr-auto hover:bg-green-200 transition duration-300 ease-in-out shadow-2xl">
                        <h3 class="text-lg font-semibold lg:text-xl">Visualisasi Data Pemakaian Barang</h3>
                        <p class="mt-2 leading-6">Visualisasi yang dibuat berdasarkan data peminjaman pegawai Bappeda Aceh</p>
>>>>>>> Muatta
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('components/footer')

    <script>
<<<<<<< HEAD
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
=======
        document.addEventListener('DOMContentLoaded', function() {
            const openModalButton = document.getElementById('openModal');
            const timelineContainer = document.getElementById('timelineContainer');
            const timelineItems = document.querySelectorAll('.timeline-item');
            const progressLine = document.querySelector('.progress-line');

            openModalButton.addEventListener('click', function(e) {
                e.preventDefault();

                // Tampilkan container dan mulai animasi garis berjalan
                timelineContainer.classList.add('show');

                // Animasi setiap item timeline setelah garis berjalan
                timelineItems.forEach((item, index) => {
                    setTimeout(() => {
                        item.classList.add('show');
                    }, index * 1500); // Delay lebih panjang sesuai dengan garis berjalan
                });

                // Auto scroll ke timeline
>>>>>>> Muatta
                setTimeout(() => {
                    item.classList.add('show');
                }, index * 300);
            });

            // Auto scroll to the timeline
            setTimeout(() => {
                timelineContainer.scrollIntoView({
                    behavior: 'smooth'
                });
            }, 500);
        });
    });
    </script>
</body>

</html>