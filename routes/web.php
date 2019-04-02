<?php


Route::group(['middleware'=>["web"]], function (){
    Route::get('/', 'HomeController@index')->name('/');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/contact', function (){
        return view('contato');
    })->name('contact');

    //Rotas do Dashboard
    Route::get('/perfil', function (){
        return view('perfil');
    })->name('perfil');
    Route::get('/perfil/{any}', 'DashboardController@index')->where('any', '.*');

    //Rota de logout personalizado
    Route::get('/logout', 'Auth\LoginController@logout');

    //Rotas de Api
    Route::group(['prefix'=>'api/'], function (){
        Route::get('getPFisica/', "PessoaFisicaController@getPessoaSessao");
        Route::get('pfisica/{cpf}', "PessoaFisicaController@show");
        Route::get('userInsert/{tipo}/{id}', 'UserController@show');
        Route::post('updateDadosPessoais/{cpf}', 'PessoaFisicaController@updateDados');
    });
});
Auth::routes();