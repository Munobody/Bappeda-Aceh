<nav class="fixed top-0 left-0 right-0 z-50">
    <div class="container mx-auto px-4">
        <div class="backdrop-blur-lg bg-white/90 shadow-lg rounded-lg mt-3 px-4 py-3 flex justify-between items-center transition-all duration-300">
            <!-- Left Section: Logo & Mobile Menu Button -->
            <div class="flex items-center gap-4">
                <!-- Mobile Menu Button -->
                <button id="mobile-menu-button" class="lg:hidden text-emerald-800 hover:text-emerald-600 transition-colors" onclick="toggleMenu()">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                </button>
                
                <!-- Logo -->
                <a href="/" class="flex items-center gap-2">
                    <img src="{{ asset('images/logo 2.png') }}" alt="BAPPEDA ACEH" class="h-10 w-auto">
                    <div class="hidden md:block">
                        <span class="font-bold text-emerald-800 text-lg">BAPPEDA</span>
                        <span class="text-emerald-700 ml-1">ACEH</span>
                    </div>
                </a>
            </div>

            <!-- Center Section: Main Navigation (Desktop) -->
            <div class="hidden lg:block">
                <ul class="flex items-center space-x-8">
                    <li>
                        <a href="/home" class="flex items-center gap-1 text-emerald-800 hover:text-emerald-600 py-2 border-b-2 border-transparent hover:border-emerald-500 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                            </svg>
                            <span class="font-medium">SI-IRA</span>
                        </a>
                    </li>
                    <li>
                        <a href="/" class="flex items-center gap-1 text-emerald-800 hover:text-emerald-600 py-2 border-b-2 border-transparent hover:border-emerald-500 transition-all duration-200">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                            </svg>
                            <span class="font-medium">Data</span>
                        </a>
                    </li>
                </ul>
            </div>

            <!-- Right Section: User & Theme Controls -->
            <div class="flex items-center gap-2">
                <!-- Theme Selector -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="p-2 rounded-full hover:bg-emerald-100 transition-colors duration-200 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </button>
                    <div x-show="open" @click.outside="open = false" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden z-50" style="display: none;">
                        <div class="py-1">
                            <button onclick="setTheme('light')" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-white border border-gray-300"></span>
                                Light Mode
                            </button>
                            <button onclick="setTheme('dark')" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-gray-900 border border-gray-700"></span>
                                Dark Mode
                            </button>
                            <button onclick="setTheme('green')" class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 flex items-center gap-2">
                                <span class="w-4 h-4 rounded-full bg-emerald-600 border border-emerald-700"></span>
                                Green Mode
                            </button>
                        </div>
                    </div>
                </div>

                <!-- User Menu -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" class="p-2 rounded-full hover:bg-emerald-100 transition-colors duration-200 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-emerald-800" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </button>
                    <div x-show="open" @click.outside="open = false" id="admin-menu" class="absolute right-0 mt-2 w-48 bg-white shadow-lg rounded-lg overflow-hidden z-50" style="display: none;">
                        <div class="py-1">
                            @if(Auth::check())
                                <a href="/admin" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    Settings
                                </a>
                                <form action="/admin/logout" method="POST">
                                    @csrf
                                    <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 flex items-center gap-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                                        </svg>
                                        Logout
                                    </button>
                                </form>
                            @else
                                <a href="/login" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 flex items-center gap-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
                                    </svg>
                                    Login as Admin
                                </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Mobile Menu (Hidden by Default) -->
    <div id="mobile-menu" class="hidden container mx-auto px-4">
        <div class="bg-white/90 backdrop-blur-lg mt-1 p-4 rounded-lg shadow-lg">
            <ul class="flex flex-col space-y-3">
                <li>
                    <a href="/home" class="flex items-center gap-3 px-4 py-2 text-emerald-800 hover:bg-emerald-50 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span class="font-medium">SI-IRA</span>
                    </a>
                </li>
                <li>
                    <a href="/" class="flex items-center gap-3 px-4 py-2 text-emerald-800 hover:bg-emerald-50 rounded-lg transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                        <span class="font-medium">Data</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    // Theme functions
    function setTheme(theme) {
        const root = document.documentElement;
        switch (theme) {
            case 'light':
                root.style.setProperty('--bg-color', '#ffffff');
                root.style.setProperty('--text-color', '#000000');
                break;
            case 'dark':
                root.style.setProperty('--bg-color', '#1A3636');
                root.style.setProperty('--text-color', '#ffffff');
                break;
            case 'green':
                root.style.setProperty('--bg-color', '#2F8886');
                root.style.setProperty('--text-color', '#ffffff');
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

    // Toggle mobile menu function
    function toggleMenu() {
        const menu = document.getElementById('mobile-menu');
        menu.classList.toggle('hidden');
    }

    // Toggle admin menu function
    function toggleAdminMenu() {
        const menu = document.getElementById('admin-menu');
        menu.classList.toggle('hidden');
    }

    // Apply saved theme on page load
    document.addEventListener('DOMContentLoaded', function() {
        const savedTheme = localStorage.getItem('theme') || 'light';
        setTheme(savedTheme);
        
        // Initialize Alpine.js components if needed
        if (typeof Alpine !== 'undefined') {
            Alpine.start();
        }
    });
</script>

<!-- Alpine.js for dropdowns -->
<script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>