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


Route::group(['as' => 'role.', 'prefix' => 'role'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'RoleController@getList']);
    Route::get('create', ['as' => 'create', 'uses' => 'RoleController@getCreate']);
    Route::post('create', ['as' => 'create', 'uses' => 'RoleController@postCreate']);
    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'RoleController@getEdit']);
    Route::post('edit/{id}', ['as' => 'edit', 'uses' => 'RoleController@postEdit']);
    Route::post('delete', ['as' => 'delete', 'uses' => 'RoleController@postDelete']);
});

Route::group(['as' => 'role.', 'prefix' => 'productsize'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'ProductSizeController@getList']);
    Route::get('create', ['as' => 'create', 'uses' => 'ProductSizeController@getCreate']);
    Route::post('create', ['as' => 'create', 'uses' => 'ProductSizeController@postCreate']);
    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ProductSizeController@getEdit']);
    Route::post('edit/{id}', ['as' => 'edit', 'uses' => 'ProductSizeController@postEdit']);
    Route::post('delete', ['as' => 'delete', 'uses' => 'ProductSizeController@postDelete']);
});

Route::group(['as' => 'role.', 'prefix' => 'category'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'CategoryController@getList']);
    Route::get('create', ['as' => 'create', 'uses' => 'CategoryController@getCreate']);
    Route::post('create', ['as' => 'create', 'uses' => 'CategoryController@postCreate']);
    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'CategoryController@getEdit']);
    Route::post('edit/{id}', ['as' => 'edit', 'uses' => 'CategoryController@postEdit']);
    Route::post('delete', ['as' => 'delete', 'uses' => 'CategoryController@postDelete']);
});