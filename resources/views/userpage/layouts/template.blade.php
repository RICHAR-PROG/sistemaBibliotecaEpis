<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/templatemo-style.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>
<body>
    <nav class="navbar navbar-expand-lg shadow">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('storage/img/logoE.png') }}" alt="Funcion 13 Logo" class="logo" height="60px">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link nav-link-1 active" aria-current="page" href="{{route('userpage.index')}}">Acervo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-2" href="{{route('prestamos.index')}}">Boletas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3" href="{{ url('userpage/calificacion') }}">Calificacion</a>
                </li>
                <li class="nav-item">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle nav-link-3" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }} <i class="bi bi-exclamation-octagon-fill"></i>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    
    @yield('content')


    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
    
    
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                    <p class="text-center">©Copyright {{date('Y')}} EQUIPO 4. Todos los derechos reservados.</p>
                </div>
                <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Designed by <a href="#" class="tm-text-gray" rel="sponsored" target="_parent">Equipo 5</a>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="{{ asset('js/plugins.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    </body>
    </html>
    