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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/faqs', 'PagesController@faqs')->name('faqs');
Route::get('/contact', 'ContactController@show')->name('contact');
Route::post('/contact', 'ContactController@store')->name('contact.post');

Route::get('/privacy', 'PagesController@privacy')->name('privacy');
Route::get('/terms',   'PagesController@terms')->name('terms');
Route::get('/sitemap', 'PagesController@sitemap')->name('sitemap');

// Services
Route::get('/services', 'ServiceController@index')->name('services.index');
Route::get('/services/{service}', 'ServiceController@show')->name('services.show');

// Products
Route::get('/services/{service}/{product}', 'ProductController@show')->name('products.show');

// Order Page
Route::get('/order', 'OrderController@order')->name('order');


// Ajax - Api Routes
Route::post('/api/newsletter/post', 'AjaxController@newsletter')->name('newsletter.store');
Route::get('/api/user/me', 'AjaxController@me')->name('me');
Route::get('/api/orders/levels', 'AjaxController@orderLevels')->name('orderLevels');
Route::get('/api/orders/additional-services', 'AjaxController@additionalServices')->name('additionalServices');
Route::post('/api/orders/order-total', 'AjaxController@orderTotal')->name('orderTotal');
Route::post('/api/checkUserEmail', 'AjaxController@checkUserEmail')->name('checkUserEmail');
Route::post('/api/orders/get-discount', 'AjaxController@getDiscount')->name('getDiscount');
Route::post('/api/service/order-pdf', 'AjaxController@createInvoicePDF')->name('createInvoicePDF');

// Payment Routes
Route::post('/charge', 'PaymentController@charge');

// Admin Routes
require_once('admin.php');

