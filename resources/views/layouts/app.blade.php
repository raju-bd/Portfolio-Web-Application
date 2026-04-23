<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Portfolio')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        // Theme Mode Detection
        const themeMode = localStorage.getItem('theme') || 'system';
        const prefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
        
        if (themeMode === 'dark' || (themeMode === 'system' && prefersDark)) {
            document.documentElement.classList.add('dark');
        }
    </script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary: #3b82f6;
            --primary-dark: #1e40af;
            --secondary: #8b5cf6;
            --accent: #ec4899;
            --bg-light: #f8fafc;
            --bg-dark: #0f172a;
            --text-light: #1e293b;
            --text-dark: #e2e8f0;
            --border-light: #e2e8f0;
            --border-dark: #334155;
        }

        html.dark {
            --primary: #60a5fa;
            --text: var(--text-dark);
            --bg: var(--bg-dark);
            --border: var(--border-dark);
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background-color: var(--bg-light, #ffffff);
            color: var(--text-light, #1e293b);
            transition: background-color 0.3s, color 0.3s;
        }

        html.dark body {
            background-color: var(--bg-dark, #0f172a);
            color: var(--text-dark, #e2e8f0);
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        a {
            color: var(--primary);
            text-decoration: none;
            transition: color 0.2s;
        }

        a:hover {
            color: var(--primary-dark);
        }

        html.dark a:hover {
            color: var(--secondary);
        }
    </style>
    @stack('styles')
</head>
<body class="antialiased">
    <nav class="bg-white dark:bg-gray-900 shadow-md sticky top-0 z-50">
        <div class="container py-4">
            <div class="flex justify-between items-center">
                <a href="{{ route('home') }}" class="text-2xl font-bold text-blue-600">Portfolio</a>
                
                <div class="hidden md:flex gap-8 items-center">
                    <a href="{{ route('home') }}" class="hover:text-blue-600">Home</a>
                    <a href="{{ route('about') }}" class="hover:text-blue-600">About</a>
                    <a href="{{ route('portfolio') }}" class="hover:text-blue-600">Portfolio</a>
                    <a href="{{ route('services') }}" class="hover:text-blue-600">Services</a>
                    <a href="{{ route('blog') }}" class="hover:text-blue-600">Blog</a>
                    <a href="{{ route('contact') }}" class="hover:text-blue-600">Contact</a>
                    
                    @auth
                        <a href="{{ route('admin.dashboard') }}" class="text-purple-600 font-semibold">Admin</a>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-800">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="bg-blue-600 text-white px-4 py-2 rounded">Login</a>
                    @endauth

                    <!-- Theme Toggle -->
                    <button id="themeToggle" class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700">
                        <span id="themeIcon" class="text-xl">☀️</span>
                    </button>
                </div>

                <button id="mobileMenuBtn" class="md:hidden p-2">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div id="mobileMenu" class="hidden md:hidden absolute top-16 left-0 right-0 bg-white dark:bg-gray-900 shadow-lg">
        <div class="container py-4 space-y-4">
            <a href="{{ route('home') }}" class="block hover:text-blue-600">Home</a>
            <a href="{{ route('about') }}" class="block hover:text-blue-600">About</a>
            <a href="{{ route('portfolio') }}" class="block hover:text-blue-600">Portfolio</a>
            <a href="{{ route('services') }}" class="block hover:text-blue-600">Services</a>
            <a href="{{ route('blog') }}" class="block hover:text-blue-600">Blog</a>
            <a href="{{ route('contact') }}" class="block hover:text-blue-600">Contact</a>
        </div>
    </div>

    <!-- Flash Messages -->
    @if ($message = Session::get('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative my-4 container" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @endif

    @if ($message = Session::get('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-4 container" role="alert">
            <span class="block sm:inline">{{ $message }}</span>
        </div>
    @endif

    @yield('content')

    <script>
        // Theme Toggle
        const themeToggle = document.getElementById('themeToggle');
        const themeIcon = document.getElementById('themeIcon');
        const html = document.documentElement;

        themeToggle.addEventListener('click', () => {
            const isDark = html.classList.contains('dark');
            if (isDark) {
                html.classList.remove('dark');
                localStorage.setItem('theme', 'light');
                themeIcon.textContent = '☀️';
            } else {
                html.classList.add('dark');
                localStorage.setItem('theme', 'dark');
                themeIcon.textContent = '🌙';
            }
        });

        // Set initial icon
        if (html.classList.contains('dark')) {
            themeIcon.textContent = '🌙';
        }

        // Mobile Menu Toggle
        document.getElementById('mobileMenuBtn').addEventListener('click', () => {
            document.getElementById('mobileMenu').classList.toggle('hidden');
        });
    </script>
    @stack('scripts')
</body>
</html>
