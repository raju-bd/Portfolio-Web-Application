@extends('layouts.app')

@section('title', 'Portfolio')

@section('content')
<div class="container" style="padding: 50px 20px;">
    <h1 style="text-align: center; margin-bottom: 50px; font-size: 36px;">My Projects</h1>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
        @forelse($projects as $project)
            <div style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: transform 0.3s;">
                @if($project->featured_image)
                    <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" style="width: 100%; height: 220px; object-fit: cover;">
                @else
                    <div style="width: 100%; height: 220px; background: linear-gradient(135deg, #667eea, #764ba2); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold;">
                        {{ $project->title }}
                    </div>
                @endif
                <div style="padding: 20px;">
                    <h3 style="margin-bottom: 10px;"><a href="{{ route('portfolio.detail', $project->slug) }}">{{ $project->title }}</a></h3>
                    <p style="color: #7f8c8d; font-size: 14px; margin-bottom: 10px;">{{ $project->category }}</p>
                    <p style="color: #555; margin-bottom: 15px;">{{ Str::limit($project->description, 100) }}</p>
                    <a href="{{ route('portfolio.detail', $project->slug) }}" style="color: #667eea; font-weight: 600;">View Project →</a>
                </div>
            </div>
        @empty
            <p style="grid-column: 1 / -1; text-align: center;">No projects yet</p>
        @endforelse
    </div>

    {{ $projects->links() }}
</div>
@endsection
