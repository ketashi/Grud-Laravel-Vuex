<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Clinica</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <div>
            <b-navbar toggleable="lg" type="dark" variant="dark">
                <b-navbar-brand href="{{ url('/') }}">Clinica</b-navbar-brand>
    
                <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
    
                <b-collapse id="nav-collapse" is-nav>
                    <b-navbar-nav class="ml-auto">
                        @if (Route::has('login'))
                            <div class="top-right links">
                                @auth
                                    <a class='btn btn-sm btn-danger' href="{{ url('/home') }}">Home</a>
                                @else
                                    <a class='btn btn-sm btn-danger mx-2' href="{{ route('login') }}">Login</a>
            
                                    @if (Route::has('register'))
                                        <a class='btn btn-sm btn-danger' href="{{ route('register') }}">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif
                    </b-navbar-nav>
                </b-collapse>
            </b-navbar>
        </div>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
