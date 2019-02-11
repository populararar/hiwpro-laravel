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
Route::get('/address', 'DropdownController@index')->name('confirms.address');
Route::post('/address/fetch', 'DropdownController@fetch')->name('dropdown.fetch');

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

Route::get('/cart/product/{id}/increase', 'HomeController@increase')->name('cart.increase');
Route::get('/cart/product/{id}/decrease', 'HomeController@decrease')->name('cart.decrease');
Route::get('/cart/product/{id}/remove', 'HomeController@cartRemove')->name('cart.remove');

Route::post('/cart/order', 'HomeController@order')->name('cart.order');
Route::get('/cart/eventShop/{eventShopId}/seller/{seller_id}', 'HomeController@addSeller')->name('cart.seller.add');

Route::get('/seller/review', 'HomeController@sellerReview')->name('home.seller_rate');

// Route::get('/cart/product/{id}/remove', 'HomeController@cartRemove')->name('cart.remove');

Route::middleware(['login'])->group(function () {

    Route::resource('profiles', 'ProfileController');
    // Route::get('/profiles', 'ProfileController@main')->name('profiles.main');
    Route::get('/profiles/create', 'ProfileController@create')->name('profiles.create');
    Route::get('/profiles/customer/{id}', 'ProfileController@customer')->name('profiles.customer');
    // Route::get('/main', 'ProfileController@admin')->name('profiles.admin');

    Route::resource('confirms', 'ConfirmController');
    Route::post('/confirms/final', 'ConfirmController@final')->name('confirms.final');
    Route::get('/confirms/{id}/payment', 'ConfirmController@payment')->name('confirms.payment');
    Route::post('/confirms/{id}/payment', 'ConfirmController@paymentStore')->name('confirms.payment.store');
    Route::get('/confirms/{id}/slip', 'ConfirmController@slip')->name('confirms.slip');

    Route::resource('events', 'EventController');
    // Route::get('/events/show/dashboard', 'EventController@dashboard')->name('events.dashboard');
    Route::get('/events/show/dashboard', 'EventController@dashboard')->name('dashboards.index');

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

    Route::resource('orderSellers', 'OrderSellerController');

    Route::resource('orderDetails', 'OrderDetailController');

    Route::post('/orders', 'OrderController@store')->name('orders.store');
    Route::get('/orders', 'OrderController@index')->name('orders.index');
    Route::get('/orders/status/detail/{id}', 'OrderController@statusdetail')->name('orders.statusdetail');

    Route::post('/orders/seller/review/{id}', 'OrderController@sellerReview')->name('orders.sellerreview');

    Route::resource('payments', 'PaymentController');
    Route::resource('sellerReviews', 'SellerReviewController');

    Route::resource('notifications', 'NotificationController');
});
Route::get('/mail', 'HomeController@mail');



Route::resource('reportAdmins', 'ReportAdminController');

Route::resource('reportSellers', 'ReportSellerController');