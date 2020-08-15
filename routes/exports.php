<?php

/**
 * Export Routes
 */

// Orders
Route::post('/admin/orders/export/', 'Admin\OrderController@export')->name('admin.orders.export');

// Newsletter
Route::post('/admin/newsletter/export/', 'Admin\NewsletterController@export')->name('admin.newsletter.export');
