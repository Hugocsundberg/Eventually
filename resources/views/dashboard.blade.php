<x-app>
    @section('title', 'Dashboard')
    <div class="container center-center-col">
        <div class="center-container center-center-col">
            <a class="btn btn-primary" href="/create-event">Create event</a>
            <h1>Your events</h1>
            @foreach ($events as $event)
            <div>
                <a href="/event-page/{{$event->event_id}}">
                    <h1>{{$event->event_name}}</h1>
                </a>
                <p>{{$event->event_description}}</p>
            </div>
            @endforeach
        </div>
    </div>
</x-app>