@extends('layouts.admin')

@section('page-title', 'Add Service')

@section('content')
<div class="card" style="max-width: 600px;">
    <form method="POST" action="{{ route('admin.services.store') }}">
        @csrf

        <div class="form-group">
            <label for="title">Service Title</label>
            <input type="text" id="title" name="title" required value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="icon">Icon (emoji)</label>
            <input type="text" id="icon" name="icon" placeholder="e.g., 💻" value="{{ old('icon') }}">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="features">Features (comma-separated)</label>
            <textarea id="features" name="features" placeholder="Feature 1, Feature 2, Feature 3">{{ old('features') }}</textarea>
        </div>

        <div class="form-group">
            <label for="sort_order">Display Order</label>
            <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
        </div>

        <div class="form-group">
            <label><input type="checkbox" name="is_active" {{ old('is_active', true) ? 'checked' : '' }}> Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Create Service</button>
        <a href="{{ route('admin.services.index') }}" class="btn btn-secondary" style="margin-left: 10px;">Cancel</a>
    </form>
</div>
@endsection
