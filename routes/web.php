<?php


Route::group(['middleware'=>["web"]], function (){
    Route::get('/', 'HomeController@index')->name('/');
    // Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/contact', function (){
        return view('contato');
    })->name('contact');

    //Rotas do Dashboard
    Route::get('/perfil', function (){
        if (Auth::check()) {
            return view('perfil');
        }else{
            return redirect()->route('/');
        }
    })->name('perfil');
    Route::get('/perfil/{any}', 'DashboardController@index')->where('any', '.*');

    //Rota de logout personalizado
    Route::get('/logout', 'Auth\LoginController@logout');
    Route::get('/reserva', function (){
        return view('reserva',['dados'=>session('data')]);
    })->name('reserva');

    //Rotas de Api
    Route::group(['prefix'=>'api/', 'middleware'=>'api'], function (){
        Route::get('getPFisica/', "PessoaFisicaController@getPessoaSessao");
        Route::post('locacao','LocacaoController@setPredados');

        Route::post('getcarrosAcessorio','LocacaoController@setgetCarLocacaoAcessorio');

        Route::get('getPJuridica/', "PessoaJuridicaController@getPessoaSessao");
        Route::get('pfisica/{cpf}', "PessoaFisicaController@show");
        Route::get('userInsert/{tipo}/{id}', 'UserController@show');
        Route::post('updateDadosPessoaisPessoaFisica/{cpf}', 'PessoaFisicaController@updateDados');
        Route::post('updateDadosPessoaisPessoaJuridica/{cnpj}', 'PessoaJuridicaController@updateDados');
        Route::post('addLocadora/{cnpj}', 'LocadoraController@store');
        Route::post('updateDadosPessoaisEndereco/{id}', 'UserController@alteraEndereco');
        Route::post('updateDadosPessoaisUser/{id}', 'UserController@alteraEmailSenha');
        Route::get('tipoUser/', "UserController@getTipo");
        Route::get('getpjuridica/{cnpj}', "PessoaJuridicaController@show");
        Route::get('getCar/{id}', 'LocadoraController@getCars');
        Route::get('getLocadora/{categoria}', 'HomeController@getLocadora');
        Route::post('setCarLocacao', 'LocacaoController@setCarLocacao');
        Route::get('getEstadoExist/{estado}', 'PessoaFisicaController@verificaEstadoCNH');
        Route::post('efetuarReserva/','LocadoraController@reserva');
        Route::post('setconta/', 'PessoaFisicaController@setConta');
        Route::post('generatePDF/', 'LocadoraController@generatePDF');
        Route::post('getEstadoExist', 'PessoaFisicaController@verificaEstadoCNH');
        Route::get('getOneLocadora/{id}', 'LocadoraController@show');
        Route::post('updateLocadora/{id}/{idEndereco}', 'LocadoraController@update');
        Route::get('DeleteLocadora/{id}', 'LocadoraController@destroy');
    });
    Route::get('/locacao','LocacaoController@index')->name('locacao');
});
Auth::routes();