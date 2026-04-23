@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<div class="stats">
    <div class="stat-box">
        <h3>Total Users</h3>
        <div class="number">{{ $stats['users'] }}</div>
    </div>
    <div class="stat-box">
        <h3>Projects</h3>
        <div class="number">{{ $stats['projects'] }}</div>
    </div>
    <div class="stat-box">
        <h3>Blog Posts</h3>
        <div class="number">{{ $stats['blog_posts'] }}</div>
    </div>
    <div class="stat-box">
        <h3>Unread Messages</h3>
        <div class="number" style="border-left-color: #e74c3c;">{{ $stats['unread_messages'] }}</div>
    </div>
    <div class="stat-box">
        <h3>Skills</h3>
        <div class="number">{{ $stats['skills'] }}</div>
    </div>
    <div class="stat-box">
        <h3>Services</h3>
        <div class="number">{{ $stats['services'] }}</div>
    </div>
    <div class="stat-box">
        <h3>Certifications</h3>
        <div class="number">{{ $stats['certifications'] }}</div>
    </div>
    <div class="stat-box">
        <h3>Success Stories</h3>
        <div class="number">{{ $stats['success_stories'] }}</div>
    </div>
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
    <!-- Recent Messages -->
    <div class="card">
        <h3 style="margin-bottom: 20px;">Recent Contact Messages</h3>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentMessages as $message)
                    <tr>
                        <td>{{ $message->name }}</td>
                        <td>{{ $message->email }}</td>
                        <td>{{ $message->created_at->format('M d, Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align: center;">No messages</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('admin.contact.index') }}" class="btn btn-primary" style="margin-top: 15px;">View All</a>
    </div>

    <!-- Recent Blog Posts -->
    <div class="card">
        <h3 style="margin-bottom: 20px;">Recent Blog Posts</h3>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentBlogPosts as $post)
                    <tr>
                        <td>{{ Str::limit($post->title, 20) }}</td>
                        <td>
                            <span style="background: {{ $post->is_published ? '#d4edda' : '#fff3cd' }}; color: {{ $post->is_published ? '#155724' : '#856404' }}; padding: 4px 8px; border-radius: 3px; font-size: 12px;">
                                {{ $post->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td>{{ $post->created_at->format('M d, Y') }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" style="text-align: center;">No posts</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('admin.blog.index') }}" class="btn btn-primary" style="margin-top: 15px;">View All</a>
    </div>
</div>

<div class="card" style="margin-top: 30px;">
    <h3>Quick Links</h3>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); gap: 15px; margin-top: 20px;">
        <a href="{{ route('admin.skills.create') }}" class="btn btn-primary">+ Add Skill</a>
        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">+ Add Project</a>
        <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">+ New Post</a>
        <a href="{{ route('admin.gallery.create') }}" class="btn btn-primary">+ Add Image</a>
        <a href="{{ route('admin.maintenance') }}" class="btn btn-secondary">Maintenance</a>
    </div>
</div>
@endsection
