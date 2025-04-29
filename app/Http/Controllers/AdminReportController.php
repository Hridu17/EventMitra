<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\Feedback;

class AdminReportController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        $bookings = \App\Models\Booking::with(['user', 'payment'])
            ->when($search, function ($q) use ($search) {
                $q->whereHas('user', function ($uq) use ($search) {
                    $uq->where('firstName', 'like', "%$search%")
                       ->orWhere('lastName', 'like', "%$search%")
                       ->orWhere('email', 'like', "%$search%");
                })
                ->orWhere('event_type', 'like', "%$search%")
                ->orWhereHas('payment', function ($pq) use ($search) {
                    $pq->where('amount', 'like', "%$search%");
                });
                // ⚡ NOTICE: No orWhereHas('feedback') here anymore
            })
            ->latest()
            ->get();
    
        // Fetch feedbacks separately (searching by first name manually)
        $feedbacks = \App\Models\Feedback::when($search, function($q) use ($search) {
            $q->where('name', 'like', "%$search%")
              ->orWhere('feedback', 'like', "%$search%");
        })->get();
    
        return view('admin.pages.AdminReport.index', compact('bookings', 'feedbacks', 'search'));
    }
    
}
