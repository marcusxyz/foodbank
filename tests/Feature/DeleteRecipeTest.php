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
        $user = new User();
        $user->name = 'Mr Robot';
        $user->email = 'example@yrgo.se';
        $user->password = Hash::make('123');
        $user->save();

        $recipe = Recipe::factory()->create();

        $this
            ->actingAs($user)
            ->delete("recipes/1");

        $this->assertDatabaseMissing('recipes', $recipe->toArray());
    }
}
