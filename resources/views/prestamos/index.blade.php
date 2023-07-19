@extends('adminlte::page')

@section('title', 'Dashboard')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
@endsection


@section('content')
{{-- <div class="row">
    <div class="col-md-4 ">
        <a href="{{ url('boletas/pdf') }}" class="btn btn-block btn-outline-primary btn-sm" target="_blank">PDF</a>
    </div>
</div> --}}

<div class="container-fluid py-5">
    <div class="card card-danger card-outline">
        <div class="card-header">
            <h3 class="card-title">Gestión de Préstamos</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">

                <div class="col-md-12 justify-content-center table-responsive">
                    <table
                        class="table table-sm table-striped table-hover align-middle" id="libros">
                        <thead class="bg-gradient-danger text-center">
                            <tr>
                                <td>ID</td>
                                <td>Estudiante</td>
                                <td>Libro</td>
                                <td>Género</td>
                                <td>Fecha de préstamo</td>
                                <td>Fecha de devolución</td>
                                <td>Estado</td>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($prestamos as $prest)
                            <tr>
                                
                                <td>{{ $prest->id }}</td>
                                <td>{{ $prest->user->name }}</td>
                                <td>{{ $prest->libro->titulo }}</td>
                                <td>{{ $prest->libro->genero }}</td>
                                <td>
                                    @if ( isset($prest->fecha_prestamo) )
                                        {{$prest->fecha_prestamo}}
                                    @else
                                        <small><i>Pendiente</i></small>
                                    @endif
                                </td>
                                <td>
                                    @if ( isset($prest->fecha_devolucion ) )
                                        {{$prest->fecha_devolucion }}
                                    @else
                                        <small><i>Pendiente</i></small>
                                    @endif
                                </td>
                                <td><span class="badge rounded-pill bg-dark">{{ $prest->estado }}</span></td>
                                <td>
                                    @if ($prest->estado == "SOLICITADO")
                                    <button type="button" class="btn btn-sm btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalAceptar-{{$prest->id}}">
                                        Aceptar
                                    </button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#modalRechazar-{{$prest->id}}">
                                        Rechazar
                                    </button> 
                                    @elseif ($prest->estado == "ACEPTADO")                                     
                                    <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modalDevolver-{{$prest->id}}">
                                        Devolución
                                    </button> 
                                    @endif
                                </td>

                                @include('prestamos.modal-aceptar')
                                @include('prestamos.modal-rechazar')
                                @include('prestamos.modal-devolver')
                                
                            </tr>

           
                            

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>

@endsection

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@endsection

@section('js')
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
@endsection