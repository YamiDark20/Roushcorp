@extends('adminlte::page')

{{-- En la siguiente linea de codigo se modifica el titulo. La
variable title proviene del admintle.php de la carpeta config --}}
@section('title', 'Crear Cliente')

{{-- En la siguiente linea de codigo se modifica el contenido del header --}}
@section('content_header')
    <nav aria-label="breadcrumb" class="mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dash')}}">Inicio</a></li>
            <li class="breadcrumb-item"><a href="{{route('customers.index')}}">Clientes</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">Crear</a></li>
        </ol>
    </nav>
    <h1>Crear Cliente</h1>
@stop

{{-- En la siguiente linea de codigo se modifica el contenido --}}
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>No se han colocado nada en ninguno de los campos. Otra razon del error es que el rif o correo ya existen</strong>
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'customers.store',
            'class' => '']) !!}
                <div class="row">
                    <div class="form-group col-4">
                        {!! Form::label('name', 'Nombre:', ['class' => 'd-inline']) !!}
                        {!! Form::text('name', null, ['class' => 'form-control d-inline',
                        'placeholder' => 'Ingrese el nombre del cliente']) !!}
                    </div>
                    <div class="form-group col-4">
                        {!! Form::label('tiporif', 'Tipo RIF:', ['class' => 'd-inline']) !!}
                        <select name="tiporif" id="tiporif" class="form-control d-inline">
                            <option value="v">Ente Natural (v)</option>
                            <option value="j">Persona Jurídica (j)</option>
                            <option value="e">Extranjero (e)</option>
                            <option value="p">Agente registrado con Pasaporte (p)</option>
                            <option value="g">Ente Gubernamental (g)</option>
                        </select>
                    </div>
                    <div class="form-group col-4">
                        {!! Form::label('rif', 'RIF:', ['class' => 'd-inline']) !!}
                        {!! Form::text('rif', null, ['class' => 'form-control d-inline',
                        'placeholder' => 'Ingrese el RIF del cliente']) !!}
                    </div>
                    <div class="form-group col-4">
                        {!! Form::label('address', 'Dirección:', ['class' => 'd-inline']) !!}
                        {!! Form::text('address', null, ['class' => 'form-control d-inline',
                    'placeholder' => 'Ingrese la dirección del cliente']) !!}
                    </div>
                    <div class="form-group col-4">
                        {!! Form::label('telephone', 'Telefono:', ['class' => 'd-inline']) !!}
                        {!! Form::text('telephone', null, ['class' => 'form-control d-inline',
                    'placeholder' => 'Ingrese el telefono del cliente']) !!}
                    </div>
                    <div class="form-group col-4">
                        {!! Form::label('email', 'Correo:', ['class' => 'd-inline']) !!}
                        {!! Form::text('email', null, ['class' => 'form-control d-inline',
                    'placeholder' => 'Ingrese el correo del cliente']) !!}
                    </div>
                    <div class="form-group col-12">
                        {!! Form::label('city', 'Ciudad:', ['class' => 'd-inline']) !!}
                        <div>
                            {!! Form::text('city', null, ['class' => 'form-control d-inline col-4',
                        'placeholder' => 'Ingrese el ciudad del cliente']) !!}
                            {!! Form::submit('Crear cliente', [
                                'class' => 'btn btn-info d-inline float-right col-2']) !!}
                        </div>
                    </div>
                </div>
            {!! Form::close() !!}
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
