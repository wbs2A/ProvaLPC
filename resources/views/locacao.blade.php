@extends('main' )

@section('content')
<div id="locacao">
	<locacao :cars='@json($carros)' :aces='@json($acessorios)' :predados='@json($preDados)' :categorias='@json($categorias)'></locacao>
</div>
<script src="js/locacao.js"></script>
@stop