<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Booking;
use App\Models\Payment;
use Xentixar\EsewaSdk\Esewa;

class PaymentController extends Controller
{
    public function pay(Request $request)
    {
        $booking = Booking::findOrFail($request->booking_id);

        if (!$booking->transaction_uuid) {
            $booking->transaction_uuid = strtoupper(bin2hex(random_bytes(10)));
            $booking->save();
        }

        $esewa = new Esewa();
        $esewa->config(
            route('esewa.check'),
            route('esewa.check'),
            $booking->total_price,
            $booking->transaction_uuid
        );

        $esewa->init();
    }

    public function check(Request $request)
    {
        $booking = Booking::findOrFail(session('payment_booking_id'));

        $booking->payment_status = 'completed';
        $booking->save();

        Payment::create([
            'user_id' => $booking->user_id,
            'booking_id' => $booking->id,
            'amount' => $booking->total_price,
            'transaction_code' => $booking->transaction_uuid,
        ]);

        return redirect()->route('booking.success', ['booking_id' => $booking->id])
            ->with('success', 'Payment successful! Booking confirmed.');
    }

    // Admin: Payment Management
    public function adminPayments()
    {
        $payments = \App\Models\Payment::latest()->get();

        return view('admin.pages.paymentAndTransaction.index', compact('payments'));
    }
}
