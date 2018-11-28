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


// Auth::routes();

Route::get('/home', 'HomeController@index'); 

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