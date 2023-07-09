@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
<br>
@stop

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Registrar Libros') }}</div>

                    <div class="card-body">
                        <form action="{{ url('/libros/' . $libros->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {{ method_field('PATCH') }}
                            @include('libros.form', ['modo' => 'Actualizar'])
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



            @stop

            @section('css')
                <link rel="stylesheet" href="/css/admin_custom.css">
            @stop

            @section('js')
                <script>
                    console.log('Hi!');
                </script>
            @stop
