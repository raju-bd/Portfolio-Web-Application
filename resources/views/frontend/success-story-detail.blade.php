@extends('layouts.app')

@section('title', $story->title)

@section('content')
<div class="container" style="max-width: 900px; padding: 50px 20px;">
    @if($story->featured_image)
        <img src="{{ asset('storage/' . $story->featured_image) }}" alt="{{ $story->title }}" style="width: 100%; height: 400px; object-fit: cover; border-radius: 8px; margin-bottom: 30px;">
    @endif

    <h1 style="margin-bottom: 20px;">{{ $story->title }}</h1>
    <p style="color: #7f8c8d; margin-bottom: 30px; font-size: 16px;">
        @if($story->client_name)
            Client: {{ $story->client_name }} | 
        @endif
        Category: {{ $story->category }}
    </p>

    <div style="background: white; padding: 30px; border-radius: 8px; line-height: 1.8; margin-bottom: 40px;">
        {!! nl2br(e($story->description)) !!}
    </div>

    @if($relatedStories->count() > 0)
        <div style="border-top: 1px solid #eee; padding-top: 40px;">
            <h2 style="margin-bottom: 30px;">Related Case Studies</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                @foreach($relatedStories as $related)
                    <a href="{{ route('success-stories.detail', $related->slug) }}" style="text-decoration: none; color: inherit;">
                        <div style="background: white; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                            <div style="width: 100%; height: 150px; background: linear-gradient(135deg, #667eea, #764ba2); display: flex; align-items: center; justify-content: center; color: white; text-align: center; padding: 20px;">
                                {{ $related->title }}
                            </div>
                            <div style="padding: 15px;">
                                <h3 style="font-size: 16px;">{{ $related->title }}</h3>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
