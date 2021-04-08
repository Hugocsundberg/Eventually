<x-app>
    @section('title', 'Dashboard')
    <div class="container center-center-col">
        <div class="center-container center-center-col">
            <a class="btn btn-primary" href="/create-event">Create event</a>
            <h1>Your events</h1>
            @foreach ($events as $event)
            <a href="/event-page/{{$event->event_id}}">
                <h1>{{$event->event_name}}</h1>
            </a>
            @endforeach
        </div>
    </div>
</x-app>