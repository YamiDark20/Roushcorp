<div class="col-lg-12 grid-margin stretch-card">
    <h1>Reporte Ventas</h1>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-3">
                        <div class="row">
                            <div class="col-sm-12">
                                <h6>Cedula del Cliente</h6>
                                <div class="form-group">
                                    <select name="cliente_id" wire:model="cliente_id"
                                    class="form-control">
                                        <option value="0">Todos los clientes</option>
                                        @foreach ($clientes as $cliente)
                                            <option value="{{$cliente->id}}">
                                                {{$cliente->name}} - {{$cliente->rif}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                {{-- de este input imagino saliendo un calendario --}}
                                <h6>Fecha desde</h6>
                                <div class="form-group">
                                    <input name="fecha" type="date" class="form-control" wire:model="fecha_inicio">
                                    {{-- <input type="text" class="form-control" placeholder="Clic para seleccionar"> --}}
                                </div>
                            </div>

                            <div class="col-sm-12">
                                {{-- de este input imagino saliendo un calendario --}}
                                <h6>Fecha hasta</h6>
                                <div class="form-group">
                                    <input name="fecha" type="date" class="form-control" wire:model="fecha_fin">
                                    {{-- <input type="text" class="form-control" placeholder="Clic para seleccionar"> --}}
                                </div>
                            </div>

                            <div class="col-sm-12">
                                {{-- En este momento no tengo idea que mas poner en estos botones >:-( --}}

                                <button class="btn btn-danger btn-block" wire:click="generarFactura" @if(!count($results)) disabled @endif>Generar PDF</button>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 col-md-9">
                        @if(count($results) > 0)
                            <div class="table-responsive">
                                <table id="listaProductoVenta" class="table table-striped shadow">
                                    <thead>
                                        <th scope='col' class="text-sm">ID</th>
                                        <th scope='col' class="text-sm">Valor Compra</th>
                                        <th scope='col' class="text-sm">Cancelado</th>
                                        <th scope='col' class="text-sm">Por Cancelar</th>
                                        <th scope='col' class="text-sm">Vuelto</th>
                                        <th scope='col' class="text-sm">Estado</th>
                                        <th scope='col' class="text-sm">Cliente</th>
                                        <th scope='col' class="text-sm">Vendedor</th>
                                        <th scope='col' class="text-sm">Fecha</th>
                                    </thead>

                                    <tbody>
                                        @foreach ($results as $venta)
                                            <tr>
                                                <td class="text-sm">{{ $venta ->id}}</td>
                                                <td class="text-sm">{{ $venta ->valor_compra_formateado}}</td>
                                                <td class="text-sm">{{ $venta ->cancelado_formateado}}</td>
                                                <td class="text-sm">{{ $venta ->por_cancelar_formateado}}</td>
                                                <td class="text-sm">{{ $venta ->vuelto_formateado}}</td>
                                                <td class="text-sm">{{ $venta ->estado }}</td>
                                                <td>
                                                    <a href="/customers/{{$venta ->cliente->id}}" class = 'btn btn-sm btn-info'>
                                                        {{ $venta ->cliente->name }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $venta ->vendedor->name }}
                                                </td>
                                                <td>
                                                    {{ $venta -> created_at }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            @else
                                <div class="alert alert-danger">No hay resultados para los parametros introducidos</div>
                        @endif
                    </div>
                </div>

            </div>


        </div>
    </div>
