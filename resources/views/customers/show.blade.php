@extends('adminlte::page')

@section('title', 'Visualizar Cliente')

@section('content_header')
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dash')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('customers.index')}}">Clientes</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">Editar</a></li>
        </ol>
    </nav>
    <h1>Visualizar Cliente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="form-group col-4">
                    <label for="" class="form-label">Nombre</label>
                    <input id="name" name="name" type="text" class="form-control" disabled value="{{$customer->name}}">
                </div>
                <div class="form-group col-4">
                    <label for="" class="form-label">RIF</label>
                    <input id="rif" name="rif" type="text" class="form-control" disabled value="{{$customer->rif}}">
                </div>
                <div class="form-group col-4">
                    <label for="" class="form-label">Direccion</label>
                    <input id="address" name="address" type="text" class="form-control" disabled value="{{$customer->address}}">
                </div>
                <div class="form-group col-4">
                    <label for="" class="form-label">Telefono</label>
                    <input id="telephone" name="telephone" type="text" class="form-control" disabled value="{{$customer->telephone}}">
                </div>
                <div class="form-group col-4">
                    <label for="" class="form-label">Email</label>
                    <input id="email" name="email" type="text" class="form-control" disabled value="{{$customer->email}}">
                </div>
                <div class="form-group col-4">
                    <label for="" class="form-label">City</label>
                    <input id="city" name="city" type="text" class="form-control" disabled value="{{$customer->city}}">
                </div>
            </div>
        </div>
    </div>
@stop

{{-- En la siguiente linea de codigo se agrega o cargar un archivo css --}}
@section('css')
    <style>
        .abs-center {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 50vh;
            min-width: 25vh;
        }
    </style>
@stop
