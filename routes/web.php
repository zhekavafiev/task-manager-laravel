<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Rollbar\Rollbar;
use Rollbar\Payload\Level;

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
Route::middleware(['locale'])->group(function () {
    Route::get('/', function (Request $request) {
        Log::debug('Hello world');
        return view('welcome');
    })->name('welcome');
    Route::get('/home', 'HomeController@index')->name('home');
    Auth::routes();
    Route::middleware(['auth'])->group(function () {
        Route::get('/users', 'UserController@index')->name('users');
        Route::get('/users/{id}', 'UserController@show')->name('users.show');
    });
});

Route::get('/language/{lang}', function ($lang) {
    session(['locale' => $lang]);
    return back();
})->name('language');

Route::get('/error', function () {
    // dd(config('services.rollbar'));
    Rollbar::log(Level::info(), 'Test info message');
    throw new \Exception('Test exception');
    abort(500);
});
