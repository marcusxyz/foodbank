<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_dashboard()
    {

        $response = $this->get('/');
        $response->assertSeeText('Welcome to recipe bank!');
        $response->assertStatus(200);
    }
    public function test_view_dashboard_as_user()
    {
        $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)->get('/');
        $response->assertSeeText('Go to your profile here');
        $response->assertStatus(200);
    }
}
