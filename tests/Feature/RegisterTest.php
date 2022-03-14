<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_register_form()
    {
        $response = $this->get('register');
        $response->assertSeeText('Email');
        $response->assertSeeText('Name');
        $response->assertSeeText('Password');
        $response->assertStatus(200);
    }

    public function test_register_user()
    {

        $attributes = [
            'name' => 'Guybrush',
            'email' => 'example@yrgo.se',
            'password' => Hash::make('123')
        ];

        $response = $this
            ->followingRedirects()
            ->post('register', $attributes
        );

        $this->assertDatabaseHas('users', ['name' => 'Guybrush']);

        $response->assertStatus(200);
        $response->assertSeeText('Welcome to recipe bank');
    }

    public function test_user_does_not_meet_password_requirements()
    {
        $response = $this
            ->post('register', [
                'name' => 'Guybrush',
                'email' => 'example@yrgo.se',
                'password' => '123'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'password' => 'The password must be at least 7 characters.'
        ]);
    }

    public function test_user_does_not_meet_email_requirements()
    {
        $response = $this
            ->post('register', [
                'name' => 'Guybrush',
                'email' => 'example@yrgo',
                'password' => '123'
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'email' => 'The email must be a valid email address.'
        ]);
    }

    public function test_existing_user_shall_not_see_register_page()
    {

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
}
