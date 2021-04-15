<?php
// die(var_dump($event));

use Illuminate\Support\Facades\Auth;

$timePos = strrpos($event->event_date, 'T');
$time = substr($event->event_date, $timePos);
$date = str_replace($time, '', $event->event_date);
$time = str_replace('T', '', $time);
$user = Auth::user();
if (isset($user->id) && $user->id === $event->event_host) {
    $host = $user;
}

// ----------------- [ examples ] ///////////////------------------ 

$event->event_date; // prints entire date pluss time (0 spaces)
$time; // prints only time (24h)
$date // prints only date of event (yyyy-mm-dd)

// ----------------------------------------------------------------

?>

<x-app>
    @section('title', $event->event_name)
    <div class="center">
        <div class="max-width">
            <section class="event_top-section  center-center-col">
                <img src="https://media.routard.com/image/67/1/fb-canada-parcs.1473671.jpg" alt="">
                <time class="date text-white">{{$date}}</time>
                <h1 class="title text-white">{{$event->event_name}}</h1>
            </section class="event_mid-section">
            <section class="mid-section center-center-col">
                <div class="card-background padding">
                    <h4 class="">Datum:</h4>
                    <time>{{$date}}</time>
                    <h4>Time:</h4>
                    <time>{{$time}}</time>
                    <h4>Location:</h4>
                    <p>{{$event->event_location}}</p>
                    <h4 class="">Beskrivning</h4>
                    <p class="description ">{{$event->event_description}}</p>
                </div>
            </section>
            <section class="mid-section center-center-col">
                <div class="card-background padding">
                    <form action='/add-comment' method="post">
                        <h4>Comment</h4>
                        @csrf
                        <input type="hidden" value="{{$event->event_id}}" name="event" id="event">
                        <textarea name="event_msg" placeholder="type here (don't forget to sign)..."></textarea>
                        @if (isset($user))
                        <input type="hidden" name="host" value="{{$user->name}}">
                        @endif
                        <br>
                        <button class='btn btn-primary' type="submit" name="msg_submit">Add comment</button>
                    </form>
                </div>
            </section>


            @foreach ($comments as $comment)
            <div class="card-background padding">
                @if($comment->from_host != null)
                <strong>{{$comment->from_host}}</strong>
                @endif
                <p>
                    "{{$comment->message}}"
                </p>
                @if (isset($host))
                <a href='#' class='btn btn-primary' data-comment="{{$comment->id}}" id="delete_btn">DELETE COMMENT</a>
                @endif
            </div>
            @endforeach
            @if (isset($host))
            <a href='/event-page/{{$event->event_id}}/edit-event' class='btn btn-primary'>Edit Event</a>
            <a href='#' class='btn btn-primary' id="delete_btn">DELETE EVENT</a>
            @endif
        </div>
    </div>
    <script src='../../js/deleteBtn.js'></script>
</x-app>