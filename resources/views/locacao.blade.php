@extends('main' )

@section('content')
	@if(isset($carros))
		<div id="locacao">
			<locacao :cars='@json($carros)' :aces='@json($acessorios)' :predados='@json($preDados)' :categorias='@json($categorias)'></locacao>
		</div>
	@else
		<script type="text/javascript">window.location = '/';</script>
	@endif
	<script src="js/locacao.js"></script>
@stop