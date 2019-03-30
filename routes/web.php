<?php


Route::group(['middleware'=>["web"]], function (){
    //Rotas do Dashboard
    Route::get('/perfil', function (){
        return view('perfil');
    })->name('perfil');
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/', 'HomeController@index')->name('/');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/contact', function (){
        return view('contato');
    })->name('contact');
    Route::get('/perfil/{any}', 'DashboardController@index')->where('any', '.*');
});
Auth::routes();
Route::get('/userInsert/{tipo}/{id}', 'UserController@show');