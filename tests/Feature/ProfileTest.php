<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_profile()
    {
        $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->get('user/profile');
        $response->assertSeeText('My profile');
        $response->assertStatus(200);
    }

    public function test_view_profile_as_guest()
    {
        $response = $this->followingRedirects()->get('user/profile');
        $response->assertStatus(200);
        $response->assertSeeText('Create an account');
    }
}
