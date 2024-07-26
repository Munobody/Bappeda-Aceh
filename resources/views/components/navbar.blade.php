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
  </script>
</head>
<body class="bg-white text-black">
  <div class="flex justify-center">
    <div class="navbar backdrop-blur-lg bg-white/60 shadow-lg rounded-lg fixed top-0 z-10 py-2 px-5 max-w-screen-xl w-full mt-3">
      <div class="navbar-start">
        <div class="dropdown">
          <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M4 6h16M4 12h16M4 18h7" />
            </svg>
          </div>
          <ul
            tabindex="0"
            class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
            <li><a href="#">Homepage</a></li>
            <li><a href="#">Portfolio</a></li>
            <li><a href="#">About</a></li>
            <li><a href="#">Visualisasi Data</a></li>
          </ul>
        </div>
      </div>
      <div class="navbar-center">
        <ul class="navbar-menu hidden lg:flex lg:items-center lg:w-auto lg:space-x-6">
          <li><a class="text-sm text-gray-700 hover:text-gray-900" href="#">Beranda</a></li>
          <li><a class="text-sm text-gray-700 hover:text-gray-900" href="#">Tentang</a></li>
          <li><a class="text-sm text-gray-700 hover:text-gray-900" href="#">Layanan</a></li>
          <li><a class="text-sm text-gray-700 hover:text-gray-900" href="#">Kontak</a></li>
        </ul>
      </div>
      <div class="navbar-end">
        <button class="btn btn-ghost btn-circle">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-5 w-5"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor">
            <path
              stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </button>
        <button class="btn btn-ghost btn-circle">
          <div class="indicator">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-5 w-5"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor">
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
            </svg>
            <span class="badge badge-xs badge-primary indicator-item"></span>
          </div>
        </button>

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
  </div>
</body>
</html>