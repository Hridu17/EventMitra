@extends('admin.inc.main')

@section('container')
    <div class="container">
        <h1 class="mb-4">Booking Management</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>User Name</th>
                    <th>Decoration Title</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bookings as $index => $booking)
                    <tr>
                        <td>{{ $index + 1 }}</td>

                        <td>{{ $booking->user->firstName ?? ($booking->user->name ?? 'N/A') }}</td>

                        <td>{{ $booking->decoration->title ?? 'N/A' }}</td>

                        <td>{{ \Carbon\Carbon::parse($booking->event_date)->format('d M Y') }}</td>

                        <td>
                            @php
                                $today = \Carbon\Carbon::today();
                                $bookingDate = \Carbon\Carbon::parse($booking->event_date);
                            @endphp

                            @if ($bookingDate->isPast())
                                @if ($booking->payment_status === 'completed')
                                    <span class="badge-success">Completed</span>
                                @else
                                    <span class="badge-warning">Pending</span>
                                @endif
                            @elseif ($bookingDate->isToday())
                                @if ($booking->payment_status === 'completed')
                                    <span class="badge-success">Completed</span>
                                @else
                                    <span class="badge-warning">Pending</span>
                                @endif
                            @else
                                <span class="badge-warning">Upcoming</span>
                            @endif
                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="5">No bookings found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
