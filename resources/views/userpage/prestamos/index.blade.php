@extends('userpage.layouts.template')


@section('content')

<div class="container">

    <div class="row">
        <div class="col my-3 tm-text-primary">
            <h3>Historial de libros solicitados</h3>
        </div>
    </div>

    <div class="row">

        @if ( count($prestamos) == 0)
            <div class="col-12">
                <p>Aún no tienes historial de préstamos de libros.</p>
            </div>
        @endif

        @foreach ($prestamos as $item)
            <div class="col-12 col-md-6 col-lg-4">    
                <div class="card mb-4 border rounded shadow">
                    <div class="card-body ">
                        <h5 class="card-title">{{$item->libro->titulo}}</h5>
                        <div class="row">
                            <div class="col-4">
                                <img src="{{ asset('/storage/uploads/portada/' . $item->libro->imagen) }}" class="img-fluid" alt="Image" />
                            </div>
                            <div class="col-8">
                                <p class="card-text">
                                    Género: <b>{{$item->libro->genero}}</b> <br />
                                    Autor: <b>{{$item->libro->autor}}</b> <br />
                                    Editorial: <b>{{$item->libro->editorial}}</b> <br />
                                    Fecha de préstamo: <b>{{$item->fecha_prestamo}}</b> <br />
                                    Fecha de devolución: <b>{{$item->fecha_devolucion}}</b> <br />
                                    Estado: <span class="badge bg-success">{{$item->estado}}</span> <br />
                                </p>
                            </div>
                        </div>
                    </div>

                    @if ($item->estado == "SOLICITADO")
                        <div class="card-footer d-flex justify-content-end">
                            <button type="button" class="btn btn-xs btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalCancelar-{{$item->id}}">
                                Cancelar solicitud
                            </button>
                        </div>                          
                    @endif
                    
                </div>
            </div>

            @include('userpage.prestamos.modal-cancelar')
            
        @endforeach


    </div>
</div>
    
@endsection
