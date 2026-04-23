<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Dashboard')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: #f5f7fa;
        }

        .sidebar {
            width: 250px;
            background: #2c3e50;
            color: white;
            position: fixed;
            left: 0;
            top: 0;
            height: 100vh;
            overflow-y: auto;
            padding-top: 20px;
        }

        .sidebar a {
            color: #ecf0f1;
            text-decoration: none;
            padding: 12px 20px;
            display: block;
            border-left: 3px solid transparent;
            transition: all 0.3s;
        }

        .sidebar a:hover {
            background: #34495e;
            border-left-color: #3498db;
        }

        .sidebar a.active {
            background: #3498db;
            border-left-color: #2980b9;
        }

        .main-content {
            margin-left: 250px;
            padding: 30px;
        }

        .topbar {
            background: white;
            padding: 20px 30px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
            margin-bottom: 30px;
            border-radius: 5px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-size: 14px;
            transition: all 0.3s;
        }

        .btn-primary {
            background: #3498db;
            color: white;
        }

        .btn-primary:hover {
            background: #2980b9;
        }

        .btn-danger {
            background: #e74c3c;
            color: white;
        }

        .btn-danger:hover {
            background: #c0392b;
        }

        .btn-secondary {
            background: #95a5a6;
            color: white;
        }

        .btn-secondary:hover {
            background: #7f8c8d;
        }

        .card {
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
        }

        .stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-box {
            background: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            text-align: center;
            border-left: 4px solid #3498db;
        }

        .stat-box h3 {
            color: #7f8c8d;
            font-size: 14px;
            margin-bottom: 10px;
        }

        .stat-box .number {
            font-size: 32px;
            font-weight: bold;
            color: #2c3e50;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table thead {
            background: #34495e;
            color: white;
        }

        table th {
            padding: 15px;
            text-align: left;
            font-weight: 600;
        }

        table td {
            padding: 15px;
            border-bottom: 1px solid #ecf0f1;
        }

        table tbody tr:hover {
            background: #f8f9fa;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2c3e50;
        }

        .form-group input,
        .form-group textarea,
        .form-group select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 150px;
        }

        .alert {
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .alert-success {
            background: #d4edda;
            border: 1px solid #c3e6cb;
            color: #155724;
        }

        .alert-error {
            background: #f8d7da;
            border: 1px solid #f5c6cb;
            color: #721c24;
        }

        .alert-warning {
            background: #fff3cd;
            border: 1px solid #ffeeba;
            color: #856404;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
            }
            .main-content {
                margin-left: 200px;
                padding: 20px;
            }
            .stats {
                grid-template-columns: 1fr;
            }
            table {
                font-size: 12px;
            }
            table th, table td {
                padding: 10px;
            }
        }

        @media (max-width: 576px) {
            .sidebar {
                position: absolute;
                transform: translateX(-100%);
                transition: transform 0.3s;
                z-index: 1000;
            }
            .sidebar.show {
                transform: translateX(0);
            }
            .main-content {
                margin-left: 0;
                padding: 15px;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="sidebar">
        <div style="padding: 0 20px; margin-bottom: 30px;">
            <h2 style="color: #3498db;">Portfolio Admin</h2>
        </div>

        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">Dashboard</a>
        
        <div style="padding: 20px 0; border-top: 1px solid #34495e;">
            <p style="padding: 12px 20px; color: #95a5a6; font-size: 12px; font-weight: bold;">CONTENT</p>
            <a href="{{ route('admin.skills.index') }}" class="{{ request()->routeIs('admin.skills.*') ? 'active' : '' }}">Skills</a>
            <a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects.*') ? 'active' : '' }}">Projects</a>
            <a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services.*') ? 'active' : '' }}">Services</a>
            <a href="{{ route('admin.blog.index') }}" class="{{ request()->routeIs('admin.blog.*') ? 'active' : '' }}">Blog Posts</a>
            <a href="{{ route('admin.blog-categories.index') }}" class="{{ request()->routeIs('admin.blog-categories.*') ? 'active' : '' }}">Blog Categories</a>
            <a href="{{ route('admin.success-stories.index') }}" class="{{ request()->routeIs('admin.success-stories.*') ? 'active' : '' }}">Success Stories</a>
            <a href="{{ route('admin.certifications.index') }}" class="{{ request()->routeIs('admin.certifications.*') ? 'active' : '' }}">Certifications</a>
        </div>

        <div style="padding: 20px 0; border-top: 1px solid #34495e;">
            <p style="padding: 12px 20px; color: #95a5a6; font-size: 12px; font-weight: bold;">MEDIA</p>
            <a href="{{ route('admin.gallery.index') }}" class="{{ request()->routeIs('admin.gallery.*') ? 'active' : '' }}">Gallery</a>
        </div>

        <div style="padding: 20px 0; border-top: 1px solid #34495e;">
            <p style="padding: 12px 20px; color: #95a5a6; font-size: 12px; font-weight: bold;">MESSAGES</p>
            <a href="{{ route('admin.contact.index') }}" class="{{ request()->routeIs('admin.contact.*') ? 'active' : '' }}">
                Contact Messages
                @if(\\App\\Models\\ContactMessage::unread()->count() > 0)
                    <span style="background: #e74c3c; color: white; border-radius: 50%; width: 20px; height: 20px; display: inline-flex; align-items: center; justify-content: center; font-size: 12px; margin-left: 10px;">
                        {{ \\App\\Models\\ContactMessage::unread()->count() }}
                    </span>
                @endif
            </a>
        </div>

        <div style="padding: 20px 0; border-top: 1px solid #34495e;">
            <p style="padding: 12px 20px; color: #95a5a6; font-size: 12px; font-weight: bold;">SETTINGS</p>
            <a href="{{ route('admin.counters.index') }}" class="{{ request()->routeIs('admin.counters.*') ? 'active' : '' }}">Counters</a>
            <a href="{{ route('admin.maintenance') }}" class="{{ request()->routeIs('admin.maintenance') ? 'active' : '' }}">Maintenance</a>
        </div>

        <div style="padding: 20px 0; border-top: 1px solid #34495e;">
            <p style="padding: 12px 20px; color: #95a5a6; font-size: 12px; font-weight: bold;">ACCOUNT</p>
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" style="width: 100%; padding: 12px 20px; background: none; border: none; color: #ecf0f1; text-align: left; cursor: pointer; font-size: 14px;">Logout</button>
            </form>
        </div>
    </div>

    <div class="main-content">
        <div class="topbar">
            <h1 style="font-size: 24px; margin: 0;">@yield('page-title', 'Dashboard')</h1>
            <div>
                <span style="margin-right: 20px;">Welcome, <strong>{{ auth()->user()->name }}</strong></span>
                <a href="{{ route('home') }}" class="btn btn-secondary" target="_blank">View Site</a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-error">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">{{ session('error') }}</div>
        @endif

        @yield('content')
    </div>

    @stack('scripts')
</body>
</html>
