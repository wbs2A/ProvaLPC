@extends('main' )

@section('content')
	@if(isset($carros))
		<div id="locacao">
			<locacao :cars='@json($carros)'  :usercpf='"{{$cpf}}"' :aces='@json($acessorios)' :predados='@json($preDados)' :categorias='@json($categorias)'></locacao>
		</div>
	@endif
	<script src="js/locacao.js"></script>
@stop