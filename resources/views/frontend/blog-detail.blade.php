@extends('layouts.app')

@section('title', $post->title)

@section('content')
<div class="container" style="padding: 50px 20px; max-width: 900px;">
    @if($post->featured_image)
        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" style="width: 100%; height: 400px; object-fit: cover; border-radius: 8px; margin-bottom: 30px;">
    @endif

    <h1 style="margin-bottom: 20px;">{{ $post->title }}</h1>
    <p style="color: #7f8c8d; margin-bottom: 30px;">
        {{ $post->published_at->format('M d, Y') }} | Category: <a href="{{ route('blog.category', $post->category->slug) }}">{{ $post->category->name }}</a>
    </p>

    <div style="background: white; padding: 30px; border-radius: 8px; line-height: 1.8; margin-bottom: 40px;">
        {!! $post->content !!}
    </div>

    @if($post->tags && count($post->tags) > 0)
        <div style="margin-bottom: 40px;">
            <h3 style="margin-bottom: 15px;">Tags:</h3>
            <div>
                @foreach($post->tags as $tag)
                    <span style="background: #e8f4f8; color: #0288d1; padding: 6px 15px; border-radius: 20px; margin-right: 8px; display: inline-block; margin-bottom: 8px;">
                        {{ $tag }}
                    </span>
                @endforeach
            </div>
        </div>
    @endif

    @if($relatedPosts->count() > 0)
        <div>
            <h2 style="margin-bottom: 20px;">Related Posts</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 20px;">
                @foreach($relatedPosts as $related)
                    <article style="background: white; padding: 15px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        <h3 style="margin-bottom: 10px;"><a href="{{ route('blog.detail', $related->slug) }}">{{ $related->title }}</a></h3>
                        <p style="color: #7f8c8d; font-size: 14px;">{{ $related->published_at->format('M d, Y') }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
