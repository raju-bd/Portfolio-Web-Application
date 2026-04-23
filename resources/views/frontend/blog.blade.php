@extends('layouts.app')

@section('title', 'Blog')

@section('content')
<div class="container" style="padding: 50px 20px;">
    <h1 style="text-align: center; margin-bottom: 50px; font-size: 36px;">Blog</h1>

    <div style="display: grid; grid-template-columns: 1fr 300px; gap: 30px;">
        <!-- Blog Posts -->
        <div>
            @forelse($posts as $post)
                <article style="background: white; padding: 20px; border-radius: 8px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    @if($post->featured_image)
                        <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" style="width: 100%; height: 250px; object-fit: cover; border-radius: 8px; margin-bottom: 15px;">
                    @endif
                    <h2 style="margin-bottom: 10px;"><a href="{{ route('blog.detail', $post->slug) }}">{{ $post->title }}</a></h2>
                    <p style="color: #7f8c8d; font-size: 14px; margin-bottom: 15px;">
                        By Admin | {{ $post->published_at->format('M d, Y') }} | {{ $post->views }} views
                    </p>
                    <p style="color: #555; margin-bottom: 15px;">{{ $post->excerpt ?? Str::limit($post->content, 150) }}</p>
                    <a href="{{ route('blog.detail', $post->slug) }}" style="color: #667eea; font-weight: 600;">Read More →</a>
                </article>
            @empty
                <p style="text-align: center;">No blog posts yet</p>
            @endforelse

            {{ $posts->links() }}
        </div>

        <!-- Sidebar -->
        <aside>
            <div style="background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                <h3 style="margin-bottom: 20px;">Categories</h3>
                @forelse($categories as $category)
                    <a href="{{ route('blog.category', $category->slug) }}" style="display: block; padding: 10px 0; border-bottom: 1px solid #eee;">
                        {{ $category->name }} ({{ $category->posts_count }})
                    </a>
                @empty
                    <p>No categories</p>
                @endforelse
            </div>
        </aside>
    </div>
</div>
@endsection
