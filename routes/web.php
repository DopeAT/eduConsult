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


// Admin Routes
require_once('admin.php');


Route::get('/services', 'PagesController@services')->name('services');
Route::post('/newsletter/store', 'NewsletterController@store')->name('newsletter.store');
