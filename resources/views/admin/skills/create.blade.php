@extends('layouts.admin')

@section('page-title', 'Add Skill')

@section('content')
<div class="card" style="max-width: 600px;">
    <form method="POST" action="{{ route('admin.skills.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Skill Name</label>
            <input type="text" id="name" name="name" required value="{{ old('name') }}">
        </div>

        <div class="form-group">
            <label for="icon">Icon (emoji or name)</label>
            <input type="text" id="icon" name="icon" placeholder="e.g., 💻 or ⚡" value="{{ old('icon') }}">
        </div>

        <div class="form-group">
            <label for="proficiency">Proficiency Level (%)</label>
            <input type="number" id="proficiency" name="proficiency" min="0" max="100" value="{{ old('proficiency', 80) }}">
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <select id="category" name="category" required>
                <option value="">Select Category</option>
                <option value="frontend" {{ old('category') === 'frontend' ? 'selected' : '' }}>Frontend</option>
                <option value="backend" {{ old('category') === 'backend' ? 'selected' : '' }}>Backend</option>
                <option value="database" {{ old('category') === 'database' ? 'selected' : '' }}>Database</option>
                <option value="tools" {{ old('category') === 'tools' ? 'selected' : '' }}>Tools</option>
                <option value="other" {{ old('category') === 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="sort_order">Display Order</label>
            <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
        </div>

        <div class="form-group">
            <label><input type="checkbox" name="is_active" {{ old('is_active') ? 'checked' : '' }}> Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Create Skill</button>
        <a href="{{ route('admin.skills.index') }}" class="btn btn-secondary" style="margin-left: 10px;">Cancel</a>
    </form>
</div>
@endsection
