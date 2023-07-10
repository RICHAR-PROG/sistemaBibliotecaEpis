<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/templatemo-style.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>
<body>
    <!-- Page Loader -->
    {{-- <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div> --}}
    <nav class="navbar navbar-expand-lg">
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
                    <a class="nav-link nav-link-1 active" aria-current="page" href="index.html">Acervo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-2" href="videos.html">Boletas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-3" href="{{ url('userpage/calificacion') }}">Calificacion</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link nav-link-4" href="contact.html">siuu</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
