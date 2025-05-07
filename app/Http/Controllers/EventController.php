<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id' => 'required|exists:events,id',
            'seats' => 'required|integer|min:1',
        ]);
        $event = Event::find($request->event_id);
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'event_id' => $request->event_id,
            'seats_booked' => $request->seats,
            'total_price' => $event->price_per_seat * $request->seats,
            'payment_status' => 'paid', // setting this untill payment functionality is implemented
            'booked_at' => now(),
        ]);
        return response()->json([
            'message' => 'Booking successful',
            'booking' => $booking
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
