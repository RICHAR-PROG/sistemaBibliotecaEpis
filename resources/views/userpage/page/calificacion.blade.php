<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificacion</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/templatemo-style.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


</head>
<body>
    {!! $header !!}


    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="{{asset('storage/img/img.png') }}">
        {{--<form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="bi bi-search"></i>
            </button>
        </form>--}}

    </div>
    <div class="container-fluid py-5 px-5">
        <div class="row justify-content-center ">
            <div class="col-md-6">
                <div class="container card bg-light shadow">
                    <div class="card-body">
                        <form action="/encuesta" method="POST" class="max-w-lg mx-2 p-2 ">
                            @csrf
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control" name="nombre" id="nombre">
                            </div>
                            <div class="form-group">
                                <label for="edad">Edad:</label>
                                <input type="number" class="form-control" name="edad" id="edad" min="18" max="99">
                            </div>
                            <div class="form-group">
                                <label for="opinion">¿Qué opinas sobre nuestro producto?</label>
                                <textarea name="opinion" class="form-control" id="opinion" rows="5"></textarea>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-warning rounded" type="submit">Enviar</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>

    {!! $footer !!}

</body>
</html>
