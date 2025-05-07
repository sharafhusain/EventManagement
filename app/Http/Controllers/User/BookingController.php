<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Event;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{

    public function listing()
    {
        return view('user.bookings', ['bookings'=>Booking::where('user_id',auth()->id())->latest()->paginate()]);
    }


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
}
