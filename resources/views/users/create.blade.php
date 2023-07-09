@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{-- <h1 class="text-center m-0">Añadir usuarios </h1> --}}
    <br>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto  py-2">

            {{-- Muestra un error del formulario --}}
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li> {{ $error }}</li>
                    @endforeach
                </ul>
                {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                </div>
            @endif


            <div class="card">
                <div class="card-header">{{ __('Nuevo usuario') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data" class="max-w-lg mx-2 p-2">
                        @csrf
                        
        
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
        
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{old('name')}}" required>
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Institucional') }}</label>
        
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{old('email')}}" required>
                            </div>
                        </div>
        
        
                        <div class="row mb-3">
                            <label for="dni" class="col-md-4 col-form-label text-md-end">{{ __('DNI') }}</label>
        
                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control" name="dni" placeholder="DNI" maxlength="8" minlength="8" value="{{old('dni')}}" required>
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Contraseña') }}</label>
        
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" value="" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password_confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirmar contraseña') }}</label>
        
                            <div class="col-md-6">
                                <input id="password_confirm" type="password" class="form-control" name="password_confirm" value="" required>
                            </div>
                        </div>
        
        
                        <div class="row mb-3">
                            <label for="type_user" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de usuario') }}</label>
        
                            <div class="col-md-6">
                                <select name="type_user" class="form-control" required>
                                    <option value="" selected disabled >--Seleccione--</option>
                                    <option value="admin" >Admin</option>
                                    <option value="user" >User</option>
                                </select>
                            </div>
                        </div>
        
                        <div class="row mb-0 ">
                            <div class="col-md-6  mx-auto">
                                <a href="{{route('users.index')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
        
        
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
