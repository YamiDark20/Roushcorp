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
                                    <select name="cedula_cliente" wire:model="cedula_cliente"
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

                                <a class="btn btn-danger btn-block" onclick="print()">Generar PDF</a>
                            </div>

                        </div>
                    </div>

                    <div class="col-sm-12 col-md-9">
                        {{-- Tabla --}}
                        <div class="table-responsive">
                            <table id="listaProductoVenta" class="table table-striped shadow">
                                <thead>
                                    <tr>
                                        <th class="text-center">Nro Venta</th>
                                        <th class="text-center">Cancelado</th>
                                        <th class="text-center">Vuelto</th>
                                        <th class="text-center">Fecha</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($results as $result)
                                        <tr>
                                            <td>{{$result->id}}</td>
                                            <td>{{$result->cancelado_formateado}}</td>
                                            <td>{{$result->vuelto_formateado}}</td>
                                            <td>{{$result->created_at}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>

            </div>


        </div>
    </div>
