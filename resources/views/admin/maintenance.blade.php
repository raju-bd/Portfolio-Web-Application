@extends('layouts.admin')

@section('page-title', 'Maintenance Settings')

@section('content')
<div class="card" style="max-width: 600px;">
    <form method="POST" action="{{ route('admin.maintenance.update') }}">
        @csrf

        <div class="form-group">
            <h3>Site Maintenance</h3>
            <label><input type="checkbox" name="maintenance_mode" {{ $maintenanceMode ? 'checked' : '' }}> Enable Maintenance Mode</label>
            <p style="color: #7f8c8d; margin-top: 10px; font-size: 14px;">When enabled, only logged-in users can access the site.</p>
        </div>

        <div class="form-group">
            <h3>Theme Settings</h3>
            <label for="theme_mode">Theme Mode</label>
            <select id="theme_mode" name="theme_mode" required>
                <option value="system" {{ $themeMode === 'system' ? 'selected' : '' }}>System Default (Auto Detect)</option>
                <option value="light" {{ $themeMode === 'light' ? 'selected' : '' }}>Light Mode</option>
                <option value="dark" {{ $themeMode === 'dark' ? 'selected' : '' }}>Dark Mode</option>
            </select>
            <p style="color: #7f8c8d; margin-top: 10px; font-size: 14px;">Users can override this preference in their browser.</p>
        </div>

        <button type="submit" class="btn btn-primary">Save Settings</button>
    </form>
</div>

<div class="card" style="max-width: 600px; margin-top: 30px; background: #eff6fc;">
    <h3>ℹ️  Information</h3>
    <ul style="list-style: none; padding-left: 0;">
        <li style="padding: 10px 0; border-bottom: 1px solid #ddd;">
            <strong>Maintenance Mode:</strong> Displays a maintenance page to non-authenticated users
        </li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ddd;">
            <strong>Theme Mode:</strong> Controls the default theme appearance across the site
        </li>
        <li style="padding: 10px 0;">
            <strong>User Override:</strong> Visitors can still toggle dark/light mode manually using the theme toggle button
        </li>
    </ul>
</div>
@endsection
