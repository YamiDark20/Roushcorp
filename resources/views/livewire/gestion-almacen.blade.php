<div>
    {{-- @if ($result == "Se agrego correctamente")
        <div class="alert alert-success">
            <strong>{{$result}}</strong>
        </div>
    @endif --}}
    @if ($result == "Noalmacen.")
        <div class="alert alert-danger">
            <strong>No se han seleccionado el codigo del almacen.</strong>
        </div>
    @endif
    {{-- <div class="d-flex justify-content-between"> --}}
    <div class="row">
        <div class="col-12">
            {!! Form::label('codalm', 'Codigo Almacen', ['class' => 'form-label text-sm col-3 d-inline']) !!}
            <div>
                <select name="codalm" wire:model="codalm"
                class="form-control col-3 d-inline">
                    <option value="0">---------</option>
                    @foreach ($almacenes as $almacen)
                        @if ($almacen->estado == 'Activo')
                            <option value="{{$almacen->id}}">
                                {{$almacen->id}} - {{$almacen->nombre}}
                            </option>
                        @endif
                    @endforeach
                    {{-- <option value="9483">9483</option>
                    <option value="3443">3443</option> --}}
                </select>
                <a wire:click="btnVerContent()"
                class="btn btn-warning btn-sm mb-3 mr-1 d-inline float-right">
                Ver Contenido</a>
                <a wire:click="agregarCompra()"
                class="btn btn-warning btn-sm mb-3 mr-1 d-inline float-right">
                Comprar <i class="fas fa-box"></i></a>
                {{-- <a href="{{route('compra.almacen.create', 'kjkkk')}}"
                class="btn btn-warning btn-sm mb-3 mr-1 d-inline float-right">
                Comprar <i class="fas fa-box"></i></a> --}}
                @if ($codalm != 0)
                    <a href="{{route('compra.index', compact('codalm'))}}"
                    class="btn btn-warning btn-sm mb-3 mr-1 d-inline float-right">
                    Ver Compras</a>
                @endif
            </div>
        </div>
    </div>
        {{-- <div class="btn-group btn-group-sm">
            @if ($pagado == 0)
                <a wire:click="btnEventPagado()"
                class="btn btn-warning mb-3 mr-sm-1">
                    Pagados / Abonados
                </a>
            @else
                <a wire:click="btnEventPagado()"
                class="btn btn-warning mb-3 mr-sm-1 active">
                    Pagados / Abonados
                </a>
            @endif
            <a class="btn btn-warning mb-3 mr-sm-1" wire:click="decremento()">No pagados</a> --}}
            {{-- <a class="btn btn-warning mb-3 mr-sm-1" wire:click="decremento()">Abonados</a> --}}
        {{-- </div> --}}
    {{-- </div> --}}
    <div class="card-body">
        @if ($vercontent == 1)
            <h4 class="mb-3">Contenido del Almacen {{$codalm}}</h4>
            <div class="table-responsive">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope='col'>CodProd</th>
                            <th scope='col'>Nombre</th>
                            <th scope='col'>Stock</th>
                            <th scope='col'>Cantidad a reponer</th>
                            <th scope='col'>Estado</th>
                            <th scope='col'>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prodalm as $producto)
                            <tr>
                                @if ($producto->idalm == $codalm)
                                    <td>{{$producto->idprod}}</td>
                                    @php
                                        $nombre = NULL;
                                        foreach($productos as $prod) {
                                            if($prod->codigo == $producto->idprod){
                                                $nombre = $prod->nombre;
                                                break;
                                            }
                                        }
                                    @endphp
                                    {{-- <td>{{$nombre}}</td> --}}
                                    <td>{{$nombre}}</td>
                                    <td>{{$producto->stock}}</td>
                                    <td>{{$producto->cantReponer}}</td>
                                    {{-- <td>{{$documento->total}}</td> --}}
                                    <td>{{$producto->estado}}</td>
                                    <td width="10px">
                                        <a class="btn btn-info btn-sm">Editar</a>
                                    </td>
                                @endif
                            </tr>
                        @endforeach
                        {{-- <tr>
                            <td>6212</td>
                            <td>Marialejandra Araujo Moya</td>
                            <td>4785</td>
                            <td>Bueno</td>
                            <td width="10px">
                                <a class="btn btn-info btn-sm">Editar</a>
                            </td>
                        </tr>
                        <tr>
                            <td>6212</td>
                            <td>Marialejandra Araujo Moya</td>
                            <td>4785</td>
                            <td>Bueno</td>
                            <td width="10px">
                                <a class="btn btn-info btn-sm">Editar</a>
                            </td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        @endif
        {{-- <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope='col'>RIF</th>
                        <th scope='col'>Cliente</th>
                        <th scope='col'>CodFact</th>
                        <th scope='col'>Fecha</th>
                        <th scope='col'>Total</th>
                        <th scope='col'>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cobros as $documento)
                        <tr>
                            @if ($documento->estado != '')
                                <td>{{$documento->rifcliente}}</td>
                                @php
                                    $nombre = NULL;
                                    foreach($customers as $customer) {
                                        if($customer->rif == $documento->rifcliente){
                                            $nombre = $customer->name;
                                            break;
                                        }
                                    }
                                @endphp
                                <td>{{$nombre}}</td>
                                <td>{{$documento->codfact}}</td>
                                <td>{{$documento->fecha}}</td>
                                <td>{{$documento->total}}</td>
                                <td>{{$documento->estado}}</td>
                            @endif
                        </tr>
                    @endforeach --}}
                    {{-- <tr>
                        @php
                            $ced = NULL;
                            foreach($customers as $customer) {
                                if($customer->rif == '28462041'){
                                    $ced = $customer->rif;
                                    break;
                                }
                            }
                        @endphp
                        <td>{{$ced}}</td>
                        <td>Leonel Araujo</td>
                        <td>4125</td>
                        <td>25/03/22</td>
                        <td>252.24</td>
                        <td>Pagado</td>
                    </tr>
                    <tr>
                        <td>
                            @if($pagado == 0)
                                8451
                            @else
                                <input type="text" name="" id="">
                            @endif
                        </td>
                        <td>6212</td>
                        <td>Marialejandra Araujo Moya</td>
                        <td>4785</td>
                        <td>12/06/20</td>
                        <td>132.84</td>
                        <td>No pagado</td>
                    </tr>
                    <tr>
                        <td>7452</td>
                        <td>Empresa Universa.inv</td>
                        <td>8545</td>
                        <td>09/09/12</td>
                        <td>237.62</td>
                        <td>Abonado</td>
                    </tr> --}}
                {{-- </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between">
            @php
                $total = $pagado = $nopagado = 0;
                $rif = 0;
                foreach ($cobros as $documento) {
                    if (($rif == 0) || ($documento->rifcliente == $rif)){
                        $rif = $documento->rifcliente;
                        $total += $documento->total;
                        if(($documento->estado == 'Pagado')||($documento->estado == 'Abonado')){
                            $pagado += $documento->total;
                        }else{
                            $nopagado += $documento->total;
                        }
                    }else{
                        $total = $pagado = $nopagado = 0;
                        break;
                    }
                }
            @endphp
            <label for="" class="form-label">Total: Bs. {{$total}}</label>
            <label for="" class="form-label">Pagado: Bs. {{$pagado}}</label>
            <label for="" class="form-label">No pagado: Bs. {{$nopagado}}</label>
        </div>
        <div class="row my-3">
            <div class="col-12">
                <div class="float-right">
                    {{$cobros->links()}}
                </div>
            </div>
        </div>
        <h3 class="my-3">Agregar Cobros</h3>
        <div class="row">
            <div class="form-group col-12">
                <label for="" class="form-label">Codigo de la Factura</label>
                <div class="form-group">
                    <select wire:model="rif" name="rif" id="rif"
                    class="form-control col-4 mr-2 d-inline">
                        <option value="0">-------------</option>
                        @foreach ($documentos as $documento)
                            @if (($documento->estado == '') || ($documento->estado == 'No pagado'))
                                <option value="{{$documento->codfact}}">
                                    {{$documento->codfact}}
                                </option>
                            @endif
                        @endforeach
                    </select> --}}
                    {{-- <div class="btn-group btn-group-toggle d-block" data-toggle="buttons">
                        <div class="btn btn-primary">
                            <input type="radio" name="exonerado" value="0" autocomplete="off" class="btn-check" checked>Sin IVA
                        </div>
                        <div class="btn btn-primary">
                            <input type="radio" name="exonerado" value="1" autocomplete="off" class="btn-check">Con IVA
                        </div>

                    </div> --}}
                    {{-- @if ($activarpagofact == 1)
                        <a class="btn btn-warning mb-3 mr-2 d-inline active"
                        wire:click="pagofactura()">Pago Factura</a>
                    @else
                        <a class="btn btn-warning mb-3 mr-2 d-inline"
                        wire:click="pagofactura()">Pago Factura</a>
                    @endif

                    @if ($activarabono == 1)
                    <a class="btn btn-warning mb-3 mr-2 d-inline active"
                    wire:click="abono()">Abono</a>
                    @else
                        <a class="btn btn-warning mb-3 mr-2 d-inline"
                        wire:click="abono()">Abono</a>
                    @endif
                </div>
            </div>
            <div class="form-group col-12">
                <div class="row">
                    <div class="col-6">
                        <label for="" class="form-label">Tipo de pago</label>
                        <select wire:model="tipopago" name="tipopago" id="tipopago"
                        class="form-control">
                            <option value="0">-------------</option>
                            <option value="Bs">Bolivar (Bs.)</option>
                            <option value="Z">Zelle</option>
                            <option value="$">Dolar ($)</option>
                        </select>
                    </div>
                    <div class="col-6">
                        <label for="" class="form-label">Tipo de cambio</label>
                        <select wire:model="tipocambio" name="tipocambio"
                        id="tipocambio" class="form-control">
                            <option value="0">-------------</option>
                            <option value="T">Transferencia</option>
                            <option value="PM">Pago Movil</option>
                        </select>
                    </div>
                </div>
            </div>
            @if ($activarpagofact == 1)
                <div class="form group col-12">
                    <a class="btn btn-info mb-3 mr-2 float-right"
                    wire:click="procesarpagofactura()">Procesar</a>
                </div>
            @endif
            @if ($activarabono == 1)
                <div class="form group col-12">
                    <a class="btn btn-info mb-3 mr-2 float-right"
                    wire:click="procesarabono()">Procesar</a>
                </div>
            @endif
        </div> --}}
    </div>
</div>
