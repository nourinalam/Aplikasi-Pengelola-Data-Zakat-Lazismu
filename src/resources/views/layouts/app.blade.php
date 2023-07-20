<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>@yield('title') - {{ config('app.name', 'Laravel') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @include('layouts.styles')
    <script>
        $(document).ready(function(){
            $( ".only-num" ).keypress(function(evt) {
                var charCode = (evt.which) ? evt.which : event.keyCode
                if (charCode > 31 && (charCode < 48 || charCode > 57))
                    return false;
                return true;
            })
        });
    </script>
</head>

<body class="theme-indigo">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Tunggu Sebentar...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="{{url('/')}}">{{ config('app.name', 'Laravel') }}</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Tasks -->
                    <li class="dropdown pull-right">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">power_settings_new</i>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="body">
                            @guest
                                <a href="{{route('login')}}">
                                    <i class="material-icons">exit_to_app</i> Masuk
                                </a>
                                <a href="{{route('register')}}">
                                    <i class="material-icons">supervisor_account</i> Daftar
                                </a>
                            @else
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="material-icons">power_settings_new</i> Keluar
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endguest
                            </li>
                        </ul>
                    </li>
                    <!-- #END# Tasks -->
                    {{--  <li class="pull-right"><a href="{{route('login')}}" class="js-right-sidebar" data-close="true"><i class="material-icons" title="Log In">power_settings_new</i></a></li>  --}}
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    @include('layouts.left-sidebar')

    <section class="content">
        <div class="container-fluid">
            @include('layouts.alerts')
            @yield('content')
        </div>
    </section>
    @include('layouts.scripts')
</body>

</html>