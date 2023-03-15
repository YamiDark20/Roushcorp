@extends('adminlte::page')

@section('title', 'Gestionar Almacen')

{{-- En la siguiente linea de codigo se modifica el contenido del header --}}
@section('content_header')
    {{-- @can('admin.customers.create')
        <a href="{{route('admin.customers.create')}}"
        class="btn btn-secondary btn-sm float-right">Agregar Cliente</a>
    @endcan --}}
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dash')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('compra.almacen')}}">Almacen</a></li>
            <li class="breadcrumb-item"><a href="">Visualizar Compra</a></li>
        </ol>
    </nav>
    <h1>Visualizar compra del almacen {{$codalm}}</h1>
@stop

@section('content')
    <div class= "col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @livewire('compra-almacen', [
                    'codalm' => $codalm,
                    'codcompra' => $codcompra
                ])
            </div>
        </div>
    </div>
@stop

{{-- En la siguiente linea de codigo se agrega o cargar un archivo css --}}
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
