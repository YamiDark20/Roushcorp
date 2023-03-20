<div>
    @if ($result == "Se agrego correctamente")
        <div class="alert alert-success">
            <strong>{{$result}}</strong>
        </div>
    @endif
    <div class="d-flex justify-content-between">
        <div class="row">
            <label for="cliente_seleccionado" class="form-label">Seleccione un cliente</label>
            <select wire:model="cliente_seleccionado" id="cliente_seleccionado"
            placeholder="Seleccione un cliente" class="form-control">
                @foreach ($customers as $customer)
                    <option value="{{$customer->id}}">
                        {{$customer->name}}
                    </option>
                @endforeach
            </select>

            <div wire:loading wire:target="cliente_seleccionado">
                Cargando información del cliente seleccionado...
            </div>
        </div>
        <div class="btn-group">
            <a href="{{ route('cobros.create') }}" class="btn btn-warning d-flex align-items-center">Agregar</a>
        </div>
    </div>
    <div class="card-body">
        @if($cliente_seleccionado_obj->documentos->count() > 0)
            <div class="table-responsive">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope='col'>CodFact</th>
                            <th scope='col'>Fecha</th>
                            <th scope='col'>Monto</th>
                            <th scope='col'>Tipo Pago</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cliente_seleccionado_obj->documentos as $index => $documento)
                            <tr>
                                @if ($documento->venta->estado != '')
                                    <td>
                                        <a href="{{ route('ventas.index')."/".$documento->venta_id }}" class="btn btn-info">{{$documento->venta_id}}</a>
                                    </td>
                                    <td>{{$documento->created_at}}</td>
                                    <td>{{$documento->cancelado}}</td>
                                    <td>{{$documento->tipo_pago}}</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <div>No hay cobros disponibles para este cliente</div>
        @endif
    </div>
</div>

<style>
    #search{
        width: 32%;
    }
</style>

<script>
    function showPagoFacturaModal(id) {
        $('#pagoFacturaModal').modal('show');
    }
</script>
