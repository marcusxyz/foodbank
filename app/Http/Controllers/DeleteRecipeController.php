<?php

namespace App\Http\Controllers;

use App\Models\Recipe;

class DeleteRecipeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke($id)
    {
        Recipe::find($id)->delete();
        return redirect('user/profile')->with('success', 'Recipe has been deleted!');
    }
}
