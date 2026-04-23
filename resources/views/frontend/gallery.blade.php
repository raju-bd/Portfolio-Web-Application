@extends('layouts.app')

@section('title', 'Gallery')

@section('content')
<div class="container" style="padding: 50px 20px;">
    <h1 style="text-align: center; margin-bottom: 50px; font-size: 36px;">Photo Gallery</h1>

    <!-- Screenshots Section -->
    @if($screenshots->count() > 0)
        <div>
            <h2 style="margin-bottom: 30px; font-size: 24px;">App Screenshots</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px; margin-bottom: 60px;">
                @foreach($screenshots as $screenshot)
                    <div style="position: relative; border-radius: 8px; overflow: hidden; aspect-ratio: 4/3; cursor: pointer; background: #f0f0f0;">
                        @if($screenshot->image)
                            <img src="{{ asset('storage/' . $screenshot->image) }}" alt="{{ $screenshot->title }}" style="width: 100%; height: 100%; object-fit: cover; transition: transform 0.3s;">
                        @else
                            <div style="display: flex; align-items: center; justify-content: center; height: 100%;">No Image</div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Colleagues Section -->
    @if($colleagues->count() > 0)
        <div>
            <h2 style="margin-bottom: 30px; font-size: 24px;">Team & Colleagues</h2>
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 20px;">
                @foreach($colleagues as $colleague)
                    <div style="border-radius: 8px; overflow: hidden; aspect-ratio: 1; background: #f0f0f0; text-align: center;">
                        @if($colleague->image)
                            <img src="{{ asset('storage/' . $colleague->image) }}" alt="{{ $colleague->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                        @else
                            <div style="display: flex; align-items: center; justify-content: center; height: 100%; font-weight: bold;">{{ $colleague->title }}</div>
                        @endif
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
@endsection
