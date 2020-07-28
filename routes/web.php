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

Route::get('/language/{lang}', function ($lang) {
    session(['locale' => $lang]);
    return back();
})->name('language');

Route::middleware(['locale'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

    Route::get('/home', 'HomeController@index')->name('home');
    
    Auth::routes();
    
    Route::middleware(['auth'])->get('/users', 'UserController@index')->name('users');

    Route::resource('/task_statuses', 'TaskStatusController');

    Route::resource('/tasks', 'TaskController');

    Route::get('labels/index', 'LabelController@adminIndex')->name('labels.adminIndex');
    Route::delete('labels/{label}/destroy', 'LabelController@adminDestroy')->name('labels.adminDestroy');

    Route::post('/tasks/{task}/labels/newconnection', 'LabelController@newConnection')
        ->name('tasks.labels.newconnection');
        
    Route::resource('/tasks.labels', 'LabelController');
});
