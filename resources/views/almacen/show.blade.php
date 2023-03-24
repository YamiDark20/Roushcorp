@extends('adminlte::page')

@section('title', 'Visualizar Almacen')

{{-- En la siguiente linea de codigo se modifica el contenido del header --}}
@section('content_header')
    {{-- @can('admin.customers.create')
        <a href="{{route('admin.customers.create')}}"
        class="btn btn-secondary btn-sm float-right">Agregar Cliente</a>
    @endcan --}}
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dash')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('almacen.index')}}">Almacen</a></li>
        </ol>
    </nav>
    {{-- <a href="{{route('customers.create')}}"
        class="btn btn-dark btn-sm float-right">Agregar Nota de credito</a>
        <a href="{{route('customers.create')}}"
        class="btn btn-dark btn-sm float-right mr-1">Agregar Devolución</a> --}}
    {{-- <a href="{{route('cobros.create')}}"
    class="btn btn-dark btn-sm float-right">Agregar Cobro</a> --}}
    <h1>Visualizar contenido de un Almacen</h1>
@stop

@section('content')
    <div class= "col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-3">Contenido del Almacen {{$almacen->nombre}}</h4>
                @if($productos_almacen->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-dark table-striped">
                            <thead>
                                <tr>
                                    <th scope='col'>CodProd</th>
                                    <th scope='col'>Nombre</th>
                                    <th scope='col'>Stock</th>
                                    <th scope='col'>Estado</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($productos_almacen as $producto_almacen)
                                        <tr>
                                            <td><a href="{{ "/productos/".$producto_almacen->producto->codigo }}" class="btn btn-info">{{$producto_almacen->producto->codigo}}</a></td>
                                            <td>{{$producto_almacen->producto->nombre}}</td>
                                            <td>{{$producto_almacen->stock}}</td>
                                            <td>{{$producto_almacen->estado}}</td>
                                        </tr>
                                    @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="alert alert-danger">No hay productos registrados en este almacen</div>
                @endif
            </div>
        </div>
    </div>
@stop

{{-- En la siguiente linea de codigo se agrega o cargar un archivo css --}}
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
