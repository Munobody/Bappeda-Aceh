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

    .form-container {
      max-width: 500px;
      margin: 2rem auto;
      padding: 2rem;
      background-color: #f9fafb; /* Gray-50 */
      border-radius: 0.75rem;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .form-container input:disabled {
      background-color: #e5e7eb; /* Gray-200 */
      cursor: not-allowed;

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


<div class="form-container mt-40 mb-20">
    @if(session('status'))
    <div id="successModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50 hidden">
  <!-- Modal Container -->
  <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm mx-auto">
    <h3 class="text-xl font-semibold mb-4">Update Berhasil</h3>
    <p class="text-gray-700 mb-4">Profil admin Anda telah diperbarui.</p>
    <button id="closeModal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
      Tutup
    </button>
  </div>
</div>
    @endif
    <h2 class="text-2xl font-bold mb-4">Profil Admin</h2>
    <form id="adminForm" action="/admin/update" method="POST">
      @csrf
      <div class="mb-4">
        <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Username:</label>
        <input type="username" id="username" name="username" value="{{$data->username}}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
      </div>
      <div class="mb-4">
        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
        <input type="password" id="password" name="password" placeholder="Ketik untuk ganti password" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
      </div>
      <button type="submit" id="enableButton" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Simpan</button>
    </form>
  </div>

  <script>
      // Close the modal when the close button is clicked
  document.getElementById('closeModal').addEventListener('click', function() {
    var successModal = document.getElementById('successModal');
    successModal.classList.add('hidden');
  });
  </script>

@if (session('status'))
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      document.getElementById('successModal').classList.remove('hidden');
    });
  </script>
@endif

   @include('components/footer')
</body>
</html>
@include('/components/navbar') 

