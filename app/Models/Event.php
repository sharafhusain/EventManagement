<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $casts = [
        'date' => 'date',
    ];

    protected $fillable = [
        'venue_id',
        'name',
        'description',
        'date',
        'total_seats',
        'price_per_seat',
        'image',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function venue()
    {
        return $this->belongsTo(Venue::class);
    }
    public function available_seat()
    {
        return $this->total_seats - $this->bookings()->sum('seats_booked') ;
    }
}
