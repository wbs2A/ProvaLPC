<?php


Route::group(['middleware'=>["web"]], function (){
    Route::get('/perfil', function (){
        return view('perfil');
    })->name('perfil');
    Route::get('/', 'HomeController@index')->name('/');
    Route::get('/contact', function (){
        return view('contato');
    })->name('contact');
});
Route::get('/', 'HomeController@index')->name('/');
Auth::routes();