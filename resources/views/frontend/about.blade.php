@extends('layouts.app')

@section('title', 'About')

@section('content')
<style>
    .about-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 50px 20px;
    }

    .about-header {
        text-align: center;
        margin-bottom: 60px;
    }

    .about-header h1 {
        font-size: 48px;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .about-content {
        background: white;
        border-radius: 10px;
        padding: 40px;
        margin-bottom: 40px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    html.dark .about-content {
        background: #1e293b;
    }

    .skills-section,
    .certifications-section {
        margin-top: 40px;
    }

    .skills-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-top: 20px;
    }

    .skill-item {
        background: #f5f7fa;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #667eea;
    }

    html.dark .skill-item {
        background: #334155;
    }

    .skill-item h3 {
        margin-bottom: 10px;
    }
</style>

<div class="about-container">
    <div class="about-header">
        <h1>About Me</h1>
        <p style="font-size: 18px; color: #7f8c8d;">Developer | Innovator | Problem Solver</p>
    </div>

    <div class="about-content">
        <h2 style="margin-bottom: 20px;">Hello! 👋</h2>
        <p style="line-height: 1.8; margin-bottom: 20px; font-size: 16px;">
            I'm a full-stack developer with a passion for creating beautiful, functional web applications. 
            With years of experience in web development, I specialize in Laravel, Vue.js, and modern web technologies.
        </p>
        <p style="line-height: 1.8; font-size: 16px;">
            I love working on challenging projects that push the boundaries of what's possible on the web. 
            When I'm not coding, you'll find me exploring new technologies and contributing to the open-source community.
        </p>
    </div>

    <!-- Skills Section -->
    <div class="about-content">
        <h2>Technical Skills</h2>
        <div class="skills-grid">
            @forelse($skills->groupBy('category') as $category => $categorySkills)
                <div>
                    <h3 style="text-transform: capitalize; margin-bottom: 15px;">{{ $category }}</h3>
                    @foreach($categorySkills as $skill)
                        <div style="margin-bottom: 15px;">
                            <p style="font-weight: 600; margin-bottom: 5px;">{{ $skill->name }}</p>
                            <div style="background: #e0e0e0; height: 6px; border-radius: 3px; overflow: hidden;">
                                <div style="background: linear-gradient(90deg, #667eea, #764ba2); width: {{ $skill->proficiency }}%; height: 100%;"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @empty
                <p>No skills added yet</p>
            @endforelse
        </div>
    </div>

    <!-- Certifications -->
    @if($certifications->count() > 0)
        <div class="about-content">
            <h2>Certifications & Badges</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px; margin-top: 20px;">
                @foreach($certifications as $cert)
                    <div style="border: 1px solid #ddd; padding: 20px; border-radius: 8px; text-align: center;">
                        @if($cert->badge_image)
                            <img src="{{ asset('storage/' . $cert->badge_image) }}" alt="{{ $cert->title }}" style="max-width: 100px; margin-bottom: 15px;">
                        @endif
                        <h3 style="margin-bottom: 5px;">{{ $cert->title }}</h3>
                        <p style="color: #7f8c8d; font-size: 14px;">{{ $cert->issuer }}</p>
                        <p style="color: #7f8c8d; font-size: 12px;">{{ $cert->issued_date->format('M Y') }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
