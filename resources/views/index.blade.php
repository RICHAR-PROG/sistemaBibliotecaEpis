<!doctype html>
<html lang="en">

<head>
    <title>Biblioteca EPIS</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">

</head>

<body>
    <!-- VENTANA DE INICIO GENERAL -->
    <header class="cabecera">
        <div class="cabecera__fondo--nitido"></div>
        <div class="cabecera__capa"></div>
        <div class="cabecera__contenido">

            <img src="{{ asset('storage/img/logoE.png') }}" alt="Funcion 13 Logo" class="logo">

            {{-- <img height="80px" src="{{ asset('storage/img/logoE.png') }}" alt=""> --}}

            <h1>SISTEMA DE BIBLIOTECA</h1>
            <p>Escuela Profesional de Ingenieria de Sistemas</p>
        </div>
        <!--AQUI TENDREMOS DIFERENTES LISTAS DE MENU DE VENTANA DE INICIO-->
        <nav class="nav">
            <div class="nav__columna nav__pull"></div>
            <ul class="nav__columna nav__enlaces">
                <li><a href="#">Inicio</a></li>
                <li><a href="https://goo.gl/maps/YGddP8BJ74DW9uu5A" target="_blank">Ubicación</a></li>
                <li><a href="https://sistemas.unh.edu.pe/" target="_blank">Contactenos</a></li>
                <li class="dropdown" style="color: white">
                    <span>Ingresar
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
                        </svg>
                    </span>
                    <ul style="margin:15px; padding:5px; width:150px; border-radius: 5px;">
                        {{-- <li class="">
                            <a href="{{ route('login') }}" class="p-4"> Login</a>
                        </li> --}}
                        <a type="button" class="btn " data-bs-toggle="modal" data-bs-target="#admin"
                            style="color: white">
                            Administrador
                        </a>
                        <a type="button" class="btn " data-bs-toggle="modal" data-bs-target="#student"
                            style="color: white">
                            Estudiante
                        </a>
                    </ul>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="modal fade " id="admin" tabindex="3" data-bs-backdrop="static" data-bs-keyboard="false"
            role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
                <div class="modal-content bg-white">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="modalTitleId">ADMINISTRADOR</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <img src="{{ asset('storage/img/sistemas.png') }}" alt="Logo Sistemas" class="logos">
                    <div class="modal-body">
                        <div class="container py-4">
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row mb-3">


                                        <div class="col-md-12">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus
                                                placeholder="Correo Electrónico"
                                                title="Ingrese con su correo institucional de la UNH"
                                                pattern=".+@unh.edu.pe">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Contraseña">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 ">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label text-dark" for="remember">
                                                    {{ __('Recuerdame') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4 ">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Iniciar Sesión') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade shadow-lg" id="student" tabindex="3" data-bs-backdrop="static"
            data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered " role="document">
                <div class="modal-content shadow-lg bg-white">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="modalTitleId">ESTUDIANTE</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <img src="{{ asset('storage/img/sistemas.png') }}" alt="Logo Sistemas" class="logos">
                    <div class="modal-body">
                        <div class="container py-4">
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="row mb-3">
                                        <div class="col-md-12">
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required
                                                autocomplete="email" autofocus placeholder="Correo Electrónico"
                                                pattern=".+@unh.edu.pe"
                                                title="Ingrese con su correo institucional de la UNH">

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-12 ">
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Contraseña">

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-md-6 ">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                <label class="form-check-label text-dark" for="remember">
                                                    {{ __('Recuerdame') }}
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-0">
                                        <div class="col-md-8 offset-md-4 ">
                                            <button type="submit" class="btn btn-primary">
                                                {{ __('Iniciar Sesión') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </main>
    <section class="section1-center">
        <br><br><br><br>
        <div class="cont-video-bg" style="position:relative; width: 100%; top: 0; left: 0">
            <video autoplay muted loop id="myVideo" style="min-width: 100%">
                <source src="{{ asset('storage/img/libros_comprimido(1080)(2).mp4') }}" type="video/mp4">
            </video>
        </div>
    </section>
    <footer class="pie_pagina">
        <p class="text-center">©Copyright 2050 EQUIPO 4. Todos los derechos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>
</body>

</html>
