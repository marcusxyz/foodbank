<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NavigationController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        $user = Auth::user();

        return view('navigation', [
            'user' => $user
        ]);
    }
}
