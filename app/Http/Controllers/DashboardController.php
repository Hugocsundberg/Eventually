<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    function getEvents()
    {
        $user = Auth::user();
        $events = DB::table('events')->get()->where('event_host', '=', $user->id);
        return view('dashboard', ['events' => $events]);
    }
}
