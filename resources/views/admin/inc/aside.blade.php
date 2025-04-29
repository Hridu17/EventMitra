<!-- Sidebar -->
<div class="sidebar">
    <h1 class="sidebar-brand">EventMitra Admin</h1>
    <ul class="sidebar-menu">
        <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
        <li><a href="{{ route('admin.bookings.index') }}">BookingManagement</a></li>
        <li><a href="{{ route('admin.decorations.index') }}">DecorationAndServices</a></li>
        <li><a href="{{ route('admin.payments.index') }}">Payment</a></li>
        <li><a href="{{ route('admin.feedbacks') }}">Review & Feedbacks</a></li>
        <li><a href="{{ route('admin.report') }}">Report</a></li>

        <!-- Logout Form -->
        <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
            @csrf
            <button type="submit" class="sidebar-link"
                style="width: 100%; text-align: left; background: none; border: none; padding: 12px 15px; color: white; font-size: 14px; font-weight: 600; cursor: pointer;">
                Logout
            </button>
        </form>

    </ul>
</div>
