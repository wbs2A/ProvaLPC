<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Locadora de Carros</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
</head>
    <body>
    <div class="super_container">

        <header class="header trans_300">

            <div class="main_nav_container">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-right">
                            <div class="logo_container">
                                    <a href="{{ route('/') }}">Locadora<span>Dahora</span></a>
                            </div>
                            <nav class="navbar">
                                <ul class="navbar_menu">
                                    <li><a href="{{ route('/') }}">Início</a></li>
                                    <li><a href="{{ route('contact') }}">Contato</a></li>
                                </ul>
                                <ul class="navbar_user">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @if(Auth::check())
                                                <a id="navUserTopo" class="row text-center" style="padding-left: 100px" href="{{route('perfil')}}">{{Auth::user()->name }}</a>
                                                <hr class="half-rule"/>
                                                <a id="navUserBase" class="row text-center" style="padding-left: 100px" href="{{route('logout')}}"><i class="fas fa-walking"></i>Sair</a>

                                            @else
                                                <a id="navUserTopo" class="dropdown-item row" href=" {{ route('login') }}"><i class="fas fa-sign-in-alt mr-2" aria-hidden="true"></i>Acessar</a>
                                                <hr class="half-rule"/>
                                                <a id="navUserBase" class="dropdown-item row p-0 m-0 text-center" href="{{ route('register') }}"><i class="fa m-2 fa-user-plus" aria-hidden="true"></i>Registrar-se</a>
                                            @endif

                                        </div>
                                    </li>
                                </ul>
                                <div class="hamburger_container">
                                    <i class="fa fa-bars" aria-hidden="true"></i>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

        </header>

        <div class="fs_menu_overlay"></div>
        <div class="hamburger_menu">
            <div class="hamburger_close"><i class="fa fa-times" aria-hidden="true"></i></div>
            <div class="hamburger_menu_content text-right">
                <ul class="menu_top_nav">
                    <li class="menu_item has-children">
                       <a><i class="fa fa-user" aria-hidden="true"></i><i class="fa fa-angle-down"></i></a>
                        <ul class="menu_selection">
                            <li>
                                @if(Auth::check())
                                                <a id="navUserTopo" class="dropdown-item row p-0 m-0 text-center" style="padding-left: 100px" href="{{route('perfil')}}">{{Auth::user()->name }}</a>
                                                <hr class="half-rule"/>
                                                <a id="navUserBase" class="text-center" style="padding-left: 100px" href="{{route('logout')}}"><i class="fas fa-walking"></i>Sair</a>

                                            @else
                                                <a id="navUserTopo" class="dropdown-item row p-0 m-0 text-center" href="{{ route('login') }}"><i class="fas fa-sign-in-alt ml-1 mr-2" aria-hidden="true"></i>Acessar</a>
                                                <a id="navUserBase" class="text-center" href="{{ route('register') }}"><i class="fa m-2 fa-user-plus" aria-hidden="true"></i>Registrar-se</a>
                                            @endif

                            </li>
                        </ul>
                    </li>
                    <li class="menu_item"><a href="{{ route('/') }}">Início</a></li>
                    <li class="menu_item"><a href="{{ route('contact') }}">Contato</a></li>
                </ul>
            </div>
        </div>
        </div>
        <div class="container-fluid" style="padding-top: 110px">
            @yield('content')
        </div>
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/jquery.mask.js"></script>
        @yield('scripts')
        <script src="js/single_custom.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </body>
</html>
