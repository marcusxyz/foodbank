<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_profile()
    {
        $response = $this->get('login');
        $response->assertSeeText('Email');
        $response->assertStatus(200);
    }
}
