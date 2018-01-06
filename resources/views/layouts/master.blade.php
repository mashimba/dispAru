<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'dispensary') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    
</head>
<body class="main-color-bg">
    <header id="header">
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <h1>Patients Management System</h1>
                </div>
                <div class="col-md-2 pull-right">
                    @yield('logout')
                </div>
            </div>
        </div>
    </header><!-- /header -->

    <div id="app">
        @if(!Auth::guest())
            <section id="main">
                <div class="container main">
                    <div class="row">
                        <div class="col-md-3">
                            @include('includes.menu')
                        </div>
                        <div class="col-md-9">
                            @yield('maincontent')
                            
                        </div>
                    </div>

                </div>
            </section>
            @elseif(Auth::guest())
                
                @yield('content')
        @endif
    </div>

    <!-- Scripts -->
     <script src="{{ asset('js/script.js') }}"></script>
    
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    
</body>
</html>
