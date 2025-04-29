@extends('layouts.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">

    <div class="decoration-container">
        <h1 class="text-center">Event Decorations</h1>

        <div class="decoration-grid">
            @foreach ($decorations as $decoration)
                <div class="decoration-card">
                    @if ($decoration->image)
                        <img src="{{ asset('uploads/' . $decoration->image) }}" alt="{{ $decoration->title }}"
                            class="decoration-image">
                    @endif

                    <div class="card-body">
                        <h3 class="card-title">{{ $decoration->title }}</h3>
                        <p class="card-text">{{ $decoration->description }}</p>
                        <p><strong>Price:</strong> Rs. {{ number_format($decoration->price, 2) }}</p>

                        <a href="{{ route('booking.form', ['decoration_id' => $decoration->id]) }}"
                            class="btn-card-book">Book Now</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
