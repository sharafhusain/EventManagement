<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function listing()
    {
        return view('admin.bookings', ['bookings'=>Booking::paginate()]);
    }

}
