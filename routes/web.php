<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;

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

Route::resource('/task_statuses', 'TaskStatusController');

Route::resource('/tasks', 'TaskController');

Route::group(['prefix' => 'labels'], function () {
    Route::get('/', 'Label\LabelsShowController@index')->name('labels.index');
    Route::delete('/', 'Label\LabelDestroyController@index')->name('labels.destroy');
});

Route::group(
    [
        'prefix' => 'profile',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('/users', 'User\UsersListController@index')->name('users.index');
        Route::get('/users/{user_id}', 'User\UserController@show')->name('users.show');
        Route::delete('/', 'Label\LabelDestroyController@index')->name('labels.destroy');
});


Route::group(
    [
        'prefix' => 'team',
        'middleware' => 'auth'
    ],
    function () {
        Route::get('/', 'Team\TeamListController@index')->name('team.index');
        Route::get('/create', 'Team\TeamFormController@create')->name('team.create');
        Route::post('/create', 'Team\TeamStoreController@store')->name('team.store');

//        Route::get('/users/{user_id}', 'User\UserController@show')->name('users.show');
//        Route::delete('/', 'Label\LabelDestroyController@index')->name('labels.destroy');
    });

Route::post('/tasks/{task}/labels/newconnection', 'TaskLabelController@newConnection')
    ->name('tasks.labels.newconnection');

Route::resource('/tasks.labels', 'TaskLabelController');

Route::get('test', function () {
    $task = \App\Model\Task::first();
    \App\Jobs\CreateNewTaskMailJob::dispatch($task);
});
