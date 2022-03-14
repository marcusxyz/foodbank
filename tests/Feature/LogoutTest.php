<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LogoutTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_logout()
    {
        $user = new User();
        $user->name = 'Marcus';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this
            ->followingRedirects()
            ->actingAs($user)
            ->get('logout');

        $response->assertOk();
        $response = $this->get('/');
    }
}
