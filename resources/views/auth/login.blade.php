@extends('layouts.app')

@section('title', 'Login')

@section('content')
<style>
    .login-container {
        max-width: 400px;
        margin: 80px auto;
        padding: 30px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }

    html.dark .login-container {
        background: #1e293b;
    }

    .login-container h1 {
        text-align: center;
        margin-bottom: 30px;
        font-size: 28px;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
    }

    .form-group input {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 14px;
    }

    html.dark .form-group input {
        background: #0f172a;
        color: #e2e8f0;
        border-color: #334155;
    }

    .login-btn {
        width: 100%;
        padding: 12px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        border: none;
        border-radius: 5px;
        font-weight: 600;
        cursor: pointer;
        font-size: 16px;
    }

    .login-btn:hover {
        opacity: 0.9;
    }
</style>

<div class="login-container">
    <h1>Admin Login</h1>

    <form method="POST" action="{{ route('login.store') }}">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required value="{{ old('email') }}" autofocus>
            @error('email')
                <span style="color: #e74c3c; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
            @error('password')
                <span style="color: #e74c3c; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label><input type="checkbox" name="remember"> Remember me</label>
        </div>

        <button type="submit" class="login-btn">Login</button>
    </form>
</div>
@endsection
