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

Route::group(['as' => 'permission.', 'prefix' => 'permission'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'PermissionController@getList']);
    Route::get('create', ['as' => 'create', 'uses' => 'PermissionController@getCreate']);
    Route::post('create', ['as' => 'create', 'uses' => 'PermissionController@postCreate']);
    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'PermissionController@getEdit']);
    Route::post('edit/{id}', ['as' => 'edit', 'uses' => 'PermissionController@postEdit']);
    Route::post('delete', ['as' => 'delete', 'uses' => 'PermissionController@postDelete']);
});

Route::group(['as' => 'productsize.', 'prefix' => 'productsize'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'ProductSizeController@getList']);
    Route::get('create', ['as' => 'create', 'uses' => 'ProductSizeController@getCreate']);
    Route::post('create', ['as' => 'create', 'uses' => 'ProductSizeController@postCreate']);
    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ProductSizeController@getEdit']);
    Route::post('edit/{id}', ['as' => 'edit', 'uses' => 'ProductSizeController@postEdit']);
    Route::post('delete', ['as' => 'delete', 'uses' => 'ProductSizeController@postDelete']);
});


Route::group(['as' => 'category.', 'prefix' => 'category'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'CategoryController@getList']);
    Route::post('create', ['as' => 'create', 'uses' => 'CategoryController@postCreate']);
    Route::get('list_parent_option', ['as' => 'list_parent_option', 'uses' => 'CategoryController@getListParentOption']);
    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'CategoryController@getEdit']);
    Route::post('edit/{id}', ['as' => 'edit', 'uses' => 'CategoryController@postEdit']);
    Route::get('sort_parent_option/{id}', ['as' => 'sort_parent_option', 'uses' => 'CategoryController@getSortParentOption']);
    Route::post('delete', ['as' => 'delete', 'uses' => 'CategoryController@postDelete']);
});

Route::group(['as' =>  'user.', 'prefix' => 'user'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'UserController@getList']);
    Route::get('create', ['as' => 'create', 'uses' => 'UserController@getCreate']);
    Route::post('create', ['as' => 'create', 'uses' => 'UserController@postCreate']);
    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'UserController@getEdit']);
    Route::post('edit/{id}', ['as' => 'edit', 'uses' => 'UserController@postEdit']);
    Route::post('delete', ['as' => 'delete', 'uses' => 'UserController@postDelete']);
});

Route::group(['as' => 'product.', 'prefix' => 'product'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'ProductController@getList']);
    Route::get('create', ['as' => 'create', 'uses' => 'ProductController@getCreate']);
    Route::post('create', ['as' => 'create', 'uses' => 'ProductController@postCreate']);
    Route::get('edit/{id}', ['as' => 'edit', 'uses' => 'ProductController@getEdit']);
    Route::post('edit/{id}', ['as' => 'edit', 'uses' => 'ProductController@postEdit']);
    Route::post('delete', ['as' => 'delete', 'uses' => 'ProductController@postDelete']);
});