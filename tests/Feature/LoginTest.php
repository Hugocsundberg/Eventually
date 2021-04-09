<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */



    public function test_view_login_form()
    {
        $response = $this->get('/login');
        $response->assertSeeText('Hello, this is login');
        $response->assertStatus(200);
    }

    use RefreshDatabase;

    public function test_login_user()
    {
        $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->followingRedirects()
            ->post('/', [
                'email' => 'example@yrgo.se',
                'password' => '123',
            ]);
        $response->assertSeeText("Your events");
    }


    // public function test_login_user_faulty_credentials()
    // {
    //     $response = $this
    //         ->followingRedirects()
    //         ->post('login', [
    //             'email' => 'test@tet.com'
    //         ]);

    //     $response->assertSeeText("The provided credentials");
    // }
}
