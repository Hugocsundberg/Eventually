<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
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


        return redirect()->intended('/event-page/' . $event->event_id);
    }

    public function deleteEvent($event_id)
    {

        DB::table('events')->where('event_id', '=', $event_id)->delete();
        return redirect()->intended('/dashboard');
    }
}
