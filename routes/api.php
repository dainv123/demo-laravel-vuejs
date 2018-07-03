<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('local/{filename}', ['uses' => 'ApiLocalController@getInfo']);

// Route::get('role', ['uses' => 'RoleController@getList']);

Route::group(['as' => 'role.', 'prefix' => 'role'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'RoleController@getList']);
    Route::get('create', ['as' => 'create', 'uses' => 'RoleController@getCreate']);
    Route::post('create', ['as' => 'create', 'uses' => 'RoleController@postCreate']);
    Route::get('{id}/edit', ['as' => 'edit', 'uses' => 'RoleController@getEdit']);
    Route::post('{id}/edit', ['as' => 'edit', 'uses' => 'RoleController@postEdit']);
    Route::post('delete', ['as' => 'delete', 'uses' => 'RoleController@postDelete']);
});