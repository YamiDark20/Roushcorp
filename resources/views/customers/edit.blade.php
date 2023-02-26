@extends('adminlte::page')

{{-- En la siguiente linea de codigo se modifica el titulo. La
variable title proviene del admintle.php de la carpeta config --}}
@section('title', 'Editar Cliente')

{{-- En la siguiente linea de codigo se modifica el contenido del header --}}
@section('content_header')
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dash')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('customers.index')}}">Clientes</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">Editar</a></li>
        </ol>
    </nav>
    <h1>Editar Cliente</h1>
@stop

{{-- En la siguiente linea de codigo se modifica el contenido --}}
@section('content')
    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>No se han colocado nada en ninguno de los campos. Otra razon del error es que el rif o correo ya existen</strong>
        </div>
    @endif
    <div class="abs-center">
        {!! Form::model($customer, ['route' => ['customers.update',
        $customer], 'method' => 'put', 'class' => 'border pr-0 pl-5 pt-5 pb-5 bg-white']) !!}
            <div class="row g-4 mb-3">
                <div class="col-sm-1 mr-sm-4 mb-2 d-inline">
                    {!! Form::label('name', 'Nombre:', ['class' => 'd-inline']) !!}
                </div>
                <div class="col-sm-4 mb-3 pr-4 d-inline">
                    {!! Form::text('name', null, ['class' => 'form-control d-inline',
                    'placeholder' => 'Ingrese el nombre del cliente']) !!}
                </div>

                <div class="col-sm-1 mr-sm-4 mb-2 d-inline">
                    {!! Form::label('lastname', 'Apellido:', ['class' => 'd-inline']) !!}
                </div>
                <div class="col-sm-4 pr-4 d-inline">
                    {!! Form::text('lastname', null, ['class' => 'form-control d-inline',
                    'placeholder' => 'Ingrese el apellido del cliente']) !!}
                </div>

            </div>

            <div class="row g-4 mb-3 ml-0">
                <div class="col-sm-0 mr-sm-0 mb-2 d-inline">
                    {!! Form::label('rif', 'RIF:', ['class' => 'd-inline']) !!}
                </div>
                <div class="col-sm-4 mb-3 pr-4 d-inline">
                    {!! Form::text('rif', null, ['class' => 'form-control d-inline',
                    'placeholder' => 'Ingrese el RIF del cliente', 'readonly']) !!}
                </div>

                <div class="col-sm-0 mr-sm-2 mb-2 d-inline">
                    {!! Form::label('address', 'Dirección:', ['class' => 'd-inline']) !!}
                </div>
                <div class="col-sm-4 pr-4 d-inline">
                    {!! Form::text('address', null, ['class' => 'form-control d-inline',
                    'placeholder' => 'Ingrese la dirección del cliente']) !!}
                </div>

            </div>

            <div class="row g-4 mb-3 ml-0">
                <div class="col-sm-0 mr-0 mb-2 d-inline">
                    {!! Form::label('telephone', 'Telefono:', ['class' => 'd-inline']) !!}
                </div>
                <div class="col-sm-4 mb-2 pr-4 d-inline">
                    {!! Form::text('telephone', null, ['class' => 'form-control d-inline',
                    'placeholder' => 'Ingrese el telefono del cliente']) !!}
                </div>

                <div class="col-sm-0 mr-1 mb-2 d-inline">
                    {!! Form::label('email', 'Correo:', ['class' => 'd-inline']) !!}
                </div>
                <div class="col-sm-4 pr-4 d-inline">
                    {!! Form::text('email', null, ['class' => 'form-control d-inline',
                    'placeholder' => 'Ingrese el correo del cliente', 'readonly']) !!}
                </div>

            </div>

            <div class="row mb-3 ml-0">
                <div class="col-sm-0 mr-0 mb-2 d-inline">
                    {!! Form::label('city', 'Ciudad:', ['class' => 'd-inline']) !!}
                </div>
                <div class="col-sm-9 pr-4 d-inline">
                    {!! Form::text('city', null, ['class' => 'form-control d-inline',
                    'placeholder' => 'Ingrese el ciudad del cliente']) !!}
                </div>

            </div>

            <div class="col-3 mx-auto">
                {!! Form::submit('Editar cliente', [
            'class' => 'btn btn-info']) !!}
            </div>
        {!! Form::close() !!}
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
