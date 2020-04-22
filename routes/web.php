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

// Pages
Route::get('/', 'HomeController@index')->name('home');
Route::get('/about', 'PagesController@about')->name('about');
Route::get('/services', 'PagesController@services')->name('services');
Route::get('/faqs', 'PagesController@faqs')->name('faqs');
Route::get('/contact', 'MessageController@showPage')->name('contact');


// Order Page
Route::get('/order', 'OrderController@index')->name('order.index');


// Post pages WEB
Route::post('/newsletter/store', 'NewsletterController@store')->name('newsletter.store');
Route::post('/contact', 'MessageController@store')->name('contact.store');


// Admin Routes
require_once('admin.php');
