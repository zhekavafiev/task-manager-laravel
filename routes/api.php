<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/tasks')->group(function () {
    Route::get('/', 'API\TaskController@getTasks');
    Route::get('/{taskId}', 'API\TaskController@getTask')->where(['taskId' => '[0-9]+']);
    Route::post('/', 'ApiTaskController@createTask');
    Route::delete('/{taskId}', 'ApiTaskController@deleteTask')->where(['taskId' => '[0-9]+']);
    Route::patch('/{taskId}', 'ApiTaskController@updateTask')->where(['taskId' => '[0-9]+']);
});
