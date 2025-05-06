<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request){
        $events = Event::with('venue')->paginate(10);
        return view('homepage',compact('events'));
    }
}
