<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Page</title>
    <link rel="icon" href="{{ asset('images/pancacita.png') }}" type="image/x-icon">
    @vite('resources/css/app.css')
    <style>
        body {
            background: linear-gradient(90deg, #fff 0%, #fff 100%);
            background-size: 400% 400%;
            animation: waveBackgroundAnimation 10s ease infinite;
            transition: background 0.5s, color 0.5s;
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

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideInLeft {
            from {
                transform: translateX(-100%);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
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

        .animate-fadeIn {
            animation: fadeIn 1s ease-out;
        }

        .animate-slideInLeft {
            animation: slideInLeft 1s ease-out;
        }

        .animate-slideInLeft.delay-500 {
            animation-delay: 0.5s;
        }

        .animate-bounce {
            animation: bounce 2s infinite;
        }

        [data-theme="dark"] {
            background: #121212;
            color: #ffffff;
        }

        .scrollable-table {
            max-height: 400px; /* Set the height of the table container */
            overflow-y: auto; /* Add vertical scrollbar */
        }

        /* Table styling */
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #cbd5e1; /* Border color for cells */
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f1f5f9; /* Background color for header cells */
            color: #334155; /* Text color for header cells */
            font-weight: bold;
        }

        tbody tr:nth-child(even) {
            background-color: #f9fafb; /* Background color for alternate rows */
        }

        caption {
            padding: 8px;
            font-weight: bold;
            color: #334155; /* Text color for caption */
        }

        .bullet-list {
            list-style-type: disc; /* Change to disc (bullets) */
            padding-left: 1.5rem; /* Add space on the left for bullets */
            margin: 0; /* Remove margin for the list */
        }
        
        /* Timeline Styling */
        .timeline-container {
            padding: 2rem; /* Add padding around the timeline */
        }
        
        .timeline-item {
            position: relative;
            padding-left: 2rem;
            margin-bottom: 2rem;
        }

        .timeline-item::before {
            content: "";
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            border-left: 2px solid #d1d5db; /* Line color */
        }
    </style>
</head>
<body>
    @include('/components/navbar')

    <div class="timeline-container mt-16">
        <ol class="relative border-l border-gray-200 dark:border-gray-700">
            <li class="timeline-item">
                <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">February 2022</time>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Application UI code in Tailwind CSS</h3>
                <p class="mb-4 text-base font-normal text-gray-500 dark:text-gray-400">Get access to over 20+ pages including a dashboard layout, charts, kanban board, calendar, and pre-order E-commerce & Marketing pages.</p>
                <a href="#" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:outline-none focus:ring-gray-100 focus:text-blue-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700 dark:focus:ring-gray-700">Learn more <svg class="w-3 h-3 ms-2 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                </svg></a>
            </li>
            <li class="timeline-item">
                <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">March 2022</time>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Marketing UI design in Figma</h3>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">All of the pages and components are first designed in Figma and we keep a parity between the two versions even as we update the project.</p>
            </li>
            <li class="timeline-item">
                <div class="absolute w-3 h-3 bg-gray-200 rounded-full mt-1.5 -left-1.5 border border-white dark:border-gray-900 dark:bg-gray-700"></div>
                <time class="mb-1 text-sm font-normal leading-none text-gray-400 dark:text-gray-500">April 2022</time>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">E-Commerce UI code in Tailwind CSS</h3>
                <p class="text-base font-normal text-gray-500 dark:text-gray-400">Get started with dozens of web components and interactive elements built on top of Tailwind CSS.</p>
            </li>
        </ol>
    </div>
</body>
</html>