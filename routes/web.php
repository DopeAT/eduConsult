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
Route::get('/sitemap', 'PagesController@sitemap')->name('sitemap');

// Services
Route::get('/services', 'ServiceController@index')->name('services.index');
Route::get('/services/{service}', 'ServiceController@show')->name('services.show');

// Products
Route::get('/services/{service}/{product}', 'ProductController@show')->name('products.show');

// Order Page
Route::get('/order', 'OrderController@order')->name('order');

// Survey
Route::get('/survey-example', 'PagesController@surveyExample')->name('survey.example');

// Ajax - Api Routes
Route::post('/api/newsletter/post', 'AjaxController@newsletter')->name('newsletter.store');
Route::get('/api/user/me', 'AjaxController@me')->name('me');
Route::get('/api/orders/levels', 'AjaxController@orderLevels')->name('orderLevels');
Route::get('/api/orders/additional-services', 'AjaxController@additionalServices')->name('additionalServices');
Route::post('/api/orders/order-total', 'AjaxController@orderTotal')->name('orderTotal');
Route::post('/api/checkUserEmail', 'AjaxController@checkUserEmail')->name('checkUserEmail');
Route::post('/api/orders/get-discount', 'AjaxController@getDiscount')->name('getDiscount');
Route::get('/order-pdf/{id}', 'AjaxController@createInvoicePDF')->name('createInvoicePDF');

// Payment Routes
Route::post('/charge', 'PaymentController@charge');

// Auth Routes
Route::middleware(['admin.access'])->group(function(){
    Route::get('/profile', 'UserController@me')->name('profile');
    Route::put('/profile/settings/{user}', 'UserController@update')->name('profile.settings.update');

    // Survey
    Route::get('/user/survey/{token}', 'SurveyController@survey')->name('survey');
    // Survey Upload Files
    Route::post('/user/survey/{token}/fileupload/','SurveyController@uploadFilesForUser')->name('users.fileupload');
    // Survey Submit
    Route::post('/user/survey/{token}', 'SurveyController@create')->name('survey.post');
});

// Admin Routes
require_once('admin.php');

// Should Be Last as is setting DB pages

// Pages
Route::get('/{page}', 'PagesController@show');
