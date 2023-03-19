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
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope='col'>CodFact</th>
                        <th scope='col'>Fecha</th>
                        <th scope='col'>Total</th>
                        <th scope='col'>Estado</th>
                        <th scope='col'>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cliente_seleccionado_obj->documentos as $documento)
                        <tr>
                            @if ($documento->estado != '')
                                <td>{{$documento->codfact}}</td>
                                <td>{{$documento->created_at}}</td>
                                <td>{{$documento->total}}</td>
                                <td>{{$documento->estado}}</td>
                                <td>
                                    <a class="btn btn-warning"
                                        wire:click="pagofactura()">
                                        Pago Factura
                                    </a>
                                </td>
                                <td>
                                    <a class="btn btn-warning"
                                        wire:click="abono()">
                                        Abono
                                    </a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal" tabindex="-1" role="dialog" style="{{ $showPagoFacturaModal ? 'display:block' : 'display:none' }}">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Pago Factura</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Add your form here for the payment -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    #search{
        width: 32%;
    }
</style>

@push('scripts')
    <script>
        Livewire.on('showPagoFacturaModal', () => {
            console.log("here");
            $('#pagoFacturaModal').modal('show');
        });
        Livewire.on('hidePagoFacturaModal', () => {
            $('#pagoFacturaModal').modal('hide');
        });
    </script>
@endpush
