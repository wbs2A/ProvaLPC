<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Locadora de Carros</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
</head>
    <body>
    <div class="super_container">

        <!-- Header -->

        <header class="header trans_300">

            <!-- Main Navigation -->

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
                                        <a class="nav-link  " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @if(\Illuminate\Support\Facades\Auth::check())
                                                    <span>{{\Illuminate\Support\Facades\Auth::user()->name }}</span>
                                            @else
                                                <a id="navUserTopo" class="dropdown-item row p-0 m-0 text-center" href=" {{ route('login') }}"><i class="fas fa-sign-in-alt" aria-hidden="true"></i>Acessar</a>
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
                        <a href="#"><i class="fa fa-user" aria-hidden="true"></i><i class="fa fa-angle-down"></i></a>
                        <ul class="menu_selection">
                            <li>
                                <a id="navUserTopo" class="dropdown-item row p-0 m-0 text-center" href="{{ route('login') }}"><i class="fa m-2 fa-sign-in" aria-hidden="true"></i>Acessar</a>
                                <a id="navUserBase" class="text-center" href="{{ route('register') }}"><i class="fa m-2 fa-user-plus" aria-hidden="true"></i>Registrar-se</a>
                            </li>
                        </ul>
                    </li>
                    <li class="menu_item"><a href="{{ route('/') }}">Início</a></li>
                    <li class="menu_item"><a href="{{ route('contact') }}">Contato</a></li>
                </ul>
            </div>
        </div>
        </div>
        <div id="app" class="container-fluid" style="padding-top: 100px">
            @yield('content')
        </div>
        <script src="js/jquery-2.2.4.min.js"></script>
        <script src="js/app.js"></script>
        <script src="js/single_custom.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </body>
</html>
