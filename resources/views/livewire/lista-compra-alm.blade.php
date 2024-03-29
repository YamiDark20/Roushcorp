<div>
    <div class="d-flex justify-content-between">
        <div class="col-5">
            {!! Form::label('codcompra', 'Codigo Compra', ['class' => 'form-label']) !!}
            <div>
            <input wire:model="search" id="search" type="text"
        placeholder="Ingrese el codigo de la compra" class="form-control">
    </div>
        </div>
        <div class="col-5">
            {!! Form::label('codalm', 'Codigo Almacen', ['class' => 'form-label float-right d-inline']) !!}
            <div>
                <select name="codalm" wire:model="codalm"
                class="form-control float-right d-inline">
                    <option value="0">---------</option>
                    @foreach ($almacenes as $almacen)
                        @if ($almacen->estado == 'Activo')
                            <option value="{{$almacen->id}}">
                                {{$almacen->id}} - {{$almacen->nombre}}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

    </div>
    @php
        foreach ($compras as $compra) {
            if ($compra->almacen_id == $codalm){
                // $guia = Guia::find($compra->guias_id);
                foreach ($clientes as $cliente) {
                    if ($cliente->id == $compra->cliente_id) {
                        $comprasalm[] = array($compra->id,
                        $compra->guias_id, $cliente->rif,
                        $cliente->name, $compra->tipo_pago,
                        $compra->valor_compra);
                        break;
                    }
                }
            }
        }
    @endphp
    @if ($codalm != "0")
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope='col'>Codigo Compra</th>
                            <th scope='col'>Codigo Mov.</th>
                            <th scope='col'>RIF</th>
                            <th scope='col'>Proveedor</th>
                            <th scope='col'>Tipo Pago</th>
                            <th scope='col'>Total</th>
                            {{-- <th scope='col'>Impuesto</th> --}}
                            <th scope='col'>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($comprasalm as $compraalm)
                            <tr>
                                <td>{{$compraalm[0]}}</td>
                                <td>{{$compraalm[1]}}</td>
                                <td>{{$compraalm[2]}}</td>
                                <td>{{$compraalm[3]}}</td>
                                <td>{{$compraalm[4]}}</td>
                                <td>{{$compraalm[5]}}</td>
                                <td width="10px">
                                    <a href="{{route('compra.index')}}"
                                    class="btn btn-info btn-sm">Ver</a>
                                </td>
                            </tr>
                        @endforeach --}}

                        {{-- @foreach ($comprasnav as $compra) --}}
                            @foreach ($comprasalm as $compraalm)
                                {{-- @if ($compra->id == $compraalm[0]) --}}
                                    <tr>
                                        <td>{{$compraalm[0]}}</td>
                                        <td>{{$compraalm[1]}}</td>
                                        <td>{{$compraalm[2]}}</td>
                                        <td>{{$compraalm[3]}}</td>
                                        <td>{{$compraalm[4]}}</td>
                                        <td>{{$compraalm[5]}}</td>
                                        <td width="10px">
                                            <a href="{{route('compra.show', [$codalm, $compraalm[0]])}}"
                                            class="btn btn-info btn-sm">Ver</a>
                                        </td>
                                    </tr>
                                {{-- @endif --}}

                            @endforeach
                        {{-- @endforeach --}}

                        {{-- <tr>
                            <td scope='col'>Codigo Compra</td>
                            <td scope='col'>Codigo Mov.</td>
                            <td scope='col'>Tipo Mov.</td>
                            <td scope='col'>Fecha</td>
                            <td scope='col'>Proveedor</td>
                            <td scope='col'>Total</td>
                            <td width="10px">
                                <a
                                class="btn btn-info btn-sm">Ver</a>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <div class="alert alert-info mt-3">
            <strong>No se ha seleccionado ningun codigo de almacen.</strong>
        </div>
    @endif

    @if ($codalm != '0')
        {{-- <div class="row m-0 text-center align-items-center justify-content-center">
            <div class="col-auto">
                {{$comprasnav->links()}}
                {{--<div class="float-right">
                    {{$comprasnav->links()}}
                </div>--}}
            {{--</div>
        </div> --}}
        <a href="{{route('compra.create', compact('codalm'))}}"
        class="btn btn-warning mb-3 ml-2 mr-1 d-inline float-right">Agregar Compra</a>
    @endif
</div>
