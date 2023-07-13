@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
   
@stop

@section('content')
<div class="row">
    <div class="col-md-10 mx-auto  py-2">

        <div class="card card card-danger card-outline">
            <div class="card-header">
                <h3 class="card-title">Añadir libros</h3>
            </div>
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
