@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Biblioteca EPIS</h1>
@stop

@section('content')
    <p>Escuela Profesional de Ingenieria de Sistemas</p>
    <img src="{{asset('storage/img/biblioteca-01.jpg')}}" class="rounded img-fluid" alt="Biblioteca">
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@endsection
