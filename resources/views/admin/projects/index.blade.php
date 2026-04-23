@extends('layouts.admin')

@section('page-title', 'Projects')

@section('content')
<div style="margin-bottom: 20px; display: flex; justify-content: space-between;">
    <div></div>
    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">+ Add New Project</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Featured</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($projects as $project)
                <tr>
                    <td><strong>{{ $project->title }}</strong></td>
                    <td>{{ $project->category }}</td>
                    <td>
                        @if($project->is_featured)
                            <span style="color: #f39c12;">★ Featured</span>
                        @else
                            <span style="color: #bdc3c7;">☆ Regular</span>
                        @endif
                    </td>
                    <td>
                        <span style="background: {{ $project->is_active ? '#d4edda' : '#f8d7da' }}; color: {{ $project->is_active ? '#155724' : '#721c24' }}; padding: 4px 8px; border-radius: 3px; font-size: 12px;">
                            {{ $project->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-secondary" style="padding: 6px 12px; font-size: 12px;">Edit</a>
                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding: 6px 12px; font-size: 12px;" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">No projects found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $projects->links() }}
@endsection
