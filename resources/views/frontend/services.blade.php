@extends('layouts.app')

@section('title', 'Services')

@section('content')
<div class="container" style="padding: 50px 20px;">
    <h1 style="text-align: center; margin-bottom: 50px; font-size: 36px;">Services</h1>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
        @forelse($services as $service)
            <div style="background: white; padding: 30px; border-radius: 8px; text-align: center; box-shadow: 0 2px 8px rgba(0,0,0,0.1); transition: transform 0.3s; cursor: pointer;">
                <div style="font-size: 48px; margin-bottom: 20px;">{{ $service->icon ?? '🚀' }}</div>
                <h3 style="margin-bottom: 15px;">{{ $service->title }}</h3>
                <p style="color: #7f8c8d; margin-bottom: 20px;">{{ $service->description }}</p>
                @if($service->features && count($service->features) > 0)
                    <ul style="text-align: left; list-style: none; color: #555;">
                        @foreach(array_slice($service->features, 0, 3) as $feature)
                            <li style="margin-bottom: 8px;">✓ {{ $feature }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        @empty
            <p style="grid-column: 1 / -1; text-align: center;">No services yet</p>
        @endforelse
    </div>
</div>
@endsection
