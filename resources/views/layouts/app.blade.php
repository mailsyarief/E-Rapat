<!DOCTYPE html>
<html>
<head lang="en">
    <meta http-equiv="Content-Type" content="text/html;charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>StartUI - Premium Bootstrap 4 Admin Dashboard Template</title>

    <link href="img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
    <link href="img/favicon.png" rel="icon" type="image/png">
    <link href="img/favicon.ico" rel="shortcut icon">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    @include('layouts.css')
</head>
<body class="with-side-menu control-panel control-panel-compact @if(!Auth::check()) sidebar-hidden @endif ">
    <header class="site-header">
        <div class="container-fluid">
            <a href="#" class="site-logo">
                <h3 class="mr-3">E Rapat</h3>
            </a>
    
            <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
                <span>toggle menu</span>
            </button>
    
            <button class="hamburger hamburger--htla">
                <span>toggle menu</span>
            </button>
            <div class="site-header-content">
                <div class="site-header-content-in">
                    <div class="site-header-shown">
                        <div class="dropdown">
                        @if(Auth::check())
                                <button class="btn btn-rounded btn-lg dropdown-toggle" id="dd-header-add" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>
                                <div class="dropdown-menu mt-3" aria-labelledby="dd-header-add" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 30px, 0px); top: 0px; left: 0px; will-change: transform;">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>                            
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    @if(Auth::check())
        <div class="mobile-menu-left-overlay"></div>
        <nav class="side-menu">
            <ul class="side-menu-list">
                <li class="blue">
                    <a href="{{ url('buat-rapat') }}">
                        <i class="fa fa-pencil"></i>
                        <span class="lbl">Buat Rapat</span>
                    </a>
                </li>
                <li class="gold">
                    <a href="{{ url('/') }}">
                        <i class="fa fa-book"></i>
                        <span class="lbl">Kelola Rapat</span>
                    </a>
                </li>
                <li class="green">
                    <a href="project.html">
                        <i class="fa fa-search"></i>
                        <span class="lbl">Cari Rapat</span>
                    </a>
                </li>
            </ul>
        </nav>    
    @endif

    <div class="page-content">
        <div class="container-fluid">
            @yield('content')
        </div><!--.container-fluid-->
    </div><!--.page-content-->

    @include('layouts.js')
</body>
</html>