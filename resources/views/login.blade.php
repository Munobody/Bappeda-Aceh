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
    </style>
</head>
<body>
    @include('/components/navbar') 

    <div class="flex items-center justify-center h-screen">
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
            <h1 class="text-2xl font-semibold text-center mb-6">Admin Login</h1>
            <form action="/login" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" />
                </div>
                <div>
                <a href="/MeetingRoom" class="w-full inline-block px-4 py-2 bg-green-600 text-white font-semibold rounded-md shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-800 text-center">Login</a>
                </div>
            </form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    @vite('resources/js/app.js')
    @include('components/footer')
</html>
