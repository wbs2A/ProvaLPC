<?php


Route::group(['middleware'=>["web"]], function (){
    Route::get('/perfil', function (){
        return view('perfil');
    })->name('perfil');
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/', 'HomeController@index')->name('/');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/contact', function (){
        return view('contato');
    })->name('contact');
    //Rotas do Dashboard
    Route::get('/{any}', 'DashboardController@index')->where('any', '.*');
});
Route::get('/userInsert/{tipo}/{id}', 'UserController@show');
Auth::routes();