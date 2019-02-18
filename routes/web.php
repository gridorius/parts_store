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

// Models 
Route::model('spare_part_in_shop', 'App\SparePartInShop');
Route::model('user_order', 'App\UserOrder');
Route::model('response_to_user_order', 'App\ResponseToUserOrder');

// Auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// SparePart
Route::get('spare-part', 'SparePartController@showSparePartForm');
Route::post('spare-part', 'SparePartController@create')

// SparePartInShop
Route::get('profile/spare-part', 'SparePartInShopController@showSparePartInShopForm');
Route::post('profile/spare-part', 'SparePartInShopController@create');
Route::get('profile/spare-parts', 'SparePartInShopController@show');
Route::delete('profile/spare-part/{spare_part_in_shop}', 'SparePartInShopController@delete');

// UserOrder
Route::get('profile/user-order', 'UserOrderController@showUserOrderForm');
Route::post('profile/user-order', 'UserOrderController@create');
Route::get('profile/user-orders', 'UserOrderController@show')->name('');
Route::delete('profile/user-order/{user_order}', 'UserOrderController@delete');

// ResponseToUserOrder
Route::post('profile/response-to-order', 'ResponseToUserOrderController@create');
Route::delete('profile/response-to-order/{response_to_user_order}', 'ResponseToUserOrderController@delete');
