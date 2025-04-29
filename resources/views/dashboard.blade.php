<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="{{ asset('assets/css/index.css') }}">
</head>

<body>

    <!-- Dashboard Navbar -->
    <div class="dashboard-navbar">

        <!-- Go to Home Button -->
        <a href="{{ route('home') }}" class="btn-home">Back to HomePage</a>
        <!-- Logout Button -->
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
        </form>


    </div>

    <!-- Main Dashboard Container -->
    <div class="user-dashboard-container">
        <h2 style="text-align: center; margin-top: 30px;">User Dashboard</h2>

        <div class="dashboard-content">

            <!-- Welcome Message -->
            <p style="text-align: center;">Welcome back, <strong>{{ Auth::user()->name }}</strong></p>

            <!-- Bookings Section -->
            <div class="dashboard-section">
                <h3>My Bookings</h3>
                <table class="dashboard-table">
                    <thead>
                        <tr>
                            <th>Decoration</th>
                            <th>Event Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr>
                                <td>{{ $booking->event_type }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->event_date)->format('d M Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">No bookings found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Payments Section -->
            <div class="dashboard-section">
                <h3>My Payments</h3>
                <table class="dashboard-table">
                    <thead>
                        <tr>
                            <th>Amount</th>
                            <th>Transaction Code</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($payments as $payment)
                            <tr>
                                <td>Rs. {{ number_format($payment->amount, 2) }}</td>
                                <td>{{ $payment->transaction_code }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2">No payments found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</body>

</html>
