<?php

namespace Tests\Feature;

use App\Models\Recipe;
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
        $user->password = Hash::make('1234567');
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
        $user->password = Hash::make('1234567');
        $user->save();

        $attributes = [
            'title' => 'mos',
            'description' => 'mos',
            'ingredients' => 'mos',
            'recipe_steps' => 'mos',
        ];

        $this->from('/')->followingRedirects()->actingAs($user)->post('recipes/upload', $attributes);

        $this->assertDatabaseHas('recipes', $attributes);
    }

    public function test_view_newly_created_recipe_page()
    {
        $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('1234567');
        $user->save();

        $recipe = Recipe::factory()->create();

        $request = $this->get("/view/recipe:{$recipe->id}");
        $request->assertStatus(200);
    }
}
