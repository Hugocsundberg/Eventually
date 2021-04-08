<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\CreateEventController;
use App\Models\Events;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', [LoginController::class, 'checkLogin']);

Route::get('/register', function () {
    return view('register');
});

Route::get('logout', [LogoutController::class, 'logout'])->middleware('auth');

Route::post('/register', [RegisterController::class, 'register']);

Route::get('/welcome', function () {
    return view('welcome');
})->middleware('auth');


Route::get('/create-event', function () {
    return view('create-event', ['user' => Auth::user()]);
})->middleware('auth');

Route::post('/event', [CreateEventController::class, 'createEvent']);

Route::get('/event-page/{event_data}', function (Events $event_data) {
    return view('event', ['event' => $event_data]);
});
