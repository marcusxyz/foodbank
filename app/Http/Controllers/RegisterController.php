<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function __invoke(Request $request)
    {
        // Here we validate input. Which also generates relevant error messages
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|unique:users|email:rfc,dns|max:255',
            'password' => 'required|min:7|max:255',
        ]);

        // Send it to db
        $register = new User();
        $register->name = $request->input('name');
        $register->email = $request->input('email');
        $register->password = Hash::make($request->input('password'));
        $register->save();

        return redirect('/')->with('success', 'You are now registrated, please log in!');
    }
}
