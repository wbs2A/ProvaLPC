<?php


Route::group(['middleware'=>["web"]], function (){
    Route::get('/perfil', function (){
        return view('perfil');
    })->name('perfil');
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/', 'HomeController@index')->name('/');
    Route::get('/contact', function (){
        return view('contato');
    })->name('contact');
    //Rotas do Dashboard
    Route::get('/perfil/{any}', 'DashboardController@index')->where('any', '.*');
});
Auth::routes();