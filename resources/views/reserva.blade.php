@extends('main' )
@section('content')
        {{--#TODO--}}
    {{--@if(isset($dados))--}}
        <div id="dashboard" class="container">
            <div class="card">
                <div class="card-header text-center">
                    <h3> Você selecionou o {{ session('carro')}}</h3><br>
                    <h6> Aqui estão as informações de seu pedido:</h6>

                </div>
                <div class="card-body lead display-5">
                    <div class="row">
                        <form id="myform" action="/api/generatePDF" method='post'>
                            @csrf
                            <div class="col">
                                <label for="cpf">CPF do responsável:</label>
                                <input class="form-control" id="cpf" disabled value="{{session('usuario')}}">
                                <small id="emailHelp" class="form-text text-muted">Nenhuma das informações aqui serão compartilhadas com terceiros</small><br>


                                <label for="dias">Dias reservados:</label>
                                <input class="form-control" id="dias" disabled value="{{session('quantdias')}}"><br>

                                <label for="dataret">Data de retirada:</label>
                                <input class="form-control" id="dataret" disabled value="{{session('dataretirada')}}"><br>

                                <label for="dataent"> Data de Entrega:</label>
                                <input class="form-control" id="dataent" disabled value="{{session('dataentrega')}}"><br>

                                <label for="localret"> Locadora de retirada:</label>
                                <input class="form-control" id="localret" disabled value="{{session('localretirada')['nome']}}"><br>

                                <label for="localet">Locadora de entrega:</label>
                                <input class="form-control" id="localet" disabled value="{{session('localentrega')['nome']}}">
                            </div>
                        </form>
                        <div class="col-5">
                            <confirm-reserv></confirm-reserv>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col text-center">
                            @if(session('imagens'))
                                <div id="slide" class="carousel slide myslide col align-middle" data-ride="carousel">
                                    <ul class="carousel-indicators">
                                        @foreach(session('imagens') as $key=>$img)
                                            <li data-target="#slide" data-slide-to="{{$key}}" class="{{$key? "active":""}}"></li>
                                        @endforeach
                                    </ul>
                                    <!-- The slideshow -->
                                    <div class="carousel-inner">
                                        @foreach(session('imagens') as $key=>$img)
                                            <div class="carousel-item {{$key? "":"active"}}">
                                                <img src="{{asset('/'.$img['caminho'])}}" alt="" class="img-fluid">
                                            </div>
                                        @endforeach
                                    </div>
                                    <!-- Left and right controls -->
                                    <a class="carousel-control-prev" href="#slide" data-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </a>
                                    <a class="carousel-control-next" href="#slide" data-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </a>

                                </div>

                            @else
                                <p class="lead display-4">Esse carro não tem imagens</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-success" onclick="submitDetailsForm()">Efetuar Reserva</button>
                    <button class="btn btn-danger" onclick="cancelForm()"> Cancelar reserva</button>
                </div>
            </div>
        </div>
        <script language="javascript" type="text/javascript ">
            function submitDetailsForm(){
                $('#myform').submit();

            }
            function cancelForm(){
                window.location='/';
            }
        </script>
    {{--@else--}}
        {{--<script>window.location = "/";</script>--}}
    {{--@endif--}}

@stop
@section('scripts')
    <script src="js/app.js"></script>
    <script src="js/dashboard.js"></script>
@stop
<script>
    import ConfirmReserv from "../js/components/confirmReserv";
    export default {
        components: {ConfirmReserv}
    }
</script>