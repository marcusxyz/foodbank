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
        $user->password = Hash::make('1234567');
        $user->save();

        // How it should response
        $response = $this
            ->followingRedirects()
            ->post('login', [
                'email' => 'example@yrgo.se',
                'password' => '1234567',
        ]);
        // What the response should see in index
        $response->assertOk();
        $response->assertSeeText('Welcome to recipe bank, Marcus!');
    }

    public function test_user_types_invalid_email()
    {
        $user = new User();
        $user->name = 'Marcus';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('1234567');
        $user->save();

        $response = $this
            ->post('login', [
                'email' => 'example@yr',
                'password' => '1234567'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'email' => 'The email must be a valid email address.'
        ]);
    }

    public function test_user_types_wrong_credientials()
    {
        $user = new User();
        $user->name = 'Marcus';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('1234567');
        $user->save();

        $response = $this
            ->post('login', [
                'email' => 'example@yrgo.se',
                'password' => '7654321'
        ]);

        $response->assertStatus(302);
    }

    public function test_user_can_not_login_without_password()
    {

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

    public function test_existing_user_shall_not_see_login_page()
    {

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
