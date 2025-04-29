@extends('admin.inc.main')

@section('container')
    <div class="report-container">
        <h2>Overall Report</h2>

        <form method="GET" action="{{ route('admin.report') }}">
            <input type="text" name="search" placeholder="Search name, event, amount..." value="{{ $search }}">
            <button type="submit">Filter</button>
            <a href="{{ route('admin.report') }}">Clear</a>
        </form>

        <div class="report-table-section">
            <table>
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Amount</th>
                        <th>Feedback</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($bookings as $booking)
                        <tr>
                            <td>{{ $booking->user->firstName ?? 'N/A' }} {{ $booking->user->lastName ?? '' }}</td>
                            <td>{{ $booking->user->email ?? 'N/A' }}</td>
                            <td>{{ $booking->event_type }}</td>
                            <td>{{ $booking->event_date }}</td>
                            <td>Rs. {{ $booking->payment->amount ?? '0.00' }}</td>
                            <td>
                                @php
                                    $userFeedback = $feedbacks->where('name', $booking->user->firstName)->first();
                                @endphp
                                {{ $userFeedback->feedback ?? 'No feedback' }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No records found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
