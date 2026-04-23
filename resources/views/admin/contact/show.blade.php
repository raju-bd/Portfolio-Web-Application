@extends('layouts.admin')

@section('page-title', 'Message Details')

@section('content')
<div class="card" style="max-width: 600px;">
    <div style="border-bottom: 1px solid #ddd; padding-bottom: 20px; margin-bottom: 20px;">
        <h2>{{ $contactMessage->subject ?? 'No Subject' }}</h2>
        <p style="color: #7f8c8d;">From: <strong>{{ $contactMessage->name }}</strong></p>
        <p style="color: #7f8c8d;">Email: <strong>{{ $contactMessage->email }}</strong></p>
        <p style="color: #7f8c8d;">Date: <strong>{{ $contactMessage->created_at->format('M d, Y H:i') }}</strong></p>
    </div>

    <div style="line-height: 1.8; margin-bottom: 30px;">
        <p>{{ $contactMessage->message }}</p>
    </div>

    <div style="display: flex; gap: 10px;">
        <form method="POST" action="{{ route('admin.contact.archive', $contactMessage) }}" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-secondary">Archive</button>
        </form>
        <form method="POST" action="{{ route('admin.contact.destroy', $contactMessage) }}" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Delete?')">Delete</button>
        </form>
        <a href="{{ route('admin.contact.index') }}" class="btn btn-primary">Back</a>
    </div>
</div>
@endsection
