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
                        <a href="ventas\create" class="btn btn-warning mb-3">Agregar</a>
                    </div>
                </div>

                @if ($ventas->count())
                    <div class="table-responsive">
                        <table class="table table-dark table-striped mt-4">
                            <tr>
                                <thead>
                                    <th scope='col'>ID</th>
                                    <th scope='col'>Valor Compra</th>
                                    <th scope='col'>Cancelado</th>
                                    <th scope='col'>Por Cancelar</th>
                                    <th scope='col'>Vuelto</th>
                                    <th scope='col'>Estado</th>
                                    <th scope='col'>Cliente</th>
                                    <th scope='col'>Almacen</th>
                                    <th scope='col'>Acciones</th>
                                </thead>
                            </tr>

                            <tbody>
                                @foreach ($ventas as $venta)
                                    <tr>
                                        <td>{{ $venta ->id}}</td>
                                        <td>{{ $venta ->valor_compra}}</td>
                                        <td>{{ $venta ->cancelado}}</td>
                                        <td>{{ $venta ->por_cancelar}}</td>
                                        <td>{{ $venta ->vuelto}}</td>
                                        <td>{{ $venta ->estado }}</td>
                                        <td>
                                            <a href="/customers/{{$venta ->cliente->id}}" class = 'btn btn-info'>
                                                {{ $venta ->cliente->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/almacenes/{{$venta ->almacen->id}}" class = 'btn btn-info'>
                                                {{ $venta ->almacen->nombre }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/ventas/{{$venta->id}}" class = 'btn btn-info'><i class="fa fa-eye"></i></a>
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
