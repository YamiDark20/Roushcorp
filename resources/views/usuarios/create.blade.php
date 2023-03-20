@extends('adminlte::page')

@section('title', 'Registar Usuarios')

@section('content_header')
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dash')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('usuarios.index')}}">Usuarios</a></li>
        </ol>
    </nav>
    <h1>Registrar Usuario</h1>
@stop

@section('content')
    <div class= "col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @livewire('usuarios-create')
            </div>
        </div>
    </div>
@stop
