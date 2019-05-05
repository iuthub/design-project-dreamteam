<?php
	
	Route::resource('', 'AnimalController');
	Route::resource('/cart', 'CartController');
	Route::post('/mail', 'OrderController@sendMail')->name('makeOrder');
	Route::get('/cart/add/{rowId}/{singleitem}', 'CartController@addOne');
	Route::get('/cart/subtract/{rowId}/{singleitem}', 'CartController@subtractOne');
	
	Route::get('/animal/{id}', "AnimalController@getAnimal")->name('getAnimal');
	Route::get('/form/{id}', 'OrderController@showForm')->name('showForm');
	
	Route::get('/store', "StoreController@index")->name('store.index');
	Route::get('/contact', 'ContactController@index')->name('contacts.index');
	Route::get('/about', 'AboutUsController@index')->name('about.index');
	
	// AJAX Pagination
	Route::get('/animals/{type}/{page}', 'StoreController@get_by_page');