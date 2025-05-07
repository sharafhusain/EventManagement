<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        $event = Event::findOrFail($request->event_id);

        $validator = Validator::make($request->all(), [
            'seats' => [
                'required',
                'integer',
                'min:1',
                function ($attribute, $value, $fail) use ($event) {
                    if ($value > $event->available_seat()) {
                        $fail("Only {$event->available_seat()} seats are available.");
                    }
                }
            ],
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'event_id' => $request->event_id,
            'seats_booked' => $request->seats,
            'total_price' => $event->price_per_seat * $request->seats,
            'payment_status' => 'paid', // setting this untill payment functionality is implemented
            'booked_at' => now(),
        ]);
        return response()->json([
            'status' => 'ok',
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
