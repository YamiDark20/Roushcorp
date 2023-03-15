@extends('dash.index');

@section('title', 'Ventas')

@section('content_header')
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dash">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">Ventas</a></li>

    </ol>
</nav>
<h1>Ventas</h1>
@endsection

@section('content')

    <div class= "col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Lista de ventas</h3>
                    <div class="btn-group">
                        <a href="ventas\create" class="btn btn-warning mb-3 mr-5"> +Agregar</a>

                        <a class="btn" href="#"> <i class=" fas fa-download"></i>Exportar</a>

                    </div>
                </div>

                @if ($ventas->count())
                    <div class="table-responsive">
                        <table class="table table-dark table-striped mt-4">
                            <tr>
                                <thead>
                                    <th scope='col'>ID</th>
                                    <th scope='col'>CODIGO</th>
                                    <th scope='col'>NOMBRE</th>
                                    <th scope='col'>MARCA</th>
                                    <th scope='col'>PESO</th>
                                    <th scope='col'>DESCRIPCION</th>
                                    <th scope='col'>CANTIDAD</th>
                                    <th scope='col'>PRECIO</th>
                                    <th scope='col'>EXONERADO</th>
                                    <th scope='col'>ACCIONES</th>
                                </thead>
                            </tr>

                            <tbody>
                                @foreach ($ventas as $venta)
                                    <tr>
                                        <td>{{ $venta ->id}}</td>
                                        <td>{{ $venta ->codigo}}</td>
                                        <td>{{ $venta ->nombre}}</td>
                                        <td>{{ $venta ->marca}}</td>
                                        <td>{{ $venta ->peso}}</td>
                                        <td>{{ $venta ->descripcion}}</td>
                                        <td>{{ $venta ->cantidad}}</td>
                                        <td>{{ $venta ->precio}}</td>
                                        @if ($venta ->exonerado == 0)
                                        <td>No</td>
                                        @endif
                                        @if ($venta ->exonerado == 1)
                                        <td>Si</td>
                                        @endif

                                        <td>
                                            <a href="/ventas/{{$venta->id}}/edit" class = 'btn btn-info'><i class="fa fa-edit"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                @else
                    <div class="alert alert-info">
                        <strong>No hay registros</strong>
                    </div>
                @endif

            </div>


        </div>


    </div>

@endsection
