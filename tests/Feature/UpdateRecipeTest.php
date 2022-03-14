<?php

namespace Tests\Feature;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UpdateRecipeTest extends TestCase
{
    use RefreshDatabase;

    public function test_view_update_recipe()
    {
        // Generate dummy data for a user, not sure why this doesn't work..
        // $user = User::factory()->create();

        // Create new user manually instead
        $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        // Generate dummy data for recipe
        $recipe = Recipe::factory()->create();

        $response = $this
            ->actingAs($user)
            ->followingRedirects()
            ->get("user/update/recipe:{$recipe->id}");

        $response->assertSeeText('Update recipe');
        $response->assertStatus(200);
    }

    public function test_update_recipe()
    {
        $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $recipe = Recipe::factory()->create();

        $attributes = [
            'title' => 'mos',
            'description' => 'mos',
            'ingredients' => 'mos',
            'recipe_steps' => 'mos',
        ];

        $request = $this
            ->followingRedirects()
            ->actingAs($user)
            ->post("recipes.patch/{$recipe->id}", $attributes);

        $this->assertDatabaseHas('recipes', $attributes);
        $request->assertSeeText("Recipe has been updated!");
        $request->assertStatus(200);
    }
}
