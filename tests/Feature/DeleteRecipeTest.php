<?php

namespace Tests\Feature;

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class DeleteRecipeTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_recipe()
   {
       // Create new user manually
       $user = new User();
       $user->name = 'Mr Robot';
       $user->email = 'example@yrgo.se';
       $user->password = Hash::make('123');
       $user->save();

       // Generate dummy data for recipe
       $recipe = Recipe::factory()->create();

       $request = $this
           ->followingRedirects()
           ->actingAs($user)
           ->delete("recipes/{$recipe->id}/delete");

       $this->assertDatabaseMissing('recipes', $recipe->toArray());
       $request->assertSeeText("Recipe has been deleted!");
       $request->assertStatus(200);
   }
}
