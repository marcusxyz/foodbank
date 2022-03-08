<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_dashboard()
    {
        // $user = new User();
        // $user->name = 'Emma';
        // $user->save();

        $response = $this->get('dashboard');
        $response->assertSeeText('Hello');
        $response->assertStatus(200);
    }
}
