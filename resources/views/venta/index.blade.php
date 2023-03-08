@extends('adminlte::page')

@section('title', 'Ventas')

@section('content_header')
<nav>
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="/dash">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">Venta</a></li>

    </ol>
</nav>
<h1>Venta</h1>
@endsection

@section('content')

<div class="container-fluid">

     <div class="row">

        <div class="col-md-9">

            <div class="row">
               
                {{-- Para ingresar el codigo o nombre del producto, podria mostrar una lista desplegable con los
                    productos coincidentes en la bse de datos. O podria ser una ventana modal. Al seleccionar uno
                    se agrega a la tabla de mas abajo --}}
                <div class="col-md-12">
                    <div class="form-group">

                        <label class="form-label" for="codigoProd">
                            <i class="fas fa barcode"></i>
                            <span class="small">Productos</span>
                        </label>

                        <input type="text" class="form-control form-control-sm" 
                        id="codigoProd" placeholder="Ingrese el codigo o el nombre del producto">

                    </div>
                </div>

                {{-- Etiqueta que muestra la suma total del precio de los productos en la lista. Mi idea es que se actualice
                    cada vez que se agregue o quite un producto--}}
                <div class="col-md-6">
                    <h3>Total Venta: <span id="totalVenta">0.00</span></h3>
                </div>

                {{-- Botones para realizar la venta o vaciar la lista --}}

                <div class="col-md-6 text-right">
                    <button class="btn btn-success" id="btnRealizarVenta">
                        <i class="fas fa-shopping-cart"></i> Realizar Venta
                    </button>

                    <button class="btn btn-danger" id="btnVaciarLista">
                        <i class="far fa-trash-alt"></i> Vaciar Lista
                    </button>
                </div>

                {{-- Lista de los producto a comprar. En opciones irian dos botones: 1) Para agregar mas de uno de los productos
                    en la lista 2)Para quitar o disminuir productos de la lista --}}
                <div class="table table-responsive">
                    <table id="listaProductoVenta" class="table table-striped shadow">                      
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Codigo</th>
                                <th>Producto</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                                <th class="text-center">Opciones</th>
                                <th>Peso</th>
                            </tr>
                        </thead>

                        <tbody>
                            
                        </tbody>
                        
                        
                    </table>
                    
                </div>
                <h5 class="text-center">Sin datos porque esto no tiene funcionalidad :(</h5>

            </div>

        </div>

        {{-- Comprobante de pago --}}
        <div class="col-md-3">
            <div class="card shadow">
                <h5 class="card-header bg-info text-white text-center">
                    Total Venta: <span id="totalVentaRegistrar">0.00</span>
                </h5>

                <div class="card-body">
                    {{-- selccionar tipo de documento --}}
                    <div class="form-group">
                        
                        <label for="seleccionarDoc">
                            <i class="fas fa-file-alt"></i>
                            <span class="small">Documento</span>
                        </label>
                    

                        <select name="" id="selDocVenta" class="form-select form-select-sm col-sm-12">
                            <option value="0">Seleccionar Documento</option>
                            <option value="1" selected="true">Factura</option>
                            <option value="2">Nota de Entrega</option>
                        </select>
                    </div>

                    {{-- <span id="" class="text-danger small fst-italic" style="display:none">
                        Debe seleccionar documento
                    </span> --}}   
                    
                    {{-- Seleccionar tipo de pago --}}
                    <div class="form-group">

                        <label for="">
                            <i class="fas fa-money-bill-alt"></i>
                            <span class="small">Tipo Pago</span>
                        </label>

                        <select id="selTipoPago" class="form-select form-select-sm col-sm-12">
                            <option value="0">Seleccione Tipo de Pago</option>
                            <option value="1" selected="true">Efectivo</option>
                            <option value="2">Tarjeta</option>
                            <option value="3">Pago Movil</option>
                        </select>

                    </div>

                    {{-- Numero de documento --}}
                    <div class="form-group">

                        <div class="row">

                            <div class="col-md-4">

                                <label for="nroDoc">Serie</label>

                                <input type="text" min="0" id="nroSerie" class="form-control form-control-sm" 
                                placeholder="nro Serie" disabled>
                            </div>

                            {{-- Al hacer una venta este numero deberia incrementarse --}}
                            <div class="col-md-8">
                                <label for="nroVenta">Nro Venta</label>

                                <input type="text" min="0" id="NroVenta"
                                class="form-control form-control-sm" placeholder="Nro Venta" disabled>
                            </div>
                        </div>
                    </div>

                    {{-- Efectivo recibido --}}
                    <div class="form-group">
                        <label for="inputEfectivoRecibido">Efectivo Recibido</label>
                        <input type="text" id="inputEfectivoRecibido" 
                        class="form-control form-control-sm" placeholder="Cantidad de efectivo recibido">
                    </div>

                    {{-- Check de efectivo exacto, al marcarlo no habria que ingresar el efectivo recibido --}}
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="" id="chkefectivoExacto">
                        <label class="form-check-label" for="chkEfectivoExacto">
                            Efectivo Exacto
                        </label> 
                    </div>

                    {{-- Mostrar monto y vuelto --}}
                    <div class="row">

                        <div class="col-12">
                            <h6 class="text-start">Monto Efectivo: <span id="EfectivoEntregado">0.00</span></h6>
                        </div>

                        <div class="col-12">
                            <h6 class="text-start text-danger">Vuelto: <span id="vuelto">0.00</span></h6>
                        </div>
                    </div>

                    {{-- Mostrar subtotal, IVA y Total de la venta --}}
                    <div class="row">
                        <div class="col-md-7">
                            <span>SUBTOTAL</span>
                        </div>
                        <div class="col-md-5 text-rigth">
                            <span id="documentoSubtotal">0.00</span>
                        </div>
                        
                        <div class="col-md-7">
                            <span>IVA (16%)</span>
                        </div>
                        <div class="col-md-5 text-rigth">
                            <span id="documentoIva">0.00</span>
                        </div>

                        <div class="col-md-7">
                            <span>TOTAL</span>
                        </div>
                        <div class="col-md-5 text-rigth">
                            <span id="documentoTotal">0.00</span>
                        </div>
                        
                    </div>
                </div>
            </div>

        </div> {{-- Fin del Comprobante de pago --}}

     </div>

</div>


@stop