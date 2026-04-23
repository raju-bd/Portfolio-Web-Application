@extends('layouts.app')

@section('title', 'Success Stories')

@section('content')
<div class="container" style="padding: 50px 20px;">
    <h1 style="text-align: center; margin-bottom: 50px; font-size: 36px;">Success Stories</h1>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
        @forelse($stories as $story)
            <a href="{{ route('success-stories.detail', $story->slug) }}" style="text-decoration: none; color: inherit;">
                <div style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: transform 0.3s;">
                    @if($story->featured_image)
                        <img src="{{ asset('storage/' . $story->featured_image) }}" alt="{{ $story->title }}" style="width: 100%; height: 200px; object-fit: cover;">
                    @else
                        <div style="width: 100%; height: 200px; background: linear-gradient(135deg, #667eea, #764ba2); display: flex; align-items: center; justify-content: center; color: white; font-weight: bold; text-align: center; padding: 20px;">
                            {{ $story->title }}
                        </div>
                    @endif
                    <div style="padding: 20px;">
                        <h3 style="margin-bottom: 10px;">{{ $story->title }}</h3>
                        @if($story->client_name)
                            <p style="color: #7f8c8d; font-size: 14px; margin-bottom: 10px;">Client: {{ $story->client_name }}</p>
                        @endif
                        <p style="color: #555;">{{ Str::limit($story->description, 100) }}</p>
                    </div>
                </div>
            </a>
        @empty
            <p style="grid-column: 1 / -1; text-align: center;">No success stories yet</p>
        @endforelse
    </div>

    {{ $stories->links() }}
</div>
@endsection
