@extends('main' )

@section('content')
    <div id="index">
        <div id="dashboard">
            @if(!Auth::user()->tipo)
                <dashboardapp></dashboardapp>
            @else
                <empresadash></empresadash>
            @endif
        </div>
    </div>
    
        <script src="js/dashboard.js"></script>
@stop