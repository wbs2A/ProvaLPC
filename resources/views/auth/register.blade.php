@extends('main')

@section('content')
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Registrar-se</div>

                <div class="card-body">
                    <form id="index" method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-5">
                                <label for="name" class="col-form-label text-md-right">Nome</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-5">
                                <label for="email" class="col-form-label text-md-right">E-Mail</label>
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-2">
                                <label for="telefone" class="col-form-label text-md-right">Telefone</label>
                                <input id="telefone" type="tel" class="form-control{{ $errors->has('telefone') ? ' is-invalid' : '' }}" name="telefone" value="{{ old('telefone') }}" required>

                                @if ($errors->has('telefone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            
                        </div>
                            <div  class="form-group row">
                                <createuser class="ml-0"></createuser>
                                @if ($errors->has('tipo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                                <div  class=" fisica col-2 p-0 mr-1 ml-1 mb-3" style="display: none">
                                    <label for="cpf" class="col-form-label text-md-right">CPF</label>
                                    <input type="number" class="form-control" id="cpf" maxlength="11" name="cpf" placeholder="CPF" value="">
                                     @if ($errors->has('cpf'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cpf') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class=" fisica col-2 p-0 mr-1 ml-1 mb-3" style="display: none">
                                    <label for="rg" class="col-form-label text-md-right">RG</label>
                                    <input type="text" class="form-control" name="rg" id="rg" placeholder="RG" value="">
                                     @if ($errors->has('rg'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('rg') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-3  fisica  p-0 mr-1 ml-1 mb-3" style="display: none">
                                    <label for="nascimento" class="col-form-label text-md-right" >Data de nascimento</label>
                                    <input type="date" class="form-control" id="nascimento" name="nascimento" placeholder="">
                                    @if ($errors->has('nascimento'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('nascimento') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-2 fisica  p-0 mr-1 ml-1 mb-3" style="display: none">
                                    <label for="sexo" class="col-form-label text-md-right" >Sexo</label>
                                    <input type="text" class="form-control" id="sexo" name="sexo" placeholder="">
                                     @if ($errors->has('sexo'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('sexo') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-5 juridica mb-3" style="display: none">
                                    <label for="cnpj" class="col-form-label text-md-right">CNPJ</label>
                                    <input type="number" class="form-control" id="cnpj" maxlength="14" name="cnpj" placeholder="CNPJ" value="">
                                </div>
                                     @if ($errors->has('cnpj'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('cnpj') }}</strong>
                                        </span>
                                    @endif
                                <div class="col-5 juridica mb-3" style="display: none">
                                    <label for="razaoSocial" class="col-form-label text-md-right" >Razão Social</label>
                                    <input type="text" class="form-control" id="razaoSocial" name="razaoSocial" placeholder="">
                                </div>
                                     @if ($errors->has('razaoSocial'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('razaoSocial') }}</strong>
                                        </span>
                                    @endif
                                
                            </div>
                            <div class="form-group row">
                                <label class="col-md-12">Endereço</label>
                                  <buscacep></buscacep>
                                  <div class="col-2 mb-3">
                                    <label for="numero" class="col-form-label text-md-right">Numero</label>
                                    <input type="number" class="form-control" id="numero" name="numero" placeholder="">
                                  </div>
                                  <div class="col-4 mb-3">
                                    <label for="bairro" class="col-form-label text-md-right">Bairro</label>
                                    <input type="text" class="form-control" id="bairro" name="bairro" placeholder="">
                                  </div>
                                  <div class="col-4 mb-3">
                                    <label for="rua" class="col-form-label text-md-right">Rua</label>
                                    <input type="text" class="form-control" id="rua" name="rua" placeholder="">
                                  </div>
                                <div class="col-4 mb-3">
                                    <label for="pais" class="col-form-label text-md-right">Pais</label>
                                    <input class="form-control" id="pais" value="Pais" name="pais">
                                  </div>
                                  <div class="col-4 mb-3">
                                    <label for="estado" class="col-form-label text-md-right">Estado</label>
                                    <input type="text" class="form-control" id="estado" name="estado" placeholder="">
                                  </div>
                                  <div class="col-4 mb-3">
                                    <label for="cidade" class="col-form-label text-md-right">Cidade</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" placeholder="">
                                  </div>
                        </div>

                        
                        


                        <div class="form-group row">

                            <div class="col-6 mb-3">
                                    <label for="password" class="col-form-label text-md-right">Senha</label>
                                <input id="password" minlength="6" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-6 mb-3">
                                <label for="password-confirm" class="col-form-label text-md-right">Confirmar Senha</label>
                                <input id="password-confirm" minlength="6" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                                <button type="submit" class=" col-auto btn btn-primary">
                                   Registrar
                                </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
