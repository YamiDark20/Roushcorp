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

                        <label class="form-label" for="id_producto">
                            <i class="fas fa barcode"></i>
                            <span class="small">Productos</span>
                        </label>

                        <select class="form-control form-control-sm" id="id_producto" name="id_producto" oninput="calcularValores()">
                            <option value="">Seleccione un producto</option>
                            @foreach ($productos as $producto)
                                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                            @endforeach
                        </select>

                        <button type="submit" class="btn btn-success" id="btnAnadirProducto" onclick="anadirProducto()">
                            <i class="fas fa-shopping-cart"></i> Anadir producto
                        </button>

                    </div>
                </div>

                {{-- Etiqueta que muestra la suma total del precio de los productos en la lista. Mi idea es que se actualice
                    cada vez que se agregue o quite un producto--}}
                <div class="col-md-6">
                    <h3>Total Venta: <span id="totalVenta">0.00</span></h3>
                </div>

                {{-- Botones para realizar la venta o vaciar la lista --}}

                <div class="col-md-6 text-right">
                    <button type="submit" class="btn btn-success" id="btnRealizarVenta">
                        <i class="fas fa-shopping-cart"></i> Realizar Venta
                    </button>

                    <a href="/productos" class="btn btn-secondary" >Cancelar</a>
                </div>

                {{-- Lista de los producto a comprar. En opciones irian dos botones: 1) Para agregar mas de uno de los productos
                    en la lista 2)Para quitar o disminuir productos de la lista --}}
                <div class="table table-responsive">
                    <table id="listaProductoVenta" class="table table-striped shadow">
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>Total</th>
                                <th class="text-center">Opciones</th>
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
                        <select name="" id="tipo_documento" class="form-select form-select-sm col-sm-12">
                            <option value="">Seleccionar Documento</option>
                            <option value="factura">Factura</option>
                            <option value="nota_entrega">Nota de Entrega</option>
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

                        <select id="tipo_pago" class="form-select form-select-sm col-sm-12">
                            <option value="">Seleccione Tipo de Pago</option>
                            <option value="efectivo">Efectivo</option>
                            <option value="tarjeta">Tarjeta</option>
                            <option value="pago_movil">Pago Movil</option>
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

                    {{-- Cantidad --}}
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" id="cantidad"
                        class="form-control form-control-sm" placeholder="Cantidad" oninput="calcularValores()">
                    </div>

                    {{-- Efectivo recibido --}}
                    <div class="form-group">
                        <label for="cancelado">Efectivo Recibido</label>
                        <input type="text" id="cancelado"
                        class="form-control form-control-sm" placeholder="Cantidad de efectivo recibido" oninput="calcularValores()">
                    </div>

                    {{-- Check de efectivo exacto, al marcarlo no habria que ingresar el efectivo recibido --}}
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" value="" id="chkefectivoExacto" oninput="calcularValores()">
                        <label class="form-check-label" for="chkEfectivoExacto">
                            Efectivo Exacto
                        </label>
                    </div>

                    {{-- Mostrar monto y vuelto --}}
                    <div class="row">
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

                        <button onclick="fedeTest()">fedebutton</button>

                    </div>
                </div>
            </div>

        </div> {{-- Fin del Comprobante de pago --}}

     </div>

</div>

<script>
    let productos = {{ Js::from($productos) }};
    let selectedProducto = null;
    let selectedProductos = new Map();

    function setSelectedProducto() {
        let selectedProductoId = document.getElementById('id_producto').value;
        selectedProducto = productos.find((producto) => producto.id == selectedProductoId);
    }

    function actualizarTabla() {
        const table = document.getElementById('listaProductoVenta');
        while (table.rows.length > 1) {
            table.deleteRow(-1);
        }

        selectedProductos.forEach((item) => {
            const row = table.insertRow();
            const codigoCell = row.insertCell(0);
            codigoCell.innerHTML = item.codigo;
            const nombreCell = row.insertCell(1);
            nombreCell.innerHTML = item.nombre;
            const cantidadCell = row.insertCell(2);
            cantidadCell.innerHTML = 0;
            const precioCell = row.insertCell(3);
            precioCell.innerHTML = item.precio;
            const totalCell = row.insertCell(4);
            totalCell.innerHTML = 0;
            const opcionesCell = row.insertCell(5);
            opcionesCell.classList.add('text-center');
            const eliminarButton = document.createElement("button");
            eliminarButton.id = `eliminar_btn_${item.id}`;
            eliminarButton.addEventListener('click', ()=> {eliminarProducto(`${item.id}`)});
            eliminarButton.innerText = "Eliminar"
            opcionesCell.append(eliminarButton);
        });
    }

    function anadirProducto() {
        let selectedProductId = document.getElementById('id_producto')?.value;
        if(!selectedProductId) return;
        setSelectedProducto();
        selectedProductos.set(selectedProductId, selectedProducto);
        actualizarTabla();
    }

    function eliminarProducto(id) {
        selectedProductos.delete(id);
        actualizarTabla();
    }

    function calcularValores() {
        setSelectedProducto();
        let efectivoExacto = document.getElementById('chkefectivoExacto').checked;
        let cantidad = document.getElementById('cantidad').value;
        let precioProducto = selectedProducto?.precio ?? 0;
        let exonerado = selectedProducto?.exonerado ?? false;
        let precioVenta = (cantidad * precioProducto).toFixed(2);
        let iva = (precioVenta * (exonerado ? 1 : 0.16)).toFixed(2);
        let subtotal = (precioVenta - iva).toFixed(2);
        let efectivoRecibido = 0;


        if(efectivoExacto) {
            efectivoRecibido = precioVenta
            document.getElementById('cancelado').value = efectivoRecibido;
        } else {
            efectivoRecibido = document.getElementById('cancelado').value
        }

        let totalAPagar = (precioVenta - efectivoRecibido).toFixed(2);
        let vuelto = 0;

        if(totalAPagar < 0){
            vuelto = totalAPagar * -1;
            totalAPagar = 0;
        }

        document.getElementById('vuelto').innerText = vuelto;
        document.getElementById('documentoSubtotal').innerText = subtotal;
        document.getElementById('documentoIva').innerText = iva;
        document.getElementById('documentoTotal').innerText = totalAPagar;
    }

    function calcularTotal() {
        let precioTotal = document.getElementById('precio').value;
    }

    function fedeTest() {
        console.log(selectedProducto)
        let exonerado = selectedProducto?.exonerado ?? 0;
        console.log(exonerado)
    }

</script>

@stop