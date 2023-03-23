<div class="container-fluid">
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <strong>
                    {{ $error }}
                </strong>
            </div>
        @endforeach
    @endif
    <form wire:submit.prevent="submit">
        <div class="row">
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="form-label mt-3" for="cliente_seleccionado">
                                <i class="fas fa barcode"></i>
                                <span class="bold">Cliente</span>
                            </label>

                            <select class="form-control form-control-sm" id="cliente_seleccionado" name="cliente_seleccionado" wire:model="cliente_seleccionado">
                                @foreach ($clientes as $cliente)
                                    <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                                @endforeach
                            </select>

                            <label class="form-label mt-3" for="vendedor_seleccionado">
                                <i class="fas fa barcode"></i>
                                <span class="bold">Vendedor</span>
                            </label>

                            <select class="form-control form-control-sm" id="vendedor_seleccionado" name="vendedor_seleccionado" wire:model="vendedor_seleccionado">
                                @foreach ($vendedores as $vendedor)
                                    <option value="{{ $vendedor->id }}">{{ $vendedor->name }}</option>
                                @endforeach
                            </select>

                            @if(count($this->almacenes) > 0)

                                <label class="form-label mt-3" for="almacen_seleccionado">
                                    <i class="fas fa barcode"></i>
                                    <span class="bold">Almacen</span>
                                </label>

                                <select class="form-control form-control-sm" id="almacen_seleccionado" name="almacen_seleccionado" wire:model="almacen_seleccionado">
                                    @foreach ($this->almacenes as $almacen)
                                        <option value="{{ $almacen->id }}">{{ $almacen->nombre }}</option>
                                    @endforeach
                                </select>

                                @if(count($this->productos_almacen) > 0)
                                    <label class="form-label mt-3" for="producto_seleccionado">
                                        <i class="fas fa barcode"></i>
                                        <span class="bold">Productos</span>
                                    </label>

                                    <select class="form-control form-control-sm" id="producto_seleccionado" name="producto_seleccionado" wire:model="producto_seleccionado">
                                        @foreach ($this->productos_almacen as $producto_almacen)
                                            <option value="{{ $producto_almacen->id }}">{{ $producto_almacen->producto->nombre }}</option>
                                        @endforeach
                                    </select>

                                    <button type="button" class="btn btn-success float-right my-3" id="btnAnadirProducto" wire:click="anadirProducto()">
                                        <i class="fas fa-plus"></i> Anadir producto
                                    </button>

                                    @else
                                        <div class="text-danger">No hay productos disponibles en este almacen</div>
                                @endif

                                @else
                                    <div class="text-danger">No hay almacenes registrados para este vendedor</div>
                            @endif

                        </div>
                    </div>

                    {{-- Lista de los producto a comprar. En opciones irian dos botones: 1) Para agregar mas de uno de los productos
                        en la lista 2)Para quitar o disminuir productos de la lista --}}
                    <div class="table table-responsive">
                        <table id="listaProductoVenta" class="table table-striped shadow">
                                    <th>Codigo</th>
                                    <th>Nombre</th>
                                    <th>Marca</th>
                                    <th>Almacen</th>
                                    <th>Cantidad</th>
                                    <th>Precio ($)</th>
                                    <th>IVA ($)</th>
                                    <th>Total ($)</th>
                                    <th class="text-center">Opciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($productos as $producto)
                                    @if(isset($producto['id']))
                                        @livewire('producto-row', ['producto' => $producto], key($producto['id']))
                                    @endif
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
                        {{-- selccionar tipo de documento --}}
                        <div class="form-group">

                            <label for="seleccionarDoc">
                                <i class="fas fa-file-alt"></i>
                                <span class="small">Documento</span>
                            </label>
                            <select name="" id="tipo_documento" wire:model="tipo_documento" class="form-select form-select-sm col-sm-12">
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

                            <select id="tipo_pago" wire:model="tipo_pago" class="form-select form-select-sm col-sm-12">
                                <option value="Efectivo">Efectivo</option>
                                <option value="Tarjeta">Tarjeta</option>
                                <option value="Pago Movil">Pago Movil</option>
                                <option value="Cash">Cash</option>
                                <option value="Zelle">Zelle</option>
                            </select>

                        </div>

                        {{-- Efectivo recibido --}}
                        <div class="form-group">
                            <label for="cancelado">Efectivo Recibido</label>
                            <input type="number" id="cancelado"
                            class="form-control form-control-sm" min="0" step="0.01" placeholder="Cantidad de efectivo recibido" wire:model="cancelado">
                        </div>

                        {{-- Mostrar monto y vuelto --}}
                        <div class="row">
                            <div class="col-12">
                                <h6 class="text-start text-danger">Vuelto: <span id="vuelto">{{ $this->vuelto }}</span></h6>
                            </div>
                        </div>

                        {{-- Mostrar subtotal, IVA y Total de la venta --}}
                        <div class="row">
                            <div class="col-md-7">
                                <span>SUBTOTAL</span>
                            </div>
                            <div class="col-md-5 text-rigth">
                                <span id="documentoSubtotal">{{ $this->subtotal_divisas }}</span>
                            </div>

                            <div class="col-md-7">
                                <span>IVA (16%)</span>
                            </div>
                            <div class="col-md-5 text-rigth">
                                <span id="documentoIva">{{ $this->iva_divisas }}</span>
                            </div>

                            <div class="col-md-7">
                                <span>TOTAL</span>
                            </div>
                            <div class="col-md-5 text-rigth">
                                <span id="documentoTotal">{{ $this->total_divisas }}</span>
                            </div>

                            {{-- Botones para realizar la venta o vaciar la lista --}}

                            <div class="col text-right">
                                <button type="submit" class="btn btn-success w-100 mt-3" id="btnRealizarVenta" wire:click="submit">
                                    <i class="fas fa-shopping-cart"></i> Realizar Venta
                                </button>

                                <a href="/productos" class="btn btn-secondary w-100 mt-3" >Cancelar</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div> {{-- Fin del Comprobante de pago --}}
        </div>
    </form>
</div>