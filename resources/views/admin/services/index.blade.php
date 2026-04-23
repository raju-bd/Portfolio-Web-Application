@extends('layouts.admin')

@section('page-title', 'Services')

@section('content')
<div style="margin-bottom: 20px; display: flex; justify-content: space-between;">
    <div></div>
    <a href="{{ route('admin.services.create') }}" class="btn btn-primary">+ Add New Service</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Icon</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($services as $service)
                <tr>
                    <td><strong>{{ $service->title }}</strong></td>
                    <td>{{ $service->icon ?? 'N/A' }}</td>
                    <td>
                        <span style="background: {{ $service->is_active ? '#d4edda' : '#f8d7da' }}; color: {{ $service->is_active ? '#155724' : '#721c24' }}; padding: 4px 8px; border-radius: 3px; font-size: 12px;">
                            {{ $service->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-secondary" style="padding: 6px 12px; font-size: 12px;">Edit</a>
                        <form method="POST" action="{{ route('admin.services.destroy', $service) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding: 6px 12px; font-size: 12px;" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" style="text-align: center;">No services found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $services->links() }}
@endsection
