@extends('admin.inc.main')

@section('container')
    <div class="dashboard-wrapper">
        <h1 class="mb-4">Admin Dashboard</h1>

        <!-- Dashboard Summary -->
        <div class="dashboard-summary">
            <div class="summary-card">
                <h6>Total Bookings</h6>
                <h2>{{ $totalBookings }}</h2>
            </div>
            <div class="summary-card">
                <h6>Total Payments</h6>
                <h2>{{ $totalPayments }}</h2>
            </div>
            <div class="summary-card">
                <h6>Total Revenue</h6>
                <h2>Rs {{ number_format($totalRevenue, 2) }}</h2>
            </div>
        </div>

        <!-- Latest Bookings -->
        <div class="table-container">
            <h4 class="section-title">Latest Bookings</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Decoration</th>
                        <th>Event Date</th>
                        <th>Status</th> <!-- Upcoming / Today / Completed -->
                        <th>Payment</th> <!-- Paid / Unpaid -->
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->user->firstName ?? 'N/A' }}</td>
                            <td>{{ $booking->decoration->title ?? 'N/A' }}</td>
                            <td>{{ \Carbon\Carbon::parse($booking->event_date)->format('d M Y') }}</td>

                            <!-- Status -->
                            <td>
                                @php
                                    $today = \Carbon\Carbon::today();
                                    $eventDate = \Carbon\Carbon::parse($booking->event_date);
                                @endphp

                                @if ($eventDate->isFuture())
                                    <span class="badge badge-warning">Upcoming</span>
                                @elseif ($eventDate->isToday())
                                    <span class="badge badge-info">Today</span>
                                @else
                                    <span class="badge badge-success">Completed</span>
                                @endif
                            </td>

                            <!-- Payment -->
                            <td>
                                @if ($booking->payment_status === 'completed')
                                    <span class="badge badge-success">Paid</span>
                                @else
                                    <span class="badge badge-danger">Unpaid</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Latest Payments -->
        <div class="table-container">
            <h4 class="section-title">Latest Payments</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>User Name</th>
                        <th>Booking ID</th>
                        <th>Amount</th>
                        {{-- <th>Txn Code</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($payments as $payment)
                        <tr>
                            <td>{{ $payment->user->firstName ?? 'N/A' }}</td>
                            <td>{{ $payment->booking_id }}</td>
                            <td>Rs {{ number_format($payment->amount, 2) }}</td>
                            {{-- <td>{{ $payment->transaction_code }}</td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
