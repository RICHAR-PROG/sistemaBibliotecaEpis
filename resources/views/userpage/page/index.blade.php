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
    <div class="container-fluid p-4 my-3 tm-container-content border tm-mt-60">
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
                    <img src="{{ asset("/storage/libros/".$book->imagen) }}" height="500" alt="Image" class="img-fluid">
                    <figcaption class="d-flex align-items-center justify-content-center">
                        <h2>Clocks</h2>
                        <a href="">View more</a>
                    </figcaption>
                </figure>
                <div class="d-flex justify-content-between tm-text-gray">
                    <span class="tm-text-gray-dark bold"> {{ $book->titulo }}</span>
                    <span>{{$book->stock}} ejemplares</span>
                </div>
            </div>
    @endforeach
    </div>
    {!! $footer !!}
    {{-- @extends('userpage.includes.footer') --}}
