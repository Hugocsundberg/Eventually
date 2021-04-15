<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Events;

class RoutesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */


    use RefreshDatabase;

    public function test_go_to_login()
    {
        $response = $this->get('login');

        $response->assertStatus(200);
        $response->assertSeeText("login");
    }

    public function test_go_to_registration()
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
        $response->assertSeeText("this is register");
    }






    public function test_go_to_dashboard()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/dashboard');

        $response->assertStatus(200);
        $response->assertSeeText("Your event");
    }









    public function test_go_to_create_event()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->get('/create-event');

        $response->assertStatus(200);

        $response->assertSeeText("Create new Event");
    }

    public function test_go_to_eventPage()
    {
        $user = User::factory()->create();
        $event_data = Events::factory()->create();
        $response = $this->actingAs($user)->get('/event-page/' . $event_data['event_id']);

        $response->assertStatus(200);

        $response->assertSeeText("Datum");
    }

    public function test_go_to_editEvent()
    {
        $event_data = Events::factory()->create();
        $user = User::factory()->create([
            'id' => $event_data->event_host,
        ]);
        // dump($user->id, gettype($event_data->event_host));
        $response = $this->actingAs($user)

            ->get('/event-page/' . $event_data->event_id . '/edit-event');

        $response->assertStatus(200);

        $response->assertSeeText('Datum');
        $response->assertDontSeeText('Comments');
    }
}
