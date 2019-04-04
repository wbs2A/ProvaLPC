@extends('main' )

@section('content')
    <div id="index">

        <div id="dashboard">
            @if(!Auth::user()['tipo'])
                <dashboardapp></dashboardapp>
            @else
                <empresadash></empresadash>
            @endif
        </div>
    </div>
@stop
    @section('scripts')
        <script src="js/app.js"></script>
        <script src="js/dashboard.js"></script>
    @stop
