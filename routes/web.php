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
Route::auth();

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/', function () {
//     return view('user.index');
// });

Route::get('/', ['as' => 'home,', 'uses' => 'HomeController@index']);

Route::get('product-detail/{id}/{slug}', ['as' => 'productdetail', 'uses' => 'ProductController@getProductDetail']);

Route::get('mail/send', 'MailController@send');

Route::get('buy-cart', ['as' => 'buycart,', 'uses' => 'ProductController@buyCart']);
Route::get('list-cart', ['as' => 'listcart,', 'uses' => 'ProductController@listCart']);
Route::get('update-cart', ['as' => 'updatecart,', 'uses' => 'ProductController@updateCart']);
Route::get('delete-cart/{id}', ['as' => 'deletecart', 'uses' => 'ProductController@deleteCart']);

Route::get('checkout', ['as' => 'checkout', 'uses' => 'ProductController@getCheckout']);
Route::post('checkout', ['as' => 'checkout', 'uses' => 'ProductController@postCheckout']);





// Route::get('/checkout', function () {
//     return view('user.checkout');
// });

Route::get('/shop', function () {
    return view('user.shop');
});

Route::get('/cart', function () {
    return view('user.cart');
});

Route::get('/product-details', function () {
    return view('user.product-details');
});


Route::get('/admin',  ['as' => 'admin', function () {
    return view('admin.index');
}]);

Auth::routes();

Route::get('/home', 'HomeController@index1')->name('home');


