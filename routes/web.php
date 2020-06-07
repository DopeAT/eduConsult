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


// Order Page
Route::get('/order', 'OrderController@order')->name('order');


// Ajax - Api Routes
Route::post('/api/newsletter/post', 'AjaxController@newsletter')->name('newsletter.store');

// Admin Routes
require_once('admin.php');


Route::get('/services', 'PagesController@services')->name('services');

