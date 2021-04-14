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
        DB::table('guestbooks')->where('event_id', '=', $event_id)->delete();
        return redirect()->intended('/dashboard');
    }

    public function addComment(Request $request)
    {
        // die(var_dump("Found add comment!"));
        $input = $request;
        $comment = new \App\Models\Comment();
        $comment->event_id = $input['event'];
        $comment->message = $input['event_msg'];
        if (isset($input['host'])) {
            $comment->from_host = $input['host'];
        } else {
            $comment->from_host = null;
        }

        $comment->save();


        return redirect('/event-page/' . $input['event']);
    }

    public function getComments($event_id)
    {
        $event_data = DB::table('events')
            ->where('event_id', '=', $event_id)
            ->get();

        $comments = DB::table('guestbooks')
            ->where('event_id', '=', $event_id)
            ->get();


        return view("event", [
            'event' => $event_data[0],
            'comments' => $comments
        ]);
    }

    public function deleteComment($event_id, $comment_id)
    {
        DB::table('guestbooks')->where('id', '=', $comment_id)->delete();
        return redirect()->intended('/event-page/' . $event_id . '/');
    }

    public function editEvent($event_id)
    {

        $event = DB::table('events')
            ->where('event_id', '=', $event_id)
            ->get();

        $comments = DB::table('guestbooks')
            ->where('event_id', '=', $event_id)
            ->get();

        return view("edit-event", [
            'event' => $event[0],
            'comments' => $comments

        ]);
    }

    public function saveChanges(Request $request)
    {
        var_dump($request['event_id']);
        $input = $request->only(
            'event_name',
            'event_location',
            'event_date',
            'event_description',
            'event_id'
        );

        foreach ($input as $data) {
            $data = trim(filter_var($data, FILTER_SANITIZE_STRING));
        }


        DB::table('events')
            ->where('event_id', $input['event_id'])
            ->update([
                'event_name' => $input['event_name'],
                'event_location' => $input['event_location'],
                'event_date' => $input['event_date'],
                'event_description' => $input['event_description']
            ]);

        return redirect('/event-page/' . $input['event_id'] . '/edit-event');
    }
}
