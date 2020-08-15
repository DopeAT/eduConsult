<?php

Route::middleware(['admin.access'])->group(function(){

    // Dashboard
    Route::get('/admin', 'Admin\AdminController@dashboard')->name('dashboard');

    // Orders
    Route::resource('/admin/orders', 'Admin\OrderController')->names([
        'index'   => 'admin.orders.index',
        'create'  => 'admin.orders.create',
        'store'   => 'admin.orders.store',
        'show'    => 'admin.orders.show',
        'edit'    => 'admin.orders.edit',
        'update'  => 'admin.orders.update',
        'destroy' => 'admin.orders.destroy',
    ]);

    // Services
    Route::resource('/admin/services', 'Admin\ServiceController')->names([
        'index'   => 'admin.services.index',
        'create'  => 'admin.services.create',
        'store'   => 'admin.services.store',
        'show'    => 'admin.services.show',
        'edit'    => 'admin.services.edit',
        'update'  => 'admin.services.update',
        'destroy' => 'admin.services.destroy',
    ]);

    // Services
    Route::resource('/admin/products', 'Admin\ProductController')->names([
        'index'   => 'admin.products.index',
        'create'  => 'admin.products.create',
        'store'   => 'admin.products.store',
        'show'    => 'admin.products.show',
        'edit'    => 'admin.products.edit',
        'update'  => 'admin.products.update',
        'destroy' => 'admin.products.destroy',
    ]);

    // Messages
    Route::resource('/admin/messages', 'Admin\MessageController')->names([
        'index'   => 'admin.messages.index',
        'create'  => 'admin.messages.create',
        'store'   => 'admin.messages.store',
        'show'    => 'admin.messages.show',
        'edit'    => 'admin.messages.edit',
        'update'  => 'admin.messages.update',
        'destroy' => 'admin.messages.destroy',
    ]);

    // Users
    Route::resource('/admin/users', 'Admin\UserController')->names([
        'index'   => 'admin.users.index',
        'create'  => 'admin.users.create',
        'store'   => 'admin.users.store',
        'show'    => 'admin.users.show',
        'edit'    => 'admin.users.edit',
        'update'  => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);

    // Roles
    Route::resource('/admin/roles', 'Admin\RoleController')->names([
        'index'   => 'admin.roles.index',
        'create'  => 'admin.roles.create',
        'store'   => 'admin.roles.store',
        'show'    => 'admin.roles.show',
        'edit'    => 'admin.roles.edit',
        'update'  => 'admin.roles.update',
        'destroy' => 'admin.roles.destroy',
    ]);

    // Newsletter Data
    Route::resource('/admin/newsletter', 'Admin\NewsletterController')->names([
        'index'   => 'admin.newsletter.index',
        'create'  => 'admin.newsletter.create',
        'store'   => 'admin.newsletter.store',
        'show'    => 'admin.newsletter.show',
        'edit'    => 'admin.newsletter.edit',
        'update'  => 'admin.newsletter.update',
        'destroy' => 'admin.newsletter.destroy',
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

    // Testimonials
    Route::resource('/admin/testimonials', 'Admin\TestimonialController')->names([
        'index'   => 'admin.testimonials.index',
        'create'  => 'admin.testimonials.create',
        'store'   => 'admin.testimonials.store',
        'show'    => 'admin.testimonials.show',
        'edit'    => 'admin.testimonials.edit',
        'update'  => 'admin.testimonials.update',
        'destroy' => 'admin.testimonials.destroy',
    ]);

    // Team
    Route::resource('/admin/team', 'Admin\TeamController')->names([
        'index'   => 'admin.team.index',
        'create'  => 'admin.team.create',
        'store'   => 'admin.team.store',
        'show'    => 'admin.team.show',
        'edit'    => 'admin.team.edit',
        'update'  => 'admin.team.update',
        'destroy' => 'admin.team.destroy',
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



    // Exports Routes
    require_once('exports.php');

});
