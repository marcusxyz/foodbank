<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_login_form()
    {
        $response = $this->get('login');
        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }

    public function test_login_user()
    {
        // Creating test user
        $user = new User();
        $user->name = 'Marcus';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        // How it should response
        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'example@yrgo.se',
                'password' => '123',
        ]);
        // What the response should see in dashboard
        $response->assertOk();
        $response->assertSeeText('Welcome to recipe bank, Marcus!');
    }

    public function test_user_can_not_login_without_password() {

        $user = new User();
        $user->name = 'Guybrush';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();


        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'example@yrgo.se',
        ]);

        $response->assertSeeText(@include('errors')); // Is this correct?
        $response->assertStatus(200);
    }

    public function test_user_shall_not_see_register_page() {

        $user = new User();
        $user->name = 'Guybrush';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->actingAs($user)
            ->followingRedirects()
            ->get('register');

        $response->assertOk();
        $response->assertSeeText('Welcome to recipe bank, Guybrush!');
    }

    public function test_user_shall_not_see_login_page() {

        $user = new User();
        $user->name = 'Guybrush';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->actingAs($user)
            ->followingRedirects()
            ->get('login');

        $response->assertOk();
        $response->assertSeeText('Welcome to recipe bank, Guybrush!');
    }


}
