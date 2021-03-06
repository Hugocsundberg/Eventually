<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
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

Route::get('/', [DashboardController::class, 'getEvents'])->middleware(('auth'));

Route::get('/dashboard', [DashboardController::class, 'getEvents'])->middleware(('auth'));

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

Route::post('/event', [EventController::class, 'createEvent']);

Route::get('/event-page/{event_data}', [EventController::class, 'getComments']);

Route::get('/event-page/{event_data}/delete', [EventController::class, 'deleteEvent']);

Route::get('/event-page/{event_data}/delete-comment/{comment_id}', [EventController::class, 'deleteComment']);

Route::post('/add-comment', [EventController::class, 'addComment']);

Route::get('/event-page/{event_data}/edit-event', [EventController::class, 'editEvent'])
    ->middleware('auth');

Route::post('/event-page/{event_data}/edit-event', [EventController::class, 'saveChanges'])
    ->middleware('auth');
