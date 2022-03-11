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

        $response = $this->get('/');
        $response->assertSeeText('Welcome');
        $response->assertStatus(200);
    }
}
