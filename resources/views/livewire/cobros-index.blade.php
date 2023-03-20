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
    </div>
    <div class="card-body">
        @if($cliente_seleccionado_obj->documentos->count() > 0)
            <div class="table-responsive">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope='col'>CodFact</th>
                            <th scope='col'>Fecha</th>
                            <th scope='col'>Cancelado</th>
                            <th scope='col'>Total</th>
                            <th scope='col'>Estado</th>
                            <th scope='col'>Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cliente_seleccionado_obj->documentos as $index => $documento)
                            <tr>
                                @if ($documento->estado != '')
                                    <td>{{$documento->codfact}}</td>
                                    <td>{{$documento->created_at}}</td>
                                    <td>{{$documento->cancelado}}</td>
                                    <td>{{$documento->total}}</td>
                                    <td>{{$documento->estado}}</td>
                                    @if ($documento->estado != "Pagado")
                                        <td>
                                            <div class="row">
                                                <input wire:model="cancelados.{{$index}}" id="cancelados.{{$index}}" class="form-control w-auto mr-3" type="number">
                                                <a class="btn btn-warning" wire:click="pagar({{$index}})">
                                                    Pagar / Abonar
                                                </a>
                                            </div>
                                        </td>
                                    @endif
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
