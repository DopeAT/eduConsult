<?php

Route::middleware(['admin.access'])->group(function(){

    // Dashboard
    Route::get('/admin', 'Admin\AdminController@dashboard')->name('dashboard');

});
