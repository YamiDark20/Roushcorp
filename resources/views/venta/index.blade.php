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
                    <h2>Lista de ventas</h2>
                    <div class="btn-group">
                        <a href="ventas\create" class="btn btn-warning mb-3">Agregar</a>
                    </div>
                </div>

                @if ($ventas->count())
                    <div class="table-responsive">
                        <table class="table table-dark table-striped mt-4">
                            <tr>
                                <thead>
                                    <th scope='col' class="text-sm">ID</th>
                                    <th scope='col' class="text-sm">Valor Compra</th>
                                    <th scope='col' class="text-sm">Cancelado</th>
                                    <th scope='col' class="text-sm">Por Cancelar</th>
                                    <th scope='col' class="text-sm">Vuelto</th>
                                    <th scope='col' class="text-sm">Estado</th>
                                    <th scope='col' class="text-sm">Cliente</th>
                                    <th scope='col' class="text-sm">Almacen</th>
                                    <th scope='col' class="text-sm">Acciones</th>
                                </thead>
                            </tr>

                            <tbody>
                                @foreach ($ventas as $venta)
                                    <tr>
                                        <td class="text-sm">{{ $venta ->id}}</td>
                                        <td class="text-sm">{{ $venta ->valor_compra_formateado}}</td>
                                        <td class="text-sm">{{ $venta ->cancelado_formateado}}</td>
                                        <td class="text-sm">{{ $venta ->por_cancelar_formateado}}</td>
                                        <td class="text-sm">{{ $venta ->vuelto_formateado}}</td>
                                        <td class="text-sm">{{ $venta ->estado }}</td>
                                        <td>
                                            <a href="/customers/{{$venta ->cliente->id}}" class = 'btn btn-sm btn-info'>
                                                {{ $venta ->cliente->name }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/almacenes/{{$venta ->almacen->id}}" class = 'btn btn-sm btn-info'>
                                                {{ $venta ->almacen->nombre }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="/ventas/{{$venta->id}}" class = 'btn btn-sm btn-info'><i class="fa fa-eye"></i></a>
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
