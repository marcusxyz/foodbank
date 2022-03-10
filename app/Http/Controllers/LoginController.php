<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        // Validating this gives us appropriate error messages
        $this->validate($request, [
            'email' => 'required|email:rfc,dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/');
        }

        return back()->withErrors('Whoops! Invalid email or password.');
    }
}
