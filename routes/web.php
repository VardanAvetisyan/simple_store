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

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin.dashboard');

Route::get('/', 'HomeController@index')->name('home');

Route::get('/product-list', 'HomeController@getProducts')->name('products.list');

Route::get('/admin/logout', 'AdminController@logout')->name('logout');

Route::post('/delete/product', 'ApiController@deleteProductFromOrder')->name('api.delete.productfromorder');

Route::post('/order', [
    'as' => 'user.order', 'uses' => 'HomeController@order'
]);
Route::get('/checkout', [
    'as' => 'checkout', 'uses' => 'HomeController@checkout'
]);
Route::post('/checkout', [
    'as' => 'checkout.send', 'uses' => 'HomeController@checkoutSend'
]);


