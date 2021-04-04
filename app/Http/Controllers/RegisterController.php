<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use  Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    function register(Request $request)
    {
        $request->validate(['email' => 'unique:users,email']);
        $input = $request->only('email', 'password', 'name');
        $user = new \App\Models\User();
        $user->password = Hash::make($input['password']);
        $user->email = $input['email'];
        $user->name = $input['name'];
        $user->save();

        return redirect()->intended('/welcome');
    }
}
