<div>
    <div>
        <div class="row">

            <div class="form-group col-4 mt-2">
                <label class="form-label">Codigo Almacen</label>
                <input type="text" name="codalm" value="{{$codalm}}"
                class="form-control" readonly>
            </div>

            <div class="form-group col-4 mt-2">
                <label class="form-label">Codigo Compra</label>
                <input type="text" name="codcompra" wire:model="codcompra"
                class="form-control" readonly>
            </div>

            <div class="form-group col-4 mt-2">
                <label class="form-label">Rif Proveedor</label>
                <select name="proveedor" wire:model="proveedor"
                class="form-control disabled" disabled>
                    <option value="">{{$proveedor}} - {{$nombrecliente}}</option>
                    {{-- @foreach ($clientes as $cliente)
                        <option value="{{$cliente->id}}">
                            {{$cliente->rif}} - {{$cliente->name}}
                        </option>
                    @endforeach --}}
                </select>
            </div>

            <div class="form-group col-4 mt-2">
                <label class="form-label">Tipo Pago</label>
                <select name="tipopago" wire:model="tipopago"
                class="form-control" disabled>
                    <option value="">---------</option>
                    <option value="Efectivo">Efectivo</option>
                    <option value="Tarjeta">Tarjeta</option>
                    <option value="Pago Movil">Pago Movil</option>
                    <option value="Cash">Cash</option>
                    <option value="Zelle">Zelle</option>
                </select>
            </div>

            <div class="form-group col-4 mt-2">
                <label class="form-label">Fecha Llegada</label>
                <input wire:model="fechallegada" name="fechallegada"
                type="date" class="form-control" readonly >
            </div>

            <div class="form-group col-4 mt-2">
                <label class="form-label">Fecha Salida</label>
                <input wire:model="fechasalida" name="fechasalida"
                type="date" class="form-control" readonly>
            </div>

            <div class="form-group col-4 mt-2">
                <label class="form-label">Origen</label>
                <input wire:model="origen" name="origen"
                type="text" class="form-control" readonly>
            </div>

            <div class="form-group col-4 mt-2">
                <label class="form-label">Destino</label>
                <input wire:model="destino" name="destino"
                type="text" class="form-control" readonly>
            </div>

            {{-- <div class="col-12">
                <h4 class="h5">Producto a agregar</h4>
            </div>

            <div class="form-group col-3 mt-2">
                <label class="form-label">Codigo</label>
                <select name="codprod" wire:model="codprod"
                class="form-control">
                    <option value="0">---------</option>
                    @foreach ($productos as $producto)
                        <option value="{{$producto->codigo}}">
                            {{$producto->codigo}} - {{$producto->nombre}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-3 mt-2">
                <label class="form-label">Estado</label>
                <select name="estado" wire:model="estado"
                class="form-control">
                    <option value="0">---------</option>
                    <option value="Bueno">Bueno</option>
                    <option value="Medio">Medio</option>
                    <option value="Malo">Malo</option>
                </select>
            </div>

            <div class="form-group col-6 mt-2">
                <label class="form-label">Cantidad</label>
                <div>
                    <input wire:model="cantllevar" name="cantllevar"
                    type="number" min="1" class="form-control col-4 d-inline" >
                    <a wire:click="agregarProd"
                    class="btn btn-warning mr-1 d-inline float-right">
                    Agregar <i class="fas fa-box"></i></a>
                </div>
            </div>

            <div class="col-12">
                <h4 class="h5">Lista de productos agregados</h4>
            </div>
            @if ($prodcomprados == [])
                <div class="col-12 alert alert-info">
                    <strong>No se han agregado ningun producto a la lista.</strong>
                </div>
            @else
                <div class="table-responsive mt-3">
                    <table class="table table-dark table-striped">
                        <thead>
                            <tr>
                                <th scope='col'>CodProd</th>
                                <th scope='col'>Nombre</th>
                                <th scope='col'>Estado</th>
                                <th scope='col'>Cantidad</th>
                                <th scope='col'>Precio</th>
                                <th scope='col'>Total</th>
                                <th scope='col'>Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($prodcomprados as $prod)
                                <tr>
                                    <td>{{$prod[0]}}</td>
                                    <td>{{$prod[1]}}</td>
                                    <td>{{$prod[4]}}</td>
                                    <td>{{$prod[2]}}</td>
                                    <td>{{$prod[3]}}</td>
                                    <td>{{$prod[2] * $prod[3]}}</td>
                                    <td><a wire:click="eliminarProd('{{$prod[0]}}')"
                                        class="btn btn-danger">
                                        Eliminar</a></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-12">
                    <label for="" class="float-right">Total: {{$total}}</label>
                </div>
            @endif
            <div class="col-12">
                <a wire:click="guardarCompra"
                    class="btn btn-warning mr-1 float-right">
                    Guardar <i class="fas fa-shopping-cart"></i></a>
            </div> --}}
        </div>

    </div>
</div>
