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

Route::get('profile', 'UserController@profile')->name('profile');

// Models 
Route::model('spare_part_in_shop', 'App\SparePartInShop');
Route::model('user_order', 'App\UserOrder');
Route::model('response_to_user_order', 'App\ResponseToUserOrder');

// Auth
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// SparePart
Route::get('spare-part/find/{text}', 'SparePartController@find');
Route::get('spare-part', 'SparePartController@showSparePartForm')->name('spare-part-form');
Route::post('spare-part', 'SparePartController@create')->name('spare-part');

// SparePartInShop
Route::get('profile/spare-part', 'SparePartInShopController@showSparePartInShopForm')->name('spare-part-in-shop-form');
Route::post('profile/spare-part', 'SparePartInShopController@create')->name('spare-part-in-shop');
Route::get('profile/spare-parts', 'SparePartInShopController@show');
Route::delete('profile/spare-part/{spare_part_in_shop}', 'SparePartInShopController@delete')->name('spare-part-in-shop-delete');

// UserOrder
Route::get('profile/user-order', 'UserOrderController@showUserOrderForm')->name('user-order-form');
Route::get('profile/user-order/{user_order}', 'UserOrderController@get')->name('user-order-show');
Route::post('profile/user-order', 'UserOrderController@create')->name('user-order');
Route::get('profile/user-orders', 'UserOrderController@show');
Route::delete('profile/user-order/{user_order}', 'UserOrderController@delete')->name('user-order-delete');

// ResponseToUserOrder
Route::post('profile/response-to-order', 'ResponseToOrderController@create')->name('response-to-order');
Route::delete('profile/response-to-order/{response_to_user_order}', 'ResponseToOrderController@delete')->name('response-to-order-delete');
