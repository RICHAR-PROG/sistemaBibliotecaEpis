@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')
    <div class="row ">
        <div class="col-md-10 mx-auto py-2">
            <div class="card card card-danger card-outline">

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
        const formatoSelect = document.getElementById('formato');
        const pdfInput = document.getElementById('PDF');

        formatoSelect.addEventListener('change', () => {
            if (formatoSelect.value === 'Fisico') {
                pdfInput.disabled = true;
            } else {
                pdfInput.disabled = false;
            }
        });
        const stockInput = document.getElementById('stock');

        formatoSelect.addEventListener('change', () => {
            if (formatoSelect.value === 'PDF') {
                stockInput.disabled = true;
            } else {
                stockInput.disabled = false;
            }
        });
    </script>
@stop
