<?php

/**
 * Json Reports Routes
 */

// Orders Revenue
Route::post('/admin/json/report/earnings', 'Admin\ReportController@earnings')->name('json.reports.earnings');

// Popular Service Sales
Route::post('/admin/json/report/popular', 'Admin\ReportController@popular')->name('json.reports.popular');
