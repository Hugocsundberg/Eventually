<?php
// die(var_dump($event));
$timePos = strrpos($event->event_date, 'T');
$time = substr($event->event_date, $timePos);
$date = str_replace($time, '', $event->event_date);
$time = str_replace('T', '', $time);
$host = Auth::user();


// ----------------- [ examples ] ///////////////------------------ 

$event->event_date; // prints entire date pluss time (0 spaces)
$time; // prints only time (24h)
$date // prints only date of event (yyyy-mm-dd)

// ----------------------------------------------------------------

?>

<x-app>
    @section('title', 'Edit '.$event->event_name)
    <div class="center">
        <div class="max-width">
            <form class="event_edit" action='/event-page/{{$event->event_id}}/edit-event' method='post'>
                @csrf

                <input type="hidden" id="event_name" name="event_name" />
                <input type="hidden" id="event_location" name="event_location" />
                <input type="hidden" id="event_date" name="event_date" />
                <input type="hidden" id="event_description" name="event_description" />
                <input type="hidden" id="event_id" name="event_id" value="{{$event->event_id}}">

                <section class="event_top-section  center-center-col">
                    <img src="https://media.routard.com/image/67/1/fb-canada-parcs.1473671.jpg" alt="">
                    <time class="date text-white">{{$date}}</time>
                    <h1 contenteditable="true" class="title text-white">{{$event->event_name}}</h1>

                </section class="event_mid-section">
                <section class="mid-section center-center-col">
                    <div class="card-background padding">
                        <h4 class="">Datum:</h4>
                        <time contenteditable="true" id="date">{{$date}}</time>
                        <h4>Time:</h4>
                        <time contenteditable="true" id="time">{{$time}}</time>
                        <h4>Location:</h4>
                        <p contenteditable="true" id="location">{{$event->event_location}}</p>
                        <h4>Beskrivning</h4>
                        <p contenteditable="true" class="description ">{{$event->event_description}}</p>
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
                <button id="save" class="btn btn-primary" type=button>Save</button>
                <button id="submit" style="display: none">Submit</button>
                <a href='#' class='btn btn-primary' id="delete_btn">DELETE EVENT</a>
                @endif
            </form>
        </div>
    </div>
    <script src="../../js/editEvent.js"></script>
    <script src='../../js/deleteBtn.js'></script>
</x-app>