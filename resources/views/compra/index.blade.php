@extends('adminlte::page')

@section('title', 'Listar Compras')

{{-- En la siguiente linea de codigo se modifica el contenido del header --}}
@section('content_header')
    {{-- @can('admin.customers.create')
        <a href="{{route('admin.customers.create')}}"
        class="btn btn-secondary btn-sm float-right">Agregar Cliente</a>
    @endcan --}}
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dash')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('compra.index')}}">Compras</a></li>
            {{-- <li class="breadcrumb-item"><a href="">Lista Compras</a></li> --}}
        </ol>
    </nav>
    {{-- <a href="{{route('customers.create')}}"
        class="btn btn-dark btn-sm float-right">Agregar Nota de credito</a>
        <a href="{{route('customers.create')}}"
        class="btn btn-dark btn-sm float-right mr-1">Agregar Devolución</a> --}}
    {{-- <a href="{{route('cobros.create')}}"
    class="btn btn-dark btn-sm float-right">Agregar Cobro</a> --}}
    <h1>Lista de compras del almacen</h1>
@stop

@section('content')
    <div class= "col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                @livewire('lista-compra-alm')
                {{-- @livewire('lista-compra-alm', ['codalm' => $codalm]) --}}
            </div>
        </div>
    </div>
@stop

{{-- En la siguiente linea de codigo se agrega o cargar un archivo css --}}
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
