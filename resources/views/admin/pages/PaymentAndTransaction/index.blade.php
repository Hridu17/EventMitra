@extends('admin.inc.main')

@section('container')
    <div class="container">
        <h1 class="mb-4">Payment Management</h1>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>User Name</th> 
                    <th>Booking ID</th>
                    <th>Amount</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($payments as $index => $payment)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        
                        <td>
                            {{ $payment->user->firstName ?? $payment->user->name ?? 'N/A' }}
                        </td>
                        
                        <td>{{ $payment->booking_id }}</td>
                        <td>Rs {{ number_format($payment->amount, 2) }}</td>
                        <td>
                            {{ optional($payment->booking)->payment_status === 'completed' ? 'Paid' : 'Pending' }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
