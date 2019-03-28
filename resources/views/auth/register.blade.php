@extends('main')

@section('content')
<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header">Registrar-se</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-4">
                                <label for="name" class="col-form-label text-md-right">Nome</label>
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-4">
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
                            <div class="col-2 mb-3">
                                <label for="tipo" class="col-form-label text-md-right">Tipo de conta</label>
                                <select id="tipo" type="tipo" class="form-control{{ $errors->has('tipo') ? ' is-invalid' : '' }}" name="tipo" value="{{ old('tipo') }}" required>
                                    <option>Fisica</option>
                                    <option>Jurídica</option>
                                 </select>
                                @if ($errors->has('tipo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tipo') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div id='fisico' class="form-group row" style="display: none;">
                            <div class="col-3 mb-3">
                                <label for="cpf" class="col-form-label text-md-right">CPF</label>
                                <input type="number" class="form-control" id="cpf" maxlength="14" name="cpf" placeholder="CPF" value="" required>
                            </div>
                            <div class="col-3 mb-3">
                                <label for="rg" class="col-form-label text-md-right">RG</label>
                                <input type="text" class="form-control" name="rg" id="rg" placeholder="RG" value="" required="">
                            </div>
                            <div class="col-3 mb-3">
                                <label for="nascimento" class="col-form-label text-md-right" >Data de nascimento</label>
                                <input type="date" class="form-control" id="nascimento" name="nascimento" placeholder="">
                            </div>
                            <div class="col-3 mb-3">
                                <label for="sexo" class="col-form-label text-md-right" >Sexo</label>
                                <input type="text" class="form-control" id="sexo" name="sexo" placeholder="">
                            </div>

                        </div>
                        <div id='juridico' class="form-group row" style="display: none;">
                            <div class="col-4 mb-3">
                                <label for="cnpj" class="col-form-label text-md-right">CNPJ</label>
                                <input type="number" class="form-control" id="cnpj" maxlength="14" name="cnpj" placeholder="CNPJ" value="" required>
                            </div>
                            <div class="col-4 mb-3">
                                <label for="razaoSocial" class="col-form-label text-md-right" >Razão Social</label>
                                <input type="text" class="form-control" id="razaoSocial" name="razaoSocial" placeholder="">
                            </div>

                        </div>
                        <div class="form-group row">
                            <label class="col-md-12">Endereço</label>
                                  <div class="col-2 mb-3">
                                    <label for="cep" class="col-form-label text-md-right">CEP</label>
                                    <input type="text" class="form-control" id="cep" name="cep" placeholder="">
                                  </div>
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
                                    <input class="form-control" id="pais" name="pais">
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

                            <div class="col-4 mb-3">
                                    <label for="password" class="col-form-label text-md-right">Senha</label>
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-4 mb-3">
                                <label for="password-confirm" class="col-form-label text-md-right">Confirmar Senha</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
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
