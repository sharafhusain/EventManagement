<?php

namespace App\View\Components;

use App\Models\Event;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
// opalina Technology
class EventsListing extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.events-listing', ['events'=>Event::with('venue')->paginate(4)]);
    }
}
