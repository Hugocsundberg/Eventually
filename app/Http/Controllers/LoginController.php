<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function checkLogin(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/welcome');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);


        // $userData = [
        //     'email' => request->get('email')
        // ]
    }
}
