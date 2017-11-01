<?php
/*
|--------------------------------------------------------------------------
| Landing Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
	return 'Hello!';
});

Route::group(['namespace' => 'Landing'], function () {
	Route::get('news', 'NewsController@getNewsItems')->name('landing.news.getNewsItems');
});
