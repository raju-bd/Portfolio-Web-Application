@extends('layouts.admin')

@section('page-title', 'Skills')

@section('content')
<div style="margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
    <div></div>
    <a href="{{ route('admin.skills.create') }}" class="btn btn-primary">+ Add New Skill</a>
</div>

<div class="card">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Category</th>
                <th>Proficiency</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($skills as $skill)
                <tr>
                    <td>{{ $skill->name }}</td>
                    <td>{{ ucfirst($skill->category) }}</td>
                    <td>{{ $skill->proficiency }}%</td>
                    <td>
                        <span style="background: {{ $skill->is_active ? '#d4edda' : '#f8d7da' }}; color: {{ $skill->is_active ? '#155724' : '#721c24' }}; padding: 4px 8px; border-radius: 3px; font-size: 12px;">
                            {{ $skill->is_active ? 'Active' : 'Inactive' }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.skills.edit', $skill) }}" class="btn btn-secondary" style="padding: 6px 12px; font-size: 12px;">Edit</a>
                        <form method="POST" action="{{ route('admin.skills.destroy', $skill) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding: 6px 12px; font-size: 12px;" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">No skills found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $skills->links() }}
@endsection
