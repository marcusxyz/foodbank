<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class CreateRecipeTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_create_recipe()
    {
        $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();


        $response = $this->actingAs($user)
            ->get('recipes/create');
        //why get and not view?

        $response->assertStatus(200);
    }

    public function test_create_recipe()
    {
        $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $response = $this->actingAs($user)
            ->post('recipes', [
                'title' => 'mos'
            ]);
        $this->assertDatabaseHas('recipes', ['title' => 'mos']);
    }
}
