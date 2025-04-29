@extends('layouts.main')

@section('container')
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">

    <div class="payment-wrapper fade-in-up">
        <h2>Redirecting to Payment...</h2>

        <form action="{{ route('esewa.pay') }}" method="POST" id="paymentForm">
            @csrf
            <input type="hidden" name="booking_id" value="{{ $booking->id }}">
            <input type="hidden" name="amount" value="{{ $booking->total_price }}">
            <input type="hidden" name="transaction_uuid" value="{{ $booking->transaction_uuid }}">
            <button type="submit" style="display: none;">Pay Now</button>
        </form>

        <script>
            document.getElementById('paymentForm').submit();
        </script>
    </div>
@endsection
