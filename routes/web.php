<?php

Route::prefix('user')->middleware('auth')->namespace('User')->group(function(){
    Route::get('/home', 'HomeController@index');
});
Auth::routes();
Route::get('/', 'HomeController@index')->name('/');

// Route::get('/home', 'HomeController@index')->name('home');

