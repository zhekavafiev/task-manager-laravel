<?php

use App\Helpeers\GetWeather\Weather;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Rollbar\Payload\Level;
use Rollbar\Rollbar;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::middleware(['auth'])->get('/users', 'UserController@index')->name('users');

Route::resource('/task_statuses', 'TaskStatusController');

Route::resource('/tasks', 'TaskController');

Route::get('labels', 'LabelController@index')->name('labels.index');
Route::delete('labels/{label}', 'LabelController@delete')->name('labels.delete');

Route::post('/tasks/{task}/labels/newconnection', 'LabelController@newConnection')
    ->name('tasks.labels.newconnection');
    
Route::resource('/tasks.labels', 'LabelController');

Route::get('/rollbar', function () {
    echo 'RollbarTest';
});

// Route::get('test', function () {
//     $user = Auth::user();
//     $test = new Weather($user);
//         $test->setSession();
//         // session()->pull('weather');
//     return view('test_include');
// });
