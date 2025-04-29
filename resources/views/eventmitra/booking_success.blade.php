@extends('layouts.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
    <div class="success-container" style="text-align: center;">
        <h2>Booking Successful!</h2>

        <div class="booking-summary">
            <p><strong>Decoration:</strong> {{ $booking->decoration->title ?? 'Decoration' }}</p>
            <p><strong>Event Date:</strong> {{ \Carbon\Carbon::parse($booking->event_date)->format('F d, Y') }}</p>
            <p><strong>Location:</strong> {{ $booking->location }}</p>
            <p><strong>Payment Status:</strong> <span style="color: green;">{{ ucfirst($booking->payment_status) }}</span>
            </p>
        </div>

        <div style="margin-top: 30px;">
            <a href="{{ route('home') }}" class="btn-primary">Return to Homepage</a>
        </div>
    </div>
@endsection
