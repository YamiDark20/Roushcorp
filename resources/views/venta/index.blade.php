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

                @if ($facturas->count())
                    <div class="table-responsive">
                        <table class="table table-dark table-striped mt-4">
                            <tr>
                                <thead>
                                    <th scope='col'>ID</th>
                                    <th scope='col'>Valor Compra</th>
                                    <th scope='col'>Cancelado</th>
                                    <th scope='col'>Por Cancelar</th>
                                    <th scope='col'>Vuelto</th>
                                    <th scope='col'>Tipo Pago</th>
                                    <th scope='col'>Tipo Documento</th>
                                    <th scope='col'>Cliente</th>
                                    <th scope='col'>Almacen</th>
                                    <th scope='col'>ACCIONES</th>
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
                                        <td>{{ $venta ->tipo_pago}}</td>
                                        <td>{{ $venta ->tipo_documento}}</td>
                                        <td>Cliente</td>
                                        <td>Almacen</td>
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
