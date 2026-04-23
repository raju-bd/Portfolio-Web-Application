@extends('layouts.app')

@section('title', 'Home')

@section('content')
<style>
    .hero {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        padding: 100px 20px;
        text-align: center;
    }

    .hero h1 {
        font-size: 48px;
        margin-bottom: 20px;
        font-weight: bold;
    }

    .hero p {
        font-size: 20px;
        margin-bottom: 30px;
    }

    .hero-btn {
        display: inline-block;
        background: white;
        color: #667eea;
        padding: 15px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: bold;
        transition: transform 0.3s;
    }

    .hero-btn:hover {
        transform: translateY(-3px);
    }

    .section {
        padding: 80px 20px;
    }

    .section-title {
        font-size: 36px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 50px;
        color: #2c3e50;
    }

    html.dark .section-title {
        color: #e2e8f0;
    }

    .skills-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 30px;
        margin-bottom: 50px;
    }

    .skill-card {
        background: white;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        text-align: center;
        transition: transform 0.3s;
    }

    html.dark .skill-card {
        background: #1e293b;
        box-shadow: 0 4px 6px rgba(0,0,0,0.3);
    }

    .skill-card:hover {
        transform: translateY(-10px);
    }

    .skill-card .icon {
        font-size: 48px;
        margin-bottom: 15px;
    }

    .skill-card h3 {
        margin-bottom: 15px;
        font-size: 20px;
    }

    .progress-bar {
        background: #e0e0e0;
        height: 8px;
        border-radius: 10px;
        overflow: hidden;
        margin-top: 15px;
    }

    html.dark .progress-bar {
        background: #334155;
    }

    .progress-fill {
        background: linear-gradient(90deg, #667eea, #764ba2);
        height: 100%;
        border-radius: 10px;
        transition: width 0.3s;
    }

    .counters {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 30px;
        background: #f5f7fa;
        padding: 40px;
        border-radius: 10px;
        text-align: center;
    }

    html.dark .counters {
        background: #1e293b;
    }

    .counter {
        font-size: 36px;
        font-weight: bold;
        color: #667eea;
    }

    .counter-label {
        color: #7f8c8d;
        margin-top: 10px;
    }

    .projects-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 30px;
    }

    .project-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.3s;
    }

    html.dark .project-card {
        background: #1e293b;
    }

    .project-card:hover {
        transform: translateY(-10px);
    }

    .project-image {
        width: 100%;
        height: 180px;
        background: linear-gradient(135deg, #667eea, #764ba2);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
    }

    .project-content {
        padding: 20px;
    }

    .project-content h3 {
        margin-bottom: 10px;
        font-size: 18px;
    }

    .project-content p {
        color: #7f8c8d;
        margin-bottom: 15px;
        font-size: 14px;
    }

    .tech-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
    }

    .tech-tag {
        background: #e8f4f8;
        color: #0288d1;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
    }

    html.dark .tech-tag {
        background: #1e3c4a;
        color: #4dd0e1;
    }

    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
    }

    .gallery-item {
        position: relative;
        overflow: hidden;
        border-radius: 10px;
        background: #f0f0f0;
        aspect-ratio: 1;
        cursor: pointer;
    }

    .gallery-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s;
    }

    .gallery-item:hover img {
        transform: scale(1.1);
    }

    .container {
        max-width: 1200px;
        margin: 0 auto;
    }
</style>

<!-- Hero Section -->
<section class="hero">
    <div class="container">
        <h1>Welcome to My Portfolio</h1>
        <p>Full Stack Developer | AI Enthusiast | Tech Innovator</p>
        <div>
            <a href="#portfolio" class="hero-btn">View My Work</a>
            <a href="{{ route('contact') }}" class="hero-btn" style="margin-left: 20px; background: transparent; border: 2px solid white;">Get In Touch</a>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section class="section">
    <div class="container">
        <h2 class="section-title">My Skills & Expertise</h2>
        <div class="skills-grid">
            @forelse($skills as $skill)
                <div class="skill-card">
                    <div class="icon">{{ $skill->icon ?? '🔧' }}</div>
                    <h3>{{ $skill->name }}</h3>
                    <p style="color: #7f8c8d; font-size: 14px;">{{ $skill->category }}</p>
                    <div class="progress-bar">
                        <div class="progress-fill" style="width: {{ $skill->proficiency }}%"></div>
                    </div>
                    <p style="margin-top: 10px; font-weight: bold;">{{ $skill->proficiency }}%</p>
                </div>
            @empty
                <p style="grid-column: 1 / -1; text-align: center;">No skills added yet</p>
            @endforelse
        </div>
    </div>
</section>

<!-- Counters Section -->
@if($counters->count() > 0)
    <section class="section" style="background: #f5f7fa;">
        <div class="container">
            <div class="counters">
                @foreach($counters as $counter)
                    <div class="counter-item">
                        <div class="counter-label">{{ $counter->label }}</div>
                        <div class="counter" id="count-{{ $counter->id }}">0</div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

<!-- Featured Projects -->
<section class="section" id="portfolio">
    <div class="container">
        <h2 class="section-title">Featured Projects</h2>
        <div class="projects-grid">
            @forelse($projects as $project)
                <a href="{{ route('portfolio.detail', $project->slug) }}" style="text-decoration: none; color: inherit;">
                    <div class="project-card">
                        <div class="project-image">
                            @if($project->featured_image)
                                <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                            @else
                                {{ $project->title }}
                            @endif
                        </div>
                        <div class="project-content">
                            <h3>{{ $project->title }}</h3>
                            <p>{{ Str::limit($project->description, 100) }}</p>
                            @if($project->tech_stack)
                                <div class="tech-tags">
                                    @foreach(array_slice($project->tech_stack, 0, 3) as $tech)
                                        <span class="tech-tag">{{ $tech }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    </div>
                </a>
            @empty
                <p style="grid-column: 1 / -1; text-align: center;">No projects added yet</p>
            @endforelse
        </div>
        <div style="text-align: center; margin-top: 40px;">
            <a href="{{ route('portfolio') }}" class="hero-btn">View All Projects</a>
        </div>
    </div>
</section>

<!-- Certifications -->
@if($certifications->count() > 0)
    <section class="section" style="background: #f5f7fa;">
        <div class="container">
            <h2 class="section-title">Professional Certifications & Badges</h2>
            <div class="gallery-grid">
                @foreach($certifications as $cert)
                    <div class="gallery-item">
                        @if($cert->badge_image)
                            <img src="{{ asset('storage/' . $cert->badge_image) }}" alt="{{ $cert->title }}" title="{{ $cert->title }}">
                        @else
                            <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: linear-gradient(135deg, #667eea, #764ba2); color: white; font-weight: bold; text-align: center; padding: 20px;">
                                {{ $cert->title }}
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif

<!-- Colleague Gallery -->
@if($galleries->count() > 0)
    <section class="section">
        <div class="container">
            <h2 class="section-title">Team & Colleagues</h2>
            <div class="gallery-grid">
                @foreach($galleries as $gallery)
                    <div class="gallery-item" title="{{ $gallery->title }}">
                        @if($gallery->image)
                            <img src="{{ asset('storage/' . $gallery->image) }}" alt="{{ $gallery->title }}">
                        @else
                            <div style="display: flex; align-items: center; justify-content: center; height: 100%; background: #f0f0f0;">
                                No Image
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
            <div style="text-align: center; margin-top: 40px;">
                <a href="{{ route('gallery') }}" class="hero-btn">View Full Gallery</a>
            </div>
        </div>
    </section>
@endif

<!-- CTA Section -->
<section class="section" style="background: linear-gradient(135deg, #667eea, #764ba2); color: white; text-align: center;">
    <div class="container">
        <h2 style="font-size: 36px; margin-bottom: 20px;">Let's Work Together</h2>
        <p style="font-size: 18px; margin-bottom: 30px;">Have a question or want to collaborate? Get in touch!</p>
        <a href="{{ route('contact') }}" class="hero-btn">Contact Me</a>
    </div>
</section>

<script>
    // Animate counters
    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);
        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                element.textContent = target;
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(start);
            }
        }, 16);
    }

    document.addEventListener('DOMContentLoaded', () => {
        @foreach($counters as $counter)
            const el = document.getElementById('count-{{ $counter->id }}');
            if (el) animateCounter(el, {{ $counter->count }});
        @endforeach
    });
</script>
@endsection
