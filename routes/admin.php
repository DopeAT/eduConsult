<?php

/*
|--------------------------------------------------------------------------
| Web Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['admin.access'])->group(function(){

    // Dashboard
    Route::get('/admin', 'AdminController@index')->name('admin');

    // Admin - Roles
    Route::resource('/admin/roles', 'RolesController');

    // Admin - Users
    Route::get('/admin/users/admin', 'UserController@admins')->name('admin.users.admins');
    Route::get('/admin/users/members', 'UserController@members')->name('admin.users.members');
    Route::get('/admin/users/mail', 'UserController@newsletter')->name('admin.users.newsletter');
    Route::resource('/admin/users', 'UserController@newsletter');

    // Admin Orders


    // Admin Orders


    // Admin FAQs


    // Admin Testimonials


    // Admin Settings


    // Admin Mail Data



//
//    // Categories
//    Route::resource('/admin/categories', 'CategoriesController');
//
//    // Tags
//    Route::resource('/admin/tags', 'TagController');
//
//    // Partners Routes - Main
//    Route::resource('/admin/partners', 'PartnerController');
//
//    // Partner - Extra
//    Route::get('/admin/partner_removed', 'PartnerController@removed')->name('partner_removed');
//    Route::put('/admin/restore-partner/{partner}', 'PartnerController@restore')->name('restore-partner');
//
//    // Partner Rating
//    Route::get('/admin/partners/{partner}/rating', 'PartnerController@editratingform')->name('partners.edit.rating.form');
//    Route::put('/admin/partners/{partner}/rating', 'PartnerController@editrating')->name('partners.edit.rating');
//
//    // Partner Offers
//    Route::get('/admin/partners/{partner}/offers', 'OfferController@show')->name('offers.show');
//    Route::get('/admin/partners/{partner}/offers/create', 'OfferController@create')->name('offers.create');
//    Route::post('/admin/partners/{partner}/offers', 'OfferController@store')->name('offers.store');
//    Route::get('/admin/partners/{partner}/offers/edit', 'OfferController@edit')->name('offers.edit');
//    Route::put('/admin/partners/{partner}/offers', 'OfferController@update')->name('offers.update');
//
//    // Partner Bonus
//    Route::get('/admin/partners/{partner}/bonus', 'BonusController@show')->name('bonus.show');
//    Route::get('/admin/partners/{partner}/bonus/create', 'BonusController@create')->name('bonus.create');
//    Route::post('/admin/partners/{partner}/bonus/create', 'BonusController@store')->name('bonus.store');
//    Route::get('/admin/partners/{partner}/bonus/edit', 'BonusController@edit')->name('bonus.edit');
//    Route::put('/admin/partners/{partner}/bonus', 'BonusController@update')->name('bonus.update');
//
//
//    // Partner Features
//    Route::resource('/admin/features', 'FeatureController');
//
//
//    // Challenges
//    Route::resource('/admin/challenges', 'ChallengeController');
////    Route::get('/admin/challenges/{challenge}/bets', 'ChallengeController@showBets')->name('show_bets_on_challenge');
//
//    // Bets
//    Route::resource('/admin/bets', 'BetController');
//
//    // Posts Routes
//    Route::resource('/admin/posts', 'PostController');
//
//    // Users
//    Route::get('/admin/users/admin', 'Admin\AdminController@adminUsers')->name('adminUsers');
//
//
//    // App Settings
//    Route::get('/admin/settings', 'Admin\AdminController@settings')->name('settings');

});
