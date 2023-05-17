<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss','resources/css/ordenadores.css', 'resources/js/app.js','resources/js/buscador.js'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    


<!-- Incluye Bootstrap Datepicker CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

<!-- Incluye Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Incluye Bootstrap Datepicker JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
            
                    
                    <a class="navbar-brand" href="{{ url('/home') }}">
                        <img class="logo " src="{{ URL ('images/master.png')}}" alt="">
                    </a>
                
                <a class="navbar-brand" href="{{ url('/home') }}">
                    Centros de estudios master
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                           
                        <li class="nav-item ms-auto">
                                    <a class="nav-link" href="{{ route('centros.index') }}"><button class="button">Centros</button></a>
                                </li>
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" href="{{ route('aulas.index') }}"><button class="button">Aulas</button></a>
                                </li>
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" href="{{ route('ordenadores.index') }}"><button class="button">Ordenadores</button></a>
                                </li>
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" href="{{ route('programas.index') }}"><button class="button">Programas</button></a>
                                </li>
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" href="{{ route('licencias.index') }}"><button class="button">Licencias</button></a>
                                </li>
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" href="{{ route('componentes.index') }}"><button class="button">Componentes</button></a>
                                </li>
                                <li class="nav-item ms-auto">
                                    <a class="nav-link" href="{{ route('usuarios.index') }}"><button class="button">Usuarios</button></a>
                                </li> 

                                
                            <li class="nav-item dropdown ms-auto">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <button class="button">{{ Auth::user()->name }}</button>
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
