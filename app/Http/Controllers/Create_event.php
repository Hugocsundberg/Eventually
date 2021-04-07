<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Create_event extends Controller
{
    public function create_event(Request $request)
    {
        $input = $request->only('email', 'password', 'name');
        $user = new \App\Models\User();
        $user->password = Hash::make($input['password']);
        $user->email = $input['email'];
        $user->name = $input['name'];
        $user->save();

        return redirect()->intended('/welcome');
    }
}
