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
Route::post('/register', 'User\RegisterController@register')->name('register.store');
Route::get('/register', 'User\RegisterFormController@form')->name('register.show');
Route::get('/login', 'User\LoginFormController@form')->name('login.show');
Route::post('/login', 'User\LoginController@login')->name('login');
Route::post('/logout', 'User\LogoutController@login')->name('logout');

Route::resource('/task_statuses', 'TaskStatusController');

Route::resource('/tasks', 'TaskController');

Route::group(['prefix' => 'labels'], function () {
    Route::get('/', 'Label\LabelsShowController@index')->name('labels.index');
    Route::delete('/', 'Label\LabelDestroyController@index')->name('labels.destroy');
});

Route::group(
    [
        'prefix' => 'profile',
//        'middleware' => 'auth'
    ],
    function () {
        Route::get('/users', 'User\UsersListController@index')->name('users.index');
        Route::get('/users/{user_id}', 'User\UserController@show')->name('users.show');
        Route::post('/users/{user_id}/avatar', 'User\UploadAvatarController@store')->name('users.store.avatar');
//        Route::patch('/', '')->name('users.update');
//        Route::delete('/', '')->name('users.destroy');
    });


Route::group(
    [
        'prefix' => 'team',
//        'middleware' => 'auth'
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

Route::get('test', function (\Illuminate\Http\Request $request) {
    \App\Model\User::find(3)->update([
        'password' => Hash::make('12345678')
    ]);
});
