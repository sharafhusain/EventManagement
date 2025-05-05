<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'event_id',
        'seats_booked',
        'total_price',
        'payment_status',
        'booked_at',
    ];
    protected $casts = [
        'booked_at' => 'datetime',
    ];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

}
