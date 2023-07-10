@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="text-center m-0">Añadir Libros </h1>
@stop

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto border py-2">

        <div class="card">
            <div class="card-body">                
                <form method="POST" action="{{ url('/libros') }}" enctype="multipart/form-data" class="max-w-lg mx-2 p-2">
                    @csrf
                   @include('libros.form', ['modo'=>'Registrar'])
                </form>
            </div>
        </div>

    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
