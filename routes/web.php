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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeController@index')->name('home');
Route::get('/login', 'HomeController@login')->name('login.index');
Route::post('/login', 'HomeController@store')->name('login.store');
Route::post('/logout', 'HomeController@destroy')->name('login.destroy');
Route::get('/logout', 'HomeController@destroy')->name('logout.index');

Route::get('/register', 'HomeController@register')->name('register');
Route::post('/register', 'HomeController@registerStore')->name('register.store');

Route::get('/home', 'HomeController@index');
Route::get('/eventinfo', 'HomeController@eventinfo');
Route::get('/eventdetail/{id}', 'HomeController@eventdetail')->name('event.detail');
Route::get('/eventshop/{event_shop_id}/product/{id}', 'HomeController@eventproduct')->name('event.detail.product');

// Route::get('/order', 'HomeController@eventorder');
Route::post('/cart', 'HomeController@cartAdd')->name('cart.add');
Route::get('/cart', 'HomeController@cartDetail')->name('cart.detail');
Route::get('/cart/flush', 'HomeController@cartFlush')->name('cart.flush');

Route::get('/cart/seller', 'HomeController@cartSeller')->name('cart.seller');
Route::post('/cart/order', 'HomeController@order')->name('cart.order');
Route::get('/cart/eventShop/{eventShopId}/seller/{seller_id}', 'HomeController@addSeller')->name('cart.seller.add');

Route::middleware(['login'])->group(function () {
    Route::resource('confirms', 'ConfirmController');
    Route::post('/confirms/final', 'ConfirmController@final')->name('confirms.final');

    Route::resource('events', 'EventController');

    Route::resource('locations', 'LocationController');

    Route::resource('shops', 'ShopController');

    Route::resource('products', 'ProductController');

    // Route::get('/products', 'ProductController@index')->name('products.index');
    Route::get('/products/shop/{shop_id}', 'ProductController@build')->name('products.build');
    Route::post('/products', 'ProductController@store')->name('products.store');

    Route::resource('categories', 'CategoryController');

    Route::resource('eventshops', 'EventShopController');
    Route::get('/eventshops/getshop/{event_shop_id}', 'EventShopController@getShop')->name('eventshops.getShop');
    //

    Route::resource('productevents', 'ProducteventController');
    Route::get('/productevents/eventshop/{id}', 'ProducteventController@index')->name('productevents.index.event');

    Route::resource('menus', 'MenuController');

    Route::resource('permissions', 'PermissionsController');

    Route::resource('eventJoineds', 'EventJoinedController');

    Route::resource('orderHeaders', 'OrderHeaderController');

    Route::resource('orderDetails', 'OrderDetailController');

    Route::post('/orders', 'OrderController@store')->name('orders.store');
    Route::get('/orders', 'OrderController@index')->name('orders.index');

});
