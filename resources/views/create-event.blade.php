<x-app>
    @section('title', 'Create Event');
    <div class="container center-center-col">
        <div class="center-container center-center-col">
            <h1>Create new Event</h1>
            <form class="" method="post" action="/event">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="event_name">Event name</label>
                    <input class="form-control" id="event_name" name="event_name" type="text" placeholder="Event name">
                    <div id="nameHelp" class="form-text">This will be viewed on your Event page later.</div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="event_date">Date & Time</label>
                    <input class="form-control" id="event_date" name="event_date" type="datetime-local">
                </div>
                <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                </div> -->
                <div class="mb-3">
                    <label class="form-label" for="event_location">Location</label>
                    <input class="form-control" id="event_location" name="event_location" type=text placeholder="That place we all love.">
                </div>

                <div class="mb-3">
                    <label class="form-label" for="event_discription">Description</label>
                    <textarea class="form-control" id="event_description" name="event_description" placeholder="We will do fun stuff...">
                    </textarea>
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <a class="btn btn-secondary" href="/login">Back</a>
        </div>
    </div>
</x-app>