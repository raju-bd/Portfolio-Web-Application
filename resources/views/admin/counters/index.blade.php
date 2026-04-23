@extends('layouts.admin')

@section('page-title', 'Counters')

@section('content')
<div class="card" style="max-width: 600px;">
    <form method="POST" action="{{ route('admin.counters.update') }}">
        @csrf

        <p style="color: #7f8c8d; margin-bottom: 20px;">Update the statistics displayed on your homepage.</p>

        <div class="form-group">
            <label for="companies">Companies Worked With</label>
            <input type="number" id="companies" name="companies" min="0" value="{{ $counters->firstWhere('type', 'companies')?->count ?? 0 }}">
        </div>

        <div class="form-group">
            <label for="modules">Modules Developed</label>
            <input type="number" id="modules" name="modules" min="0" value="{{ $counters->firstWhere('type', 'modules')?->count ?? 0 }}">
        </div>

        <div class="form-group">
            <label for="domains">Domains Worked On</label>
            <input type="number" id="domains" name="domains" min="0" value="{{ $counters->firstWhere('type', 'domains')?->count ?? 0 }}">
        </div>

        <div class="form-group">
            <label for="projects">Total Projects</label>
            <input type="number" id="projects" name="projects" min="0" value="{{ $counters->firstWhere('type', 'projects')?->count ?? 0 }}">
        </div>

        <div class="form-group">
            <label for="clients">Total Clients</label>
            <input type="number" id="clients" name="clients" min="0" value="{{ $counters->firstWhere('type', 'clients')?->count ?? 0 }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Counters</button>
    </form>
</div>
@endsection
