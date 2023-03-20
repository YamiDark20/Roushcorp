@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
<nav>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/dash">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">Venta</a></li>

    </ol>
</nav>
<h1>Venta {{ $venta->id }}</h1>
@endsection

@section('content')

<div class="container-fluid">

     <div class="row">

        <div class="col-md-9">

            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="form-label mt-3" for="id_producto">
                            <i class="fas fa barcode"></i>
                            <span class="bold">Cliente</span>
                        </label>

                        <input type="text" disabled value="{{ $venta->cliente->name }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label mt-3" for="id_producto">
                            <i class="fas fa barcode"></i>
                            <span class="bold">Almacen</span>
                        </label>

                        <input type="text" disabled value="{{ $venta->almacen->nombre }}">
                    </div>
                </div>

                <div class="table table-responsive">
                    <table id="listaProductoVenta" class="table table-striped shadow">
                        <thead>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio</th>
                            <th>IVA</th>
                            <th>Total</th>
                        </thead>

                        <tbody>
                            @foreach ($venta->facturas as $factura)
                                <tr>
                                    <td><a href="{{ "/productos/".$factura->producto->id }}" class="btn btn-info">{{$factura->producto->codigo}}</a></td>
                                    <td>{{$factura->producto->nombre}}</td>
                                    <td>{{$factura->cantidad_producto}}</td>
                                    <td>{{$factura->precio_producto}}</td>
                                    <td>{{$factura->iva_producto}}</td>
                                    <td>{{$factura->total_producto}}</td>
                                </tr>
                            @endforeach
                        </tbody>


                    </table>
                </div>

            </div>

        </div>

        {{-- Comprobante de pago --}}
        <div class="col-md-3">
            <div class="card shadow">
                <h5 class="card-header bg-info text-white text-center">
                    Datos Venta
                </h5>

                <div class="card-body">
                    {{-- Efectivo recibido --}}
                    <div class="form-group">
                        <label for="cancelado">Efectivo Recibido</label>
                        <input type="number" id="cancelado"
                        class="form-control form-control-sm" placeholder="Cantidad de efectivo recibido" disabled value="{{ $venta->cancelado }}">
                    </div>

                    {{-- Mostrar monto y vuelto --}}
                    <div class="row">
                        <div class="col-12">
                            <h6 class="text-start text-danger">Vuelto: <span id="vuelto">{{ $venta->vuelto }}</span></h6>
                        </div>
                    </div>

                    {{-- Mostrar subtotal, IVA y Total de la venta --}}
                    <div class="row">
                        <div class="col-md-7">
                            <span>SUBTOTAL</span>
                        </div>
                        <div class="col-md-5 text-rigth">
                            <span id="documentoSubtotal">{{ $venta->subtotal }}</span>
                        </div>

                        <div class="col-md-7">
                            <span>IVA (16%)</span>
                        </div>
                        <div class="col-md-5 text-rigth">
                            <span id="documentoIva">{{ $venta->iva }}</span>
                        </div>

                        <div class="col-md-7">
                            <span>TOTAL</span>
                        </div>
                        <div class="col-md-5 text-rigth">
                            <span id="documentoTotal">{{ $venta->valor_compra }}</span>
                        </div>

                    </div>
                </div>
            </div>

        </div> {{-- Fin del Comprobante de pago --}}

     </div>

</div>

@stop