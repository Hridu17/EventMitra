@extends('layouts.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">

    <div class="booking-wrapper fade-in-up">
        <h2>Book Decoration: {{ $decoration->title }}</h2>

        {{-- Show error if any --}}
        @if ($errors->any())
            <div
                style="background-color: #fdecea; border: 1px solid #f5c2c7; color: #842029; padding: 10px; margin-bottom: 20px; border-radius: 5px;">
                <ul style="list-style-type: disc; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Show Decoration Image --}}
        @if ($decoration->image)
            <div style="text-align: center; margin: 20px 0;">
                <img src="{{ asset('uploads/' . $decoration->image) }}" alt="{{ $decoration->title }}"
                    style="max-width: 100%; max-height: 300px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.1);">
            </div>
        @endif

        <p>{{ $decoration->description }}</p>
        <p><strong>Price:</strong> Rs. {{ number_format($decoration->price, 2) }}</p>

        <a href="{{ route('eventmitra.decoration') }}" class="btn-secondary">Back to Decorations</a>

        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <input type="hidden" name="decoration_id" value="{{ $decoration->id }}">

            <label for="total_price">Total Price</label>
            <input type="number" name="total_price" value="{{ $decoration->price }}" readonly>

            <div class="form-group">
                <label for="event_date">Event Date</label>
                <input type="date" name="event_date" min="{{ \Carbon\Carbon::today()->toDateString() }}" required>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" name="location" placeholder="Street name, city..." required>
            </div>

            <button type="submit" class="btn-primary">Confirm Booking</button>
        </form>
    </div>
@endsection
