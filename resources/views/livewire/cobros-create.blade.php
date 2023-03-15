<div>
    <div class="row">

        <div class="form-group col-4">
            <label for="" class="form-label">Rif del Cliente</label>
            <select wire:model="rif" name="rif" id="rif" class="form-control">
                <option value="0">-------------</option>
                <option value="23233233">23233233</option>
            </select>
        </div>

        <div class="form-group col-4">
            <label for="" class="form-label">Nombre del cliente</label>
            <input wire:model="nombreC" id="nombreC" name="nombreC"
            type="text" class="form-control" >
        </div>

        <div class="form-group col-4">
            <label for="" class="form-label">Apellido del cliente</label>
            <input wire:model="apellidoC" id="apellidoC" name="apellidoC"
            type="text" class="form-control" >
        </div>

        <div class="form-group col-4">
            <label for="" class="form-label">Codigo de Factura</label>
            <input wire:model="codfact" id="codfact" name="codfact"
            type="text" class="form-control" >
        </div>

        <div class="form-group col-4">
            <label for="" class="form-label">Fecha</label>
            <input wire:model="fecha" id="fecha" name="fecha"
            type="date" class="form-control" >
        </div>


        <div class="form-group col-4">
            <label for="" class="form-label">Estado</label>
            <select wire:model="estado" name="estado" id="estado" class="form-control">
                <option value="No pagado">No pagado</option>
                <option value="Pagado">Pagado</option>
                <option value="Devolucion">Devolucion</option>
            </select>
        </div>

        <div class="form-group col-4">
            <label for="" class="form-label">Descripcion</label>
            <textarea wire:model="descripcion" id="descripcion" name="descripcion"
            type="text" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group col-4">
            <label for="" class="form-label">Moneda</label>
            <select wire:model="moneda" name="moneda" id="moneda" class="form-control">
                <option value="Bs.">Bolivar (Bs.)</option>
                <option value="$">Dolar ($)</option>
            </select>
        </div>

        <div class="form-group col-2">
            <label for="" class="form-label">Numero de guia</label>
            <input wire:model="numguia" id="numguia" name="numguia"
            type="text" class="form-control" >
        </div>

        <div class="form-group col-2">
            <label for="" class="form-label">Impuesto (%)</label>
            <input wire:model="impuesto" id="impuesto" name="impuesto"
            type="number" max="100" min="1" class="form-control" >
        </div>

        {{-- <div class="form-group col-4">
            <select wire:model="tipocobro" name="tipocobro" id="tipocobro" class="form-control">
                <option value="Nota de credito">Nota de credito</option>
                <option value="Devolucion">Devolución</option>
            </select>
        </div> --}}

    </div>
    {{$rif}}
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
        {{-- <button type="submit" class="btn btn-info" >Guardar</button> --}}
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
                    {{-- <input type="hidden" name="{{'codprod'. strval( $numProd )}}" value="{{$customer[0]}}">
                    <input type="hidden" name="{{'nombreprod'. strval( $numProd )}}" value="{{$customer[1]}}">
                    <input type="hidden" name="{{'cantprod'. strval( $numProd )}}" value="{{$customer[2]}}">
                    <input type="hidden" name="{{'precioprod'. strval( $numProd )}}" value="{{$customer[3]}}"> --}}
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
    </div>

</div>





{{-- <div>
    {!! Form::open(['route' => 'cobros.store']) !!}
        <div class="row">

            <div class="form-group col-4">
                <label for="" class="form-label">Rif</label>
                <select wire:model="rif" name="rif" id="rif" class="form-control">
                    <option value="0">-------------</option>
                    <option value="1">23233233</option>
                </select>
            </div>

            <div class="form-group col-4">
                <label for="" class="form-label">CodFact</label>
                <input id="codfact" name="codfact" type="text" class="form-control" >
            </div>

            <div class="form-group col-4">
                <label for="" class="form-label">Fecha</label>
                <input id="fecha" name="fecha" type="date" class="form-control" >
            </div>

            <div class="form-group col-8">
                <label for="" class="form-label">Descripcion</label>
                <textarea id="descripcion" name="descripcion" type="text" class="form-control" rows="3"></textarea>
            </div>

            <div class="form-group col-4">
                <label for="" class="form-label">Tipo de cobro</label>
                <input id="tipocobro" name="tipocobro" type="text" class="form-control" >
            </div>

        </div>
        {{$rif}}


        <div>
            <a href="{{route('cobros.index')}}" class="btn btn-secondary" >Cancelar</a>
            <button type="submit" class="btn btn-info" >Guardar</button>
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
                            <td name="codprod">{{$customer[0]}}</td>
                            <td name="nombreprod">{{$customer[1]}}</td>
                            <td name="cantprod">{{$customer[2]}}</td>
                            <td name="precioprod">{{$customer[3]}}</td>
                            <td width="10px">
                                <button type="button" wire:click="eventBtnEliminarProd('{{$customer[0]}}')"
                                    class="btn btn-info btn-sm">Eliminar</button>
                            </td>
                        </tr>
                        <input type="hidden" name="{{'codprod'. strval( $numProd )}}" value="{{$customer[0]}}">
                        <input type="hidden" name="{{'nombreprod'. strval( $numProd )}}" value="{{$customer[1]}}">
                        <input type="hidden" name="{{'cantprod'. strval( $numProd )}}" value="{{$customer[2]}}">
                        <input type="hidden" name="{{'precioprod'. strval( $numProd )}}" value="{{$customer[3]}}">
                        @php
                            $numProd++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    {!! Form::close() !!}
</div> --}}
