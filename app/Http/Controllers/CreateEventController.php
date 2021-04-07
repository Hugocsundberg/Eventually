<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateEventController extends Controller
{
    public function createEvent(Request $request)
    {
        $input = $request;
        $event = new \App\Models\Events();
        $event->event_name = $input['event_name'];
        $event->event_host = Auth::user()->id;
        $event->event_location = $input['event_location'];
        $event->event_date = $input['event_date'];
        $event->event_description = $input['event_description'];
        $event->save();


        return redirect()->intended('/event/{event_id}');
    }
}
