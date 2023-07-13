@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
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
                    
                </div>
            @endif


            <div class="card card-danger card-outline"">
                <div class="card-header">{{ __('Actualizar usuario') }}</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('users.update', $usuario->id) }}" enctype="multipart/form-data"  class="max-w-lg mx-2 p-2">
                        @csrf
                        @method('PUT')
                        
        
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>        
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="@if(!old('name')){{$usuario->name}}@else{{old('name')}}@endif" required>
                            </div>
                        </div>
        
                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo Institucional') }}</label>        
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="@if(!old('email')){{$usuario->email}}@else{{old('email')}}@endif" required>
                            </div>
                        </div>
        
        
                        <div class="row mb-3">
                            <label for="dni" class="col-md-4 col-form-label text-md-end">{{ __('DNI') }}</label>        
                            <div class="col-md-6">
                                <input id="dni" type="text" class="form-control" name="dni" placeholder="DNI" maxlength="8" minlength="8" value="@if(!old('dni')){{$usuario->dni}}@else{{old('dni')}}@endif" required>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type_user" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de usuario') }}</label>        
                            <div class="col-md-6">
                                <select name="type_user" class="form-control" required>
                                    <option value="" disabled >--Seleccione--</option>
                                    <option value="admin" @if($usuario->type_user == 'admin'){{'selected'}}@endif>Admin</option>
                                    <option value="user" @if($usuario->type_user == 'user'){{'selected'}}@endif>User</option>
                                </select>
                            </div>
                        </div>
        
                        <div class="row mb-0 ">
                            <div class="col-md-6  mx-auto">
                                <a href="{{route('users.index')}}" class="btn btn-secondary">Cancelar</a>
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
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