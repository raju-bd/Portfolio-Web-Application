@extends('layouts.admin')

@section('page-title', 'Contact Messages')

@section('content')
<div class="card">
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($messages as $message)
                <tr>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->subject ?? 'N/A' }}</td>
                    <td>{{ $message->created_at->format('M d, Y') }}</td>
                    <td>
                        @if(!$message->is_read)
                            <span style="background: #ffeaa7; color: #d63031; padding: 4px 8px; border-radius: 3px; font-size: 12px;">Unread</span>
                        @else
                            <span style="background: #d4edda; color: #155724; padding: 4px 8px; border-radius: 3px; font-size: 12px;">Read</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.contact.show', $message) }}" class="btn btn-secondary" style="padding: 6px 12px; font-size: 12px;">View</a>
                        <form method="POST" action="{{ route('admin.contact.destroy', $message) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" style="padding: 6px 12px; font-size: 12px;" onclick="return confirm('Delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" style="text-align: center;">No messages found</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{ $messages->links() }}
@endsection
