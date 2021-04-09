<?php
	
Route::group(['namespace' => 'Bbis\Contact\Http\Controllers'], function() {
	Route::get('contact', 'ContactController@index');
	Route::post('contact', 'ContactController@sendMail')->name('contact');
});

?>