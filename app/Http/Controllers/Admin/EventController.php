<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function listing()
    {
        return view('admin.events', ['events'=> Event::with('venue')->paginate()]);
    }
}
