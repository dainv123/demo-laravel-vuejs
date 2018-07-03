<?php

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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/admin/dai', function () {
    return view('admin.index');
});

Route::get('/admin/apip', ['uses' => 'RoleController@getList']);

// Route::group(['namespace' => 'Admin'], function () {
//     Route::group(['as' => 'preroll.', 'prefix' => 'preroll'], function () {
//         Route::get('/', ['as' => 'index', 'uses' => 'PrerollController@getIndex']);
//         Route::get('create', ['as' => 'create', 'uses' => 'PrerollController@getCreate']);
//         Route::post('create', ['as' => 'create', 'uses' => 'PrerollController@postCreate']);
//         Route::get('{id}/edit', ['as' => 'edit', 'uses' => 'PrerollController@getEdit']);
//         Route::post('{id}/edit', ['as' => 'edit', 'uses' => 'PrerollController@postEdit']);
//         Route::post('delete', ['as' => 'delete', 'uses' => 'PrerollController@postDelete']);
//     });
// });