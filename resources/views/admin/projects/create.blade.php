@extends('layouts.admin')

@section('page-title', 'Add Project')

@section('content')
<div class="card" style="max-width: 700px;">
    <form method="POST" action="{{ route('admin.projects.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="title">Project Title</label>
            <input type="text" id="title" name="title" required value="{{ old('title') }}">
        </div>

        <div class="form-group">
            <label for="slug">URL Slug</label>
            <input type="text" id="slug" name="slug" required value="{{ old('slug') }}" placeholder="project-name">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="category">Category</label>
            <input type="text" id="category" name="category" required value="{{ old('category') }}" placeholder="e.g., E-Commerce, SaaS">
        </div>

        <div class="form-group">
            <label for="tech_stack">Technology Stack (comma-separated)</label>
            <input type="text" id="tech_stack" name="tech_stack" value="{{ old('tech_stack') }}" placeholder="Laravel, Vue.js, MySQL">
        </div>

        <div class="form-group">
            <label for="client_name">Client Name</label>
            <input type="text" id="client_name" name="client_name" value="{{ old('client_name') }}">
        </div>

        <div class="form-group">
            <label for="project_url">Project URL</label>
            <input type="url" id="project_url" name="project_url" value="{{ old('project_url') }}" placeholder="https://example.com">
        </div>

        <div class="form-group">
            <label for="featured_image">Featured Image</label>
            <input type="file" id="featured_image" name="featured_image" accept="image/*">
        </div>

        <div class="form-group">
            <label for="key_features">Key Features (comma-separated)</label>
            <textarea id="key_features" name="key_features" placeholder="Feature 1, Feature 2, Feature 3">{{ old('key_features') }}</textarea>
        </div>

        <div class="form-group">
            <label for="sort_order">Display Order</label>
            <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}">
        </div>

        <div class="form-group">
            <label><input type="checkbox" name="is_featured" {{ old('is_featured') ? 'checked' : '' }}> Featured Project</label>
        </div>

        <div class="form-group">
            <label><input type="checkbox" name="is_active" {{ old('is_active', true) ? 'checked' : '' }}> Active</label>
        </div>

        <button type="submit" class="btn btn-primary">Create Project</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary" style="margin-left: 10px;">Cancel</a>
    </form>
</div>
@endsection
