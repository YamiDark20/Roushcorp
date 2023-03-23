@extends('adminlte::page')

@section('title', 'Almacenes')

{{-- En la siguiente linea de codigo se modifica el contenido del header --}}
@section('content_header')
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dash')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('almacen.index')}}">Almacen</a></li>
        </ol>
    </nav>
    <h1>Almacenes</h1>
@stop

@section('content')
    <div class= "col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @livewire('almacen-index')
            </div>
        </div>
    </div>
@stop

{{-- En la siguiente linea de codigo se agrega o cargar un archivo css --}}
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
