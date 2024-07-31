<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BAPPEDA ACEH Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <script>
    function setTheme(theme) {
      const root = document.documentElement;

      switch (theme) {
        case 'light':
          root.style.setProperty('--bg-color', '#ffffff');
          root.style.setProperty('--text-color', '#000000');
          break;
        case 'dark':
          root.style.setProperty('--bg-color', '#1a1a1a');
          root.style.setProperty('--text-color', '#e5e5e5');
          break;
        case 'green':
          root.style.setProperty('--bg-color', '#d3f9d8');
          root.style.setProperty('--text-color', '#1b5e20');
          break;
        default:
          root.style.setProperty('--bg-color', '#ffffff');
          root.style.setProperty('--text-color', '#000000');
      }

      // Set the background and text colors on the body
      document.body.style.backgroundColor = getComputedStyle(root).getPropertyValue('--bg-color');
      document.body.style.color = getComputedStyle(root).getPropertyValue('--text-color');

      // Store the selected theme in localStorage
      localStorage.setItem('theme', theme);
    }

    // Apply the saved theme from localStorage
    window.onload = () => {
      const savedTheme = localStorage.getItem('theme') || 'light';
      setTheme(savedTheme);
    };

    // Function to toggle the mobile menu
    function toggleMenu() {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    }

    // Function to toggle the admin dropdown menu
    function toggleAdminMenu() {
      const menu = document.getElementById('admin-menu');
      menu.classList.toggle('hidden');
    }
  </script>
</head>
<body class="bg-white text-black">
  <div class="flex justify-center">
    <div class="navbar backdrop-blur-lg bg-green-100 shadow-lg rounded-lg fixed top-0 z-10 py-2 px-5 max-w-screen-xl w-full mt-3 flex justify-between items-center">
      <div class="navbar-start flex items-center">
        <!-- Mobile Menu Button -->
        <button class="lg:hidden btn btn-ghost btn-circle" onclick="toggleMenu()">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
          </svg>
        </button>

        <!-- Logo -->
        <a href="#" class="hidden lg:block">
          <img src="{{ asset('images/logo 2.png') }}" alt="Logo BAPPEDA ACEH" class="h-10 w-auto">
        </a>
      </div>

      <div class="navbar-center hidden lg:flex">
        <ul class="navbar-menu flex items-center space-x-6">
          <li><a class="text-sm text-gray-700 hover:text-gray-900" href="#">Beranda</a></li>
          <li><a class="text-sm text-gray-700 hover:text-gray-900" href="#">Tentang</a></li>
          <li><a class="text-sm text-gray-700 hover:text-gray-900" href="#">SI-IRA</a></li>
          <li><a class="text-sm text-gray-700 hover:text-gray-900" href="#">Kontak</a></li>
        </ul>
      </div>

      <div class="navbar-end flex items-center">
        <!-- Login Icon Dropdown -->
        <div class="relative">
          <button class="btn btn-ghost btn-circle" onclick="toggleAdminMenu()">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div id="admin-menu" class="hidden absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg">
            <ul class="py-2">
              <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Login as Admin</a></li>
              <li><a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a></li>
            </ul>
          </div>
        </div>

        <!-- Theme Dropdown -->
        <div class="dropdown dropdown-end">
          <label tabindex="0" class="btn btn-ghost btn-circle">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 12h14M12 5l7 7-7 7" />
            </svg>
          </label>
          <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-40">
            <li><a href="#" onclick="setTheme('light')">Light</a></li>
            <li><a href="#" onclick="setTheme('dark')">Dark</a></li>
            <li><a href="#" onclick="setTheme('green')">Green</a></li>
          </ul>
        </div>
      </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden absolute top-16 left-0 w-full bg-green-100 shadow-lg rounded-lg mt-2 z-20">
      <ul class="menu p-2 flex flex-col space-y-2">
        <li><a class="text-sm text-gray-700 hover:text-gray-900" href="#">Beranda</a></li>
        <li><a class="text-sm text-gray-700 hover:text-gray-900" href="#">Visualisasi</a></li>
        <li><a class="text-sm text-gray-700 hover:text-gray-900" href="#">SI-IRA</a></li>
        <li><a class="text-sm text-gray-700 hover:text-gray-900" href="#">Kontak</a></li>
      </ul>
    </div>
  </div>
</body>
</html>
