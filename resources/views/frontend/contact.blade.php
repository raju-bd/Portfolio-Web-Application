@extends('layouts.app')

@section('title', 'Contact Us')

@section('content')
<style>
    .contact-container {
        max-width: 800px;
        margin: 50px auto;
        padding: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    html.dark .contact-container {
        background: #1e293b;
    }

    .form-group {
        margin-bottom: 25px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #2c3e50;
    }

    html.dark .form-group label {
        color: #e2e8f0;
    }

    .form-group input,
    .form-group textarea {
        width: 100%;
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-family: inherit;
        font-size: 14px;
    }

    html.dark .form-group input,
    html.dark .form-group textarea {
        background: #0f172a;
        color: #e2e8f0;
        border-color: #334155;
    }

    .submit-btn {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        padding: 12px 30px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-weight: 600;
        font-size: 16px;
        transition: transform 0.2s;
    }

    .submit-btn:hover {
        transform: translateY(-2px);
    }
</style>

<div class="contact-container">
    <h1 style="text-align: center; margin-bottom: 30px;">Get In Touch</h1>

    <form method="POST" action="{{ route('contact.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Your Name</label>
            <input type="text" id="name" name="name" required value="{{ old('name') }}" placeholder="Enter your name">
            @error('name')
                <span style="color: #e74c3c; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Your Email</label>
            <input type="email" id="email" name="email" required value="{{ old('email') }}" placeholder="your.email@example.com">
            @error('email')
                <span style="color: #e74c3c; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" id="subject" name="subject" value="{{ old('subject') }}" placeholder="What is this about?">
            @error('subject')
                <span style="color: #e74c3c; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea id="message" name="message" required placeholder="Your message here..." style="min-height: 150px;">{{ old('message') }}</textarea>
            @error('message')
                <span style="color: #e74c3c; font-size: 14px;">{{ $message }}</span>
            @enderror
        </div>

        <button type="submit" class="submit-btn">Send Message</button>
    </form>
</div>
@endsection
