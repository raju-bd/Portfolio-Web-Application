@extends('layouts.app')

@section('title', $category->name . ' - Blog')

@section('content')
<div class="container" style="padding: 50px 20px; max-width: 900px;">
    <h1 style="text-align: center; margin-bottom: 50px; font-size: 36px;">{{ $category->name }}</h1>

    @forelse($posts as $post)
        <article style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
            @if($post->featured_image)
                <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;">
            @endif
            <h2 style="margin-bottom: 10px;"><a href="{{ route('blog.detail', $post->slug) }}">{{ $post->title }}</a></h2>
            <p style="color: #7f8c8d; font-size: 14px; margin-bottom: 15px;">
                {{ $post->published_at->format('M d, Y') }} | {{ $post->views }} views
            </p>
            <p style="color: #555; margin-bottom: 15px;">{{ $post->excerpt ?? Str::limit($post->content, 150) }}</p>
            <a href="{{ route('blog.detail', $post->slug) }}" style="color: #667eea; font-weight: 600;">Read More →</a>
        </article>
    @empty
        <p style="text-align: center;">No posts in this category yet</p>
    @endforelse

    {{ $posts->links() }}

    <div style="text-align: center; margin-top: 40px;">
        <a href="{{ route('blog') }}" style="color: #667eea; font-weight: 600;">← Back to Blog</a>
    </div>
</div>
@endsection
