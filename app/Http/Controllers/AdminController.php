<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\DecorationCompleted;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalBookings = Booking::count();
        $totalPayments = Payment::count();
        $totalRevenue = Payment::sum('amount');

        $bookings = Booking::with('user', 'decoration')->latest()->take(5)->get();
        $payments = Payment::with('user', 'booking')->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalBookings',
            'totalPayments',
            'totalRevenue',
            'bookings',
            'payments'
        ));
    }

    public function bookings()
    {
        $bookings = Booking::with('user', 'decoration')->latest()->get();
        return view('admin.pages.BookingManagement.index', compact('bookings'));
    }


    public function completeBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->payment_status = 'completed';
        $booking->save();

        // Send notification to the user
        $booking->user->notify(new DecorationCompleted($booking));

        return redirect()->route('admin.bookings.index')->with('success', 'Booking marked as completed');
    }


    public function payments()
    {
        $payments = Payment::with('user', 'booking')->latest()->get();
        return view('admin.pages.PaymentAndTransaction.index', compact('payments'));
    }
}
