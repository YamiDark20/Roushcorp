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
                            <span class="small">Cliente</span>
                        </label>

                        <select class="form-control form-control-sm" id="id_cliente" name="id_cliente" oninput="calcularValores()">
                            <option value="">Seleccione un cliente</option>
                            @foreach ($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nombre }}</option>
                            @endforeach
                        </select>

                        <label class="form-label" for="id_producto">
                            <i class="fas fa barcode"></i>
                            <span class="small">Almacen</span>
                        </label>

                        <select class="form-control form-control-sm" id="id_almacen" name="id_almacen" oninput="calcularValores()">
                            <option value="">Seleccione un almacen</option>
                            @foreach ($almacenes as $almacen)
                                <option value="{{ $almacen->id }}">{{ $almacen->nombre }}</option>
                            @endforeach
                        </select>

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
                            <i class="fas fa-plus"></i> Anadir producto
                        </button>

                    </div>
                </div>

                {{-- Lista de los producto a comprar. En opciones irian dos botones: 1) Para agregar mas de uno de los productos
                    en la lista 2)Para quitar o disminuir productos de la lista --}}
                <div class="table table-responsive">
                    <table id="listaProductoVenta" class="table table-striped shadow">
                                <th>Codigo</th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Precio</th>
                                <th>IVA</th>
                                <th>Total</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>

                        <tbody>

                        </tbody>


                    </table>

                </div>

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

                        {{-- Botones para realizar la venta o vaciar la lista --}}

                        <div class="d-flex text-right">
                            <button type="submit" class="btn btn-success" id="btnRealizarVenta">
                                <i class="fas fa-shopping-cart"></i> Realizar Venta
                            </button>

                            <a href="/productos" class="btn btn-secondary" >Cancelar</a>
                        </div>

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
    let sumaTotal = 0;
    let sumaIva = 0;
    const table = document.querySelector('#listaProductoVenta');

    function realizarVenta() {
        //
    }

    function setSelectedProducto() {
        let selectedProductoId = document.querySelector('#id_producto').value;
        selectedProducto = productos.find((producto) => producto.id == selectedProductoId);
    }

    function anadirProductoTabla(item) {
        const row = table.insertRow();
        row.id = `fila_${item.id}`;
        const codigoCell = row.insertCell(0);
        codigoCell.innerHTML = item.codigo;
        const nombreCell = row.insertCell(1);
        nombreCell.innerHTML = item.nombre;
        const cantidadInput = document.createElement("input");
        cantidadInput.id = `cantidad_${item.id}`;
        cantidadInput.type = "number";
        const cantidadCell = row.insertCell(2);
        cantidadCell.append(cantidadInput);
        const precioCell = row.insertCell(3);
        precioCell.innerHTML = item.precio;
        const ivaCell = row.insertCell(4);
        ivaCell.innerHTML = 0;
        ivaCell.id = `iva_${item.id}`;
        const totalCell = row.insertCell(5);
        totalCell.innerHTML = (item.precio * cantidadInput.value).toFixed(2);
        totalCell.id = `total_${item.id}`;
        const opcionesCell = row.insertCell(6);
        opcionesCell.classList.add('text-center');
        const eliminarButton = document.createElement("button");
        eliminarButton.id = `eliminar_btn_${item.id}`;
        eliminarButton.innerText = "Eliminar"
        opcionesCell.append(eliminarButton);

        cantidadInput.addEventListener("input", () => {
            total = (item.precio * cantidadInput.value).toFixed(2);
            totalCell.innerHTML = (item.precio * cantidadInput.value).toFixed(2);
            ivaCell.innerHTML = (total * (item.exonerado ? 0 : 0.16)).toFixed(2);
            calcularTotal();
        });
        eliminarButton.addEventListener('click', ()=> {
            eliminarProducto(`${item.id}`);
            calcularTotal();
        });
    }

    function anadirProducto() {
        let selectedProductId = document.querySelector('#id_producto')?.value;
        if(!selectedProductId) return;
        setSelectedProducto();
        let originalSize = selectedProductos.size;
        selectedProductos.set(selectedProductId, selectedProducto);
        if(selectedProductos.size != originalSize) {
            anadirProductoTabla(selectedProducto);
        }
    }

    function eliminarProducto(id) {
        selectedProductos.delete(id);
        let fila = document.querySelector(`#fila_${id}`)
        fila.remove();
    }

    function calcularValores() {
        setSelectedProducto();
        let efectivoExacto = document.querySelector('#chkefectivoExacto').checked;
        let efectivoRecibido = 0;
        let subtotal = (sumaTotal - sumaIva).toFixed(2);

        if(efectivoExacto) {
            efectivoRecibido = sumaTotal
            document.querySelector('#cancelado').value = efectivoRecibido;
        } else {
            efectivoRecibido = document.querySelector('#cancelado').value
        }

        let totalAPagar = (sumaTotal - efectivoRecibido).toFixed(2);
        let vuelto = 0;

        if(totalAPagar < 0){
            vuelto = totalAPagar * -1;
            totalAPagar = 0;
        }

        document.querySelector('#vuelto').innerText = vuelto;
        document.querySelector('#documentoSubtotal').innerText = subtotal;
        document.querySelector('#documentoIva').innerText = sumaIva.toFixed(2);
        document.querySelector('#documentoTotal').innerText = totalAPagar;
    }

    function calcularTotal() {
        let inputsTotales = document.querySelectorAll("[id^='total_']");
        let inputsIva = document.querySelectorAll("[id^='iva_']");
        sumaTotal = 0;
        sumaIva = 0;
        inputsTotales.forEach((total) => {sumaTotal += parseFloat(total.innerText)});
        inputsIva.forEach((iva) => {sumaIva += parseFloat(iva.innerText)});

        calcularValores();
    }

    function fedeTest() {
        console.log(selectedProducto)
        let exonerado = selectedProducto?.exonerado ?? 0;
        console.log(exonerado)
        console.log(table);
        calcularValores();
        console.log(axios);
    }

</script>

@stop