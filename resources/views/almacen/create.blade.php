@extends('adminlte::page')

@section('title', 'Crear Almacen')

{{-- En la siguiente linea de codigo se modifica el contenido del header --}}
@section('content_header')
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dash')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('almacen.index')}}">Almacen</a></li>
            <li class="breadcrumb-item"><a href="">Crear Almacen</a></li>
        </ol>
    </nav>
    <h1>Crear Almacen</h1>
@stop

@section('content')
    <div class= "col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @livewire('almacen-create')
            </div>
        </div>
    </div>
@stop

{{-- En la siguiente linea de codigo se agrega o cargar un archivo css --}}
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
