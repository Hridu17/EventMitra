<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_type',
        'event_date',
        'location',
        'decoration_id',
        'total_price',
        'payment_status',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }


    // Relationship with Payment (One-to-One)
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    // Relationship with Decoration (Many-to-One)
    public function decoration()
    {
        return $this->belongsTo(Decoration::class);
    }
    public function feedback()
    {
        return $this->hasOne(Feedback::class, 'user_id', 'user_id'); 
}
}