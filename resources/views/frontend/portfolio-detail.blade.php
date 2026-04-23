@extends('layouts.app')

@section('title', $project->title)

@section('content')
<div class="container" style="max-width: 1000px; padding: 50px 20px;">
    @if($project->featured_image)
        <img src="{{ asset('storage/' . $project->featured_image) }}" alt="{{ $project->title }}" style="width: 100%; height: 400px; object-fit: cover; border-radius: 8px; margin-bottom: 30px;">
    @endif

    <h1 style="margin-bottom: 20px;">{{ $project->title }}</h1>
    <p style="color: #7f8c8d; margin-bottom: 30px; font-size: 16px;">{{ $project->category }}</p>

    <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
        <div>
            <h2 style="margin-bottom: 15px;">Project Details</h2>
            <p style="line-height: 1.8; margin-bottom: 30px;">{{ $project->description }}</p>

            @if($project->key_features && count($project->key_features) > 0)
                <h3 style="margin-bottom: 15px;">Key Features</h3>
                <ul style="list-style: none; margin-bottom: 30px;">
                    @foreach($project->key_features as $feature)
                        <li style="padding: 8px 0; padding-left: 25px; position: relative;">
                            <span style="position: absolute; left: 0;">✓</span>
                            {{ $feature }}
                        </li>
                    @endforeach
                </ul>
            @endif

            @if($project->tech_stack && count($project->tech_stack) > 0)
                <h3 style="margin-bottom: 15px;">Technology Stack</h3>
                <div style="display: flex; flex-wrap: wrap; gap: 10px;">
                    @foreach($project->tech_stack as $tech)
                        <span style="background: #e8f4f8; color: #0288d1; padding: 8px 15px; border-radius: 20px;">
                            {{ $tech }}
                        </span>
                    @endforeach
                </div>
            @endif
        </div>

        <aside>
            <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                @if($project->client_name)
                    <p style="margin-bottom: 15px;">
                        <strong>Client:</strong><br>
                        {{ $project->client_name }}
                    </p>
                @endif

                @if($project->project_url)
                    <p style="margin-bottom: 15px;">
                        <strong>Project URL:</strong><br>
                        <a href="{{ $project->project_url }}" target="_blank" style="color: #667eea;">
                            Visit Project →
                        </a>
                    </p>
                @endif

                <p style="margin-bottom: 15px;">
                    <strong>Category:</strong><br>
                    {{ $project->category }}
                </p>

                <p>
                    <strong>Status:</strong><br>
                    <span style="background: #d4edda; color: #155724; padding: 4px 8px; border-radius: 3px; font-size: 12px;">
                        Active
                    </span>
                </p>
            </div>
        </aside>
    </div>

    @if($relatedProjects->count() > 0)
        <div style="margin-top: 60px; border-top: 1px solid #eee; padding-top: 40px;">
            <h2 style="margin-bottom: 30px;">Related Projects</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                @foreach($relatedProjects as $related)
                    <a href="{{ route('portfolio.detail', $related->slug) }}" style="text-decoration: none; color: inherit;">
                        <div style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                            <div style="width: 100%; height: 150px; background: linear-gradient(135deg, #667eea, #764ba2); display: flex; align-items: center; justify-content: center; color: white;">
                                {{ $related->title }}
                            </div>
                            <div style="padding: 15px;">
                                <h3 style="margin-bottom: 10px; font-size: 16px;">{{ $related->title }}</h3>
                                <p style="color: #7f8c8d; font-size: 14px;">{{ $related->category }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
