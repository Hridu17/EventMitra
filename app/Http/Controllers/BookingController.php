<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Decoration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Xentixar\EsewaSdk\Esewa;

class BookingController extends Controller
{
    public function create($decoration_id)
    {
        $decoration = Decoration::findOrFail($decoration_id);
        return view('eventmitra.booking', compact('decoration'));
    }

    public function store(Request $request)
    {
        $today = now()->toDateString();

        $request->validate([
            'event_date' => 'required|date|after_or_equal:' . $today,
            'location' => 'required|string|max:255',
            'total_price' => 'required|numeric',
            'decoration_id' => 'required|exists:decorations,id',
        ], [
            'event_date.after_or_equal' => 'The event date cannot be in the past.',
        ]);

        $transaction_uuid = strtoupper(bin2hex(random_bytes(10)));

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'event_type' => Decoration::find($request->decoration_id)->title ?? 'Decoration',
            'event_date' => $request->event_date,
            'location' => $request->location,
            'decoration_id' => $request->decoration_id,
            'total_price' => $request->total_price,
            'paid_amount' => $request->total_price,
            'payment_status' => 'pending',
            'transaction_uuid' => $transaction_uuid,
        ]);

        session()->put('payment_booking_id', $booking->id);

        return redirect()->route('payment.redirect');
    }

    public function paymentRedirect()
    {
        $bookingId = session('payment_booking_id');

        if (!$bookingId) {
            return redirect()->route('eventmitra.decoration')->with('error', 'No booking found.');
        }

        $booking = Booking::findOrFail($bookingId);
        return view('eventmitra.paymentRedirect', compact('booking'));
    }

    public function success($booking_id)
    {
        $booking = Booking::findOrFail($booking_id);
        return view('eventmitra.booking_success', compact('booking'));
    }

    // Admin: Booking Management
    public function adminIndex()
    {
        $bookings = \App\Models\Booking::latest()->get();

        return view('admin.pages.bookingManagement.index', compact('bookings'));
    }
}
