<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DecorationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\PaymentController;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\FeedbackController;

// Public Routes
Route::get('/', function () {
    return view('eventmitra.index');
})->name('home');

Route::get('/aboutUs', function () {
    return view('eventmitra.aboutUs');
})->name('aboutUs');

Route::get('/kind-words', function () {
    return view('eventmitra.kindWords');
})->name('kindWords');

// Decoration Display Routes
Route::get('/decorations', [DecorationController::class, 'showDecorations'])->name('eventmitra.decoration');

// Booking Routes
Route::get('booking/{decoration_id}', [BookingController::class, 'create'])->name('booking.form');  // This will show the booking page
Route::post('/booking/store', [BookingController::class, 'store'])->name('bookings.store'); // For storing booking details

// Authentication Routes
require __DIR__ . '/auth.php';

// Dashboard Routes (For authenticated users)
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();
        $bookings = Booking::where('user_id', $user->id)->latest()->get();
        $payments = Payment::where('user_id', $user->id)->latest()->get();

        return view('dashboard', compact('bookings', 'payments'));
    })->name('dashboard');

    //feedback route
    Route::post('/feedback/store', [FeedbackController::class, 'store'])->name('feedback.store');
    Route::get('/kind-words', [FeedbackController::class, 'index'])->name('kind.words');
    Route::get('/admin/feedbacks', [FeedbackController::class, 'adminIndex'])->name('admin.feedbacks');

    //AdminReport
    Route::get('/admin/report', [AdminReportController::class, 'index'])->name('admin.report');



    // User Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Payment Routes
    Route::post('esewa/pay', [PaymentController::class, 'pay'])->name('esewa.pay');
    Route::get('esewa/check', [PaymentController::class, 'check'])->name('esewa.check');
    Route::get('/payment-failed', [PaymentController::class, 'paymentFailed'])->name('payment-failed');
    Route::get('/payment-redirect', [BookingController::class, 'paymentRedirect'])->name('payment.redirect');
    Route::get('booking/success/{booking_id}', [BookingController::class, 'success'])->name('booking.success');
});

// Admin Routes (Role: admin)
Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Admin Booking Management
    Route::get('/booking-management', [BookingController::class, 'adminIndex'])->name('admin.bookings.index');
    Route::get('/payment-management', [PaymentController::class, 'adminPayments'])->name('admin.payments.index');


    // Admin Decoration Management Routes
    Route::get('/decoration-management', [DecorationController::class, 'index'])->name('admin.decorations.index');
    Route::get('/decoration-management/create', [DecorationController::class, 'create'])->name('admin.decorations.create');
    Route::post('/decoration-management/store', [DecorationController::class, 'store'])->name('admin.decorations.store');
    Route::get('/decoration-management/edit/{id}', [DecorationController::class, 'edit'])->name('admin.decorations.edit');
    Route::put('/decoration-management/update/{id}', [DecorationController::class, 'update'])->name('admin.decorations.update');
    Route::delete('/decoration-management/delete/{id}', [DecorationController::class, 'destroy'])->name('admin.decorations.destroy');
});
