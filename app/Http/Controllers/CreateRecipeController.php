<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreateRecipeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'recipe_steps' => 'required|string',
        ]);

        $recipe = new Recipe();
        $recipe->user_id = Auth::id();
        $recipe->title = $request->input('title');
        $recipe->description = $request->input('description');
        $recipe->ingredients = $request->input('ingredients');
        $recipe->recipe_steps = $request->input('recipe_steps');
        $recipe->like_id = Auth::id();
        $recipe->save();

        return redirect('user/profile')->with('success', 'New recipe created!');
    }
}
