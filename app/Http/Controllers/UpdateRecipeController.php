<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class UpdateRecipeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        $recipe = Recipe::find($id);

        $recipe->title = $request->input('title');
        $recipe->description = $request->input('description');
        $recipe->ingredients = $request->input('ingredients');
        $recipe->recipe_steps = $request->input('recipe_steps');

        $recipe->update();

        return redirect('user/profile')->with('success', 'Recipe has been updated!');
    }
}
