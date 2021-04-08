<x-app>
    @section('title', $event->event_name)
    <div class="center">
        <div class="max-width">
            <section class="event_top-section  center-center-col">
                <img src="https://media.routard.com/image/67/1/fb-canada-parcs.1473671.jpg" alt="">
                <time class="date text-white">{{$event->event_date}}</time>
                <h1 class="title text-white">{{$event->event_name}}</h1>
            </section class="event_mid-section">
            <section class="mid-section center-center-col">
                <div class="card-background padding">
                    <h4 class="">Datum:</h4>
                    <time>{{$event->event_date}}</time>
                    <h4 class="">Beskrivning</h4>
                    <p class="description ">{{$event->event_description}}</p>
                </div>
            </section>
        </div>
    </div>

</x-app>