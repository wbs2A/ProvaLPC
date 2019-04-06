@extends('main' )
@section('content')
        {{--#TODO--}}
    {{--@if(isset($dados))--}}
        <div class="container">
            <div class="card">
                <div class="card-header text-center">
                    <h3> Você selecionou o {{ session('carro')}}</h3><br>
                    <h6> Aqui estão as informações de seu pedido:</h6>

                </div>
                <div class="card-body lead display-5">
                    <div class="row">
                        <div class="col">
                            <ul>
                                <li><b> CPF do responsável:</b> {{session('usuario')}}</li>
                                <li><b>Dias reservados:</b>  {{session('quantdias')}}</li>
                                <li><b>Data de retirada:</b> {{session('dataretirada')}}</li>
                                <li><b>Data de Entrega:</b> {{session('dataentrega')}}</li>
                                <li><b>Locadora de retirada:</b> {{session('localretirada')['nome']}}</li>
                                <li><b>Locadora de entrega:</b> {{session('localentrega')['nome']}}</li>
                            </ul>
                        </div>
                        <div class="col">
                            {{session('imagens')}}
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success">Efetuar Reserva</button>
                    <button class="btn btn-danger"> Cancelar reserva</button>
                </div>
            </div>
        </div>

    {{--@else--}}
        {{--<script>window.location = "/";</script>--}}
    {{--@endif--}}
@stop
@section('scripts')
    <script src="js/app.js"></script>
    <script src="js/dashboard.js"></script>
@stop
