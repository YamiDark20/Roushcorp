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
            class="form-control">
        </div>

        <div class="form-group col-4 mt-2">
            <label class="form-label">Rif Proveedor</label>
            <select name="proveedor" wire:model="proveedor"
            class="form-control">
                <option value="">---------</option>
                @foreach ($clientes as $cliente)
                    <option value="{{$cliente->id}}">
                        {{$cliente->rif}} - {{$cliente->name}}
                    </option>
                @endforeach
            </select>
            {{-- <input wire:model="proveedor" name="proveedor"
            type="text" class="form-control" > --}}
        </div>

        <div class="form-group col-4 mt-2">
            <label class="form-label">Tipo Pago</label>
            <select name="tipopago" wire:model="tipopago"
            class="form-control">
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
            type="date" class="form-control" >
        </div>

        <div class="form-group col-4 mt-2">
            <label class="form-label">Fecha Salida</label>
            <input wire:model="fechasalida" name="fechasalida"
            type="date" class="form-control" >
        </div>

        <div class="form-group col-4 mt-2">
            <label class="form-label">Origen</label>
            <input wire:model="origen" name="origen"
            type="text" class="form-control" >
        </div>

        <div class="form-group col-4 mt-2">
            <label class="form-label">Destino</label>
            <input wire:model="destino" name="destino"
            type="text" class="form-control" >
        </div>

        {{-- <div class="form-group col-4 mt-2">
            <label class="form-label">Guia de Mov.</label>
            <input type="text" name="guiamov" wire:model="guiamov"
            class="form-control">
        </div>

        <div class="form-group col-4 mt-2">
            <label class="form-label">Tipo de Mov.</label>
            <select name="tipomov" wire:model="tipomov"
            class="form-control">
                <option value="0">---------</option>
                <option value="Terrestre">Terrestre</option>
                <option value="Aereo">Aereo</option>
                <option value="Maritimo">Maritimo</option>
            </select>
        </div>

        <div class="form-group col-4 mt-2">
            <label class="form-label">Impuesto</label>
            <input type="number" min="1" max="100" name="impuesto"
            wire:model="impuesto" class="form-control">
        </div> --}}

        <div class="col-12">
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
                {{-- <option value="9483">9483</option>
                <option value="3443">3443</option> --}}
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

        {{-- @if ($result == "0cant")
            <div class="col-12 alert alert-danger">
                <strong>Al intentar agregar se coloco en cero la cantidad a llevar.</strong>
            </div>
        @else --}}
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
                        {{-- @if ($btncrearprod == 1)
                            <td><input type="text" name="" id="" wire:model="codprod"></td>
                            <td><input type="text" name="" id="" wire:model="nombreprod"></td>
                            <td><input type="text" name="" id="" wire:model="cantprod"></td>
                            <td><input type="text" name="" id="" wire:model="precioprod"></td>
                            <td width="10px">
                                <button type="button" wire:click="eventBtnArrayProd()"
                                class="btn btn-success btn-sm">Guardar</button>
                            </td>
                        @endif
                        @php
                            $numProd = 0;
                        @endphp --}}
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
                        {{-- <tr>
                            <td>4345</td>
                            <td>Harina Juana del carme</td>
                            <td>50</td>
                            <td>449.49</td>
                            <td>6473.94</td>
                        </tr>
                        <tr>
                            <td>7765</td>
                            <td>Azucar Marialejandra wsa</td>
                            <td>120</td>
                            <td>569.49</td>
                            <td>12473.94</td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
            {{-- <div class="col-12">
                <label for="" class="float-right">Impuesto: {{$moneda}} {{$this->total * ($this->impuesto / 100)}}</label>
            </div> --}}
            <div class="col-12">
                <label for="" class="float-right">Total: {{$total}}</label>
            </div>
        @endif
        <div class="col-12">
            <a wire:click="guardarCompra"
                class="btn btn-warning mr-1 float-right">
                Guardar <i class="fas fa-shopping-cart"></i></a>
        </div>
    </div>
    {{-- {{$rif}}
    {{$nombreC}}
    {{$apellidoC}}
    {{$codfact}}
    {{$fecha}}
    {{$descripcion}}
    {{$estado}}
    {{$impuesto}}
    {{$moneda}}



    <div>
        <a href="{{route('cobros.index')}}" class="btn btn-secondary" >Cancelar</a>
        <button wire:click="store()" type="button"
        class="btn btn-info" >Guardar</button>
        @if ($btncrearprod == 0)
            <button wire:click="eventBtnCrearProd()" type="button" class="btn btn-info float-right" >
                Agregar Producto
            </button>
        @else
            <button wire:click="eventBtnCrearProd()" type="button" class="btn btn-info float-right" >
                Cancelar Operación
            </button>
        @endif
    </div>

    <h4 class="mt-3">Agregar producto</h4>

    <div class="table-responsive mt-3">
        <table class="table table-dark table-striped">
            <thead>
                <tr>
                    <th scope='col'>CodProd</th>
                    <th scope='col'>Nombre</th>
                    <th scope='col'>Cantidad</th>
                    <th scope='col'>Precio</th>
                    <th colspan="2" scope='col'>Acción</th>
                </tr>
            </thead>
            <tbody>
                @if ($btncrearprod == 1)
                    <td><input type="text" name="" id="" wire:model="codprod"></td>
                    <td><input type="text" name="" id="" wire:model="nombreprod"></td>
                    <td><input type="text" name="" id="" wire:model="cantprod"></td>
                    <td><input type="text" name="" id="" wire:model="precioprod"></td>
                    <td width="10px">
                        <button type="button" wire:click="eventBtnArrayProd()"
                        class="btn btn-success btn-sm">Guardar</button>
                    </td>
                @endif
                @php
                    $numProd = 0;
                @endphp
                @foreach ($arrayProd as $customer)
                    <tr>
                        <td>{{$customer[0]}}</td>
                        <td>{{$customer[1]}}</td>
                        <td>{{$customer[2]}}</td>
                        <td>{{$customer[3]}}</td>
                        <td width="10px">
                            <button type="button" wire:click="eventBtnEliminarProd('{{$customer[0]}}')"
                                class="btn btn-danger btn-sm">Eliminar</button>
                        </td>
                    </tr>
                    @php
                        $numProd++;
                    @endphp
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="float-right">
        <h5><strong>Impuesto</strong>: {{$moneda}} {{$this->subtotal * ($this->impuesto / 100)}}</h5>
    </div>
    <div class="float-right mr-3">
        <h5><strong>SubTotal</strong>: {{$moneda}} {{$subtotal}}</h5>
    </div>
    <div class="float-right mr-3">
        <h5><strong>Total</strong>: {{$moneda}} {{$subtotal + ($this->subtotal * ($this->impuesto / 100))}}</h5>
    </div> --}}

</div>
