@extends('main' )

@section('content')
    <div id="index">
        <div id="dashboard">
            @if(!session('user')['tipo'])
                <dashboardapp></dashboardapp>
            @else
                <empresadash></empresadash>
            @endif
        </div>
    </div>


@stop