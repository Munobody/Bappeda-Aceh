<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Gambar</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.7.0/dist/full.css" rel="stylesheet">
    <style>
        .modal-show {
            animation: zoomIn 0.3s forwards;
        }

        @keyframes zoomIn {
            from {
                transform: scale(0.5);
                opacity: 0;
            }
            to {
                transform: scale(1);
                opacity: 1;
            }
        }

        .blur-background {
            filter: blur(5px);
        }

        #main-content {
            z-index: 10;
            position: relative;
        }

        #message-modal {
            z-index: 20;
        }

        .image-container {
            position: relative;
            background-color: white;
            padding: 1rem;
            border-radius: 0.5rem;
        }

        .close-button {
            position: absolute;
            top: 1rem;
            right: 1rem;
            color: #6b7280;
            font-size: 2rem; /* Increased font size */
            cursor: pointer;
        }

        .close-button:hover {
            color: #374151;
        }

        .marquee-container {
            display: none;
            width: 100%;
            overflow: hidden;
            background-color: #f3f4f6;
            padding: 1rem 0;
            position: fixed;
            bottom: 0;
            left: 0;
            z-index: 15;
            border-top: 2px solid #e5e7eb;
            box-shadow: 0 -4px 8px rgba(0, 0, 0, 0.1);
            opacity: 0;
            transform: translateY(100%);
            animation: slideUp 1s forwards;
        }

        @keyframes slideUp {
            from {
                transform: translateY(100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .marquee-content {
            display: flex;
            white-space: nowrap;
            animation: marquee 15s linear infinite;
            font-size: 1.25rem;
            font-weight: bold;
            color: #1f2937;
        }

        .marquee-content img {
            height: 1.25rem;
            vertical-align: middle;
            margin-right: 0.5rem;
        }

        @keyframes marquee {
            from {
                transform: translateX(100%);
            }
            to {
                transform: translateX(-100%);
            }
        }

        /* Adjusted styles for the modal */
        .modal-container {
            width: 90%;
            max-width: 900px; /* Increased maximum width for larger modal */
            padding: 2rem;
            margin: auto; /* Center align the modal content */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative; /* Ensure position relative for absolute children */
        }

        /* Added a hover effect for the modal image */
        .modal-image {
            transition: transform 0.3s ease-in-out;
        }

        .modal-image:hover {
            transform: scale(1.1);
        }

        /* Added animation for the modal appearance */
        .modal-container.show {
            animation: fadeIn 0.3s forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>
<body class="relative">

    <!-- Container untuk konten utama -->
    <div id="main-content" class="container mx-auto text-center py-8">
        <!-- Konten utama disini -->
    </div>

    <!-- Modal -->
    <div id="message-modal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <!-- Modal Card -->
        <div id="modal-card" class="modal-container bg-white rounded-lg shadow-lg relative">
            <!-- Card Content -->
            <div class="image-container">
                <img src="{{ asset('images/logopon.png') }}" alt="Pesan Gambar" class="mx-auto w-full max-w-2xl shadow-lg modal-image">
                <button id="close-message" class="close-button">
                    &times;
                </button>
            </div>
            <!-- Countdown Timer -->
            <div id="countdown" class="grid auto-cols-max grid-flow-col gap-5 text-center mt-4">
                <div class="bg-neutral rounded-box text-neutral-content flex flex-col p-2">
                    <span id="days" class="countdown font-mono text-5xl">
                        <span style="--value:0;"></span>
                    </span>
                    days
                </div>
                <div class="bg-neutral rounded-box text-neutral-content flex flex-col p-2">
                    <span id="hours" class="countdown font-mono text-5xl">
                        <span style="--value:0;"></span>
                    </span>
                    hours
                </div>
                <div class="bg-neutral rounded-box text-neutral-content flex flex-col p-2">
                    <span id="minutes" class="countdown font-mono text-5xl">
                        <span style="--value:0;"></span>
                    </span>
                    min
                </div>
                <div class="bg-neutral rounded-box text-neutral-content flex flex-col p-2">
                    <span id="seconds" class="countdown font-mono text-5xl">
                        <span style="--value:0;"></span>
                    </span>
                    sec
                </div>
            </div>
        </div>
    </div>

    <!-- Teks Berjalan -->
    <div id="marquee-container" class="marquee-container">
        <div class="marquee-content">
            <img src="{{ asset('images/logopon.png') }}" alt="Logopon"> AYO SUKSESKAN PON SUMUT-ACEH 2024 
            <img src="{{ asset('images/logopon.png') }}" alt="Logopon"> AYO SUKSESKAN PON SUMUT-ACEH 2024 
            <img src="{{ asset('images/logopon.png') }}" alt="Logopon"> AYO SUKSESKAN PON SUMUT-ACEH 2024 
            <img src="{{ asset('images/logopon.png') }}" alt="Logopon"> AYO SUKSESKAN PON SUMUT-ACEH 2024 
            <img src="{{ asset('images/logopon.png') }}" alt="Logopon"> AYO SUKSESKAN PON SUMUT-ACEH 2024 
            <img src="{{ asset('images/logopon.png') }}" alt="Logopon"> AYO SUKSESKAN PON SUMUT-ACEH 2024 
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const messageModal = document.getElementById('message-modal');
            const marqueeContainer = document.getElementById('marquee-container');
            const mainContent = document.getElementById('main-content');
            const closeButton = document.getElementById('close-message');
            const modalCard = document.getElementById('modal-card');
            const daysElement = document.getElementById('days').querySelector('span');
            const hoursElement = document.getElementById('hours').querySelector('span');
            const minutesElement = document.getElementById('minutes').querySelector('span');
            const secondsElement = document.getElementById('seconds').querySelector('span');

            // Show the modal and marquee when the page loads
            messageModal.classList.remove('hidden');
            marqueeContainer.style.display = 'block';
            marqueeContainer.classList.add('show');
            mainContent.classList.add('blur-background');

            // Show the modal card with animation
            modalCard.classList.add('show');

            // Hide the modal and marquee when the close button is clicked
            closeButton.addEventListener('click', function () {
                messageModal.classList.add('hidden');
                marqueeContainer.style.display = 'none';
                marqueeContainer.classList.remove('show');
                mainContent.classList.remove('blur-background');
                modalCard.classList.remove('show'); // Remove show class to reset animation
            });

            // Countdown Timer
            function updateCountdown() {
                const eventDate = new Date('2024-09-08T18:00:00');
                const now = new Date();
                const timeDiff = eventDate - now;

                if (timeDiff <= 0) {
                    daysElement.style.setProperty('--value', 0);
                    hoursElement.style.setProperty('--value', 0);
                    minutesElement.style.setProperty('--value', 0);
                    secondsElement.style.setProperty('--value', 0);
                    return;
                }

                const days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
                const hours = Math.floor((timeDiff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((timeDiff % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((timeDiff % (1000 * 60)) / 1000);

                daysElement.style.setProperty('--value', days);
                hoursElement.style.setProperty('--value', hours);
                minutesElement.style.setProperty('--value', minutes);
                secondsElement.style.setProperty('--value', seconds);
            }

            const countdownInterval = setInterval(updateCountdown, 1000);
            updateCountdown(); // Initial call
        });
    </script>

</body>
</html>
