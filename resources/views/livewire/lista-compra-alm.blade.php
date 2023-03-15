<div>
    <div class="d-flex justify-content-between">
        <input wire:model="search" id="search" type="text"
        placeholder="Ingrese el codigo del producto" class="form-control w-50">
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope='col'>Codigo Compra</th>
                        <th scope='col'>Codigo Mov.</th>
                        <th scope='col'>Tipo Mov.</th>
                        <th scope='col'>Fecha</th>
                        <th scope='col'>Proveedor</th>
                        <th scope='col'>Total</th>
                        <th scope='col'>Impuesto</th>
                        <th scope='col'>Acción</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- @foreach ($movalmacenes as $movalm)
                        <tr>
                            @if ($movalm->codalm == $codalm)
                                <td>{{$movalm->codmov}}</td>
                                <td>{{$movalm->codmov}}</td>
                                @foreach ($movimientos as $movimiento)
                                    @if ($movimiento->codmov)

                                    @endif
                                @endforeach
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
                    @foreach ($comprasalm as $compraalm)
                        <tr>
                            <td>{{$compraalm[0]}}</td>
                            <td>{{$compraalm[1]}}</td>
                            <td>{{$compraalm[2]}}</td>
                            <td>{{$compraalm[3]}}</td>
                            <td>{{$compraalm[4]}}</td>
                            <td>{{$compraalm[5]}}</td>
                            <td>{{$compraalm[6]}}</td>
                            <td width="10px">
                                <a href="{{route('compra.almacen.visualizar',
                                [$compraalm[0], $codalm])}}"
                                class="btn btn-info btn-sm">Ver</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
