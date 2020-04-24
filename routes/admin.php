<?php

Route::middleware(['admin.access'])->group(function(){

    // Dashboard
    Route::get('/admin', 'Admin\AdminController@dashboard')->name('dashboard');

    Route::resource('/admin/users', 'Admin\UserController')->names([
        'index'   => 'admin.users.index',
        'create'  => 'admin.users.create',
        'store'   => 'admin.users.store',
        'show'    => 'admin.users.show',
        'edit'    => 'admin.users.edit',
        'update'  => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);


    // Settings
    Route::resource('/admin/settings', 'Admin\SettingsController')->names([
        'index'   => 'admin.settings.index',
        'create'  => 'admin.settings.create',
        'store'   => 'admin.settings.store',
        'show'    => 'admin.settings.show',
        'edit'    => 'admin.settings.edit',
        'update'  => 'admin.settings.update',
        'destroy' => 'admin.settings.destroy',
    ]);

    // Faqs
    Route::resource('/admin/faqs', 'Admin\FaqController')->names([
        'index'   => 'admin.faqs.index',
        'create'  => 'admin.faqs.create',
        'store'   => 'admin.faqs.store',
        'show'    => 'admin.faqs.show',
        'edit'    => 'admin.faqs.edit',
        'update'  => 'admin.faqs.update',
        'destroy' => 'admin.faqs.destroy',
    ]);

});
