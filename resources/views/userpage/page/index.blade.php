{{-- @include('header')

@include('footer'); --}}
{{-- @extends('userpage.includes.header') --}}

{!! $header !!}


<div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll"
    data-image-src="{{ asset('storage/img/img.png') }}">
    <form class="d-flex tm-search-form">
        <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success tm-search-btn" type="submit">
            <i class="bi bi-search"></i>
        </button>
    </form>

</div>
<div class="container-fluid p-4 my-3 tm-container-content  tm-mt-60">
    <div class="row mb-4">
        <h2 class="col-6 tm-text-primary">
            Lista de libros actualizados de la EPIS
        </h2>
        <div class="col-6 d-flex justify-content-end align-items-center">
            <form action="" class="tm-text-primary">
                Page <input type="text" value="1" size="1" class="tm-input-paging tm-text-primary"> de
                200
            </form>
        </div>
    </div>
    <div class="row tm-mb-90 tm-gallery">
        @foreach ($books as $book)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5">
                <figure class="effect-ming tm-video-item">
                    <img src="{{ asset("/storage/uploads/portada/". $book->imagen) }}" height="500" alt="Image"
                        class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>
                            @if ($book->formato == 'PDF')
                            <strong>titulo: </strong><br>{{ $book->titulo }} <br>
                            <strong>autor: </strong><br>{{ $book->autor }}<br><br>
                            {{-- <div class="btn btn-success">leer </div> --}}
                            
                            <a href="{{ route('catalog.pdf.show', $book['PDF']) }}" type="btn" class="btn btn-success">Ver PDF</a>

                            @elseif($book->formato == 'Fisico')
                            <strong>titulo: </strong><br>{{ $book->titulo }} <br>
                            <strong>autor: </strong><br>{{ $book->autor }}<br><br>
                            <div class="btn btn-success">prestamo</div>
                            @else
                                {{ $book->titulo }} - Formato desconocido
                            @endif
                        </h2>

                    </figcaption>

                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-dark bold"> {{ $book->titulo }}</span>
                    @if ($book->stock > 0 && $book->formato == 'Fisico')
                    <span>{{ $book->stock }} ejemplares</span>
                    @elseif($book->stock <= 0 && $book->formato == 'Fisico')
                    <p class="not"><i class="bi bi-exclamation-triangle-fill"> no disponible </i></p>
                    @else
                    <p><i class="bi bi-file-earmark-pdf"></i> view online </p>
                    @endif
                    
                </div>
            </div>
        @endforeach
    </div>

    {!! $footer !!}

    <script></script>
    {{-- @extends('userpage.includes.footer') --}}
