@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
<nav>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/dash">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">Reporte</a></li>

    </ol>
</nav>
<h1>Reporte</h1>
@endsection

@section('content')

<div class="row">
    <div class="col-sm-12 col-md-3">
        <div class="row">
            <div class="col-sm-12">
                <h6>Elige el tipo de reporte</h6>
                <div class="form-group">
                    <select name="" id="" class="form-control">
                        <option value="0">Ventas del dia</option>
                        <option value="1">Ventas por fecha</option>
                    </select>
                </div>
            </div>

            <div class="col-sm-12">
                {{-- de este input imagino saliendo un calendario --}}
                <h6>Fecha desde</h6>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Clic para seleccionar">
                </div>
            </div>

            <div class="col-sm-12">
                {{-- de este input imagino saliendo un calendario --}}
                <h6>Fecha hasta</h6>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Clic para seleccionar">
                </div>
            </div>

            <div class="col-sm-12">
                <button class="btn btn-info btn-block">
                    Consultar
                </button>
                {{-- En este momento no tengo idea que mas poner en estos botones >:-( --}}

                <a class="btn btn-danger btn-block" href="">Generar PDF</a>

                <a class="btn btn-success btn-block" href="">Exportar a Excel</a>
            </div>

        </div>
    </div>

    <div class="col-sm-12 col-md-9">
        {{-- Tabla --}}
        <div class="table-responsive">
            <table id="listaProductoVenta" class="table table-striped shadow">                      
                <thead>
                    <tr>
                        <th class="text-center">Nro Venta</th>
                        <th class="text-center">Cantidad</th>
                        <th class="text-center">Total</th>
                        <th class="text-center">Fecha</th>
                        <th class="text-center">Vendedor</th>                                             
                    </tr>
                </thead>

                <tbody>
                    
                </tbody>
                
                
            </table>
            
        </div>
    </div>
</div>

@stop