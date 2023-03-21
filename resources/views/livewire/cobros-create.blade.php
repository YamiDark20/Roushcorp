<div>
    <form wire:submit.prevent="submit">
        @if ($errors->any())
            <div>
                <div class="font-medium text-red">Errores de validación: </div>

                <ul class="mt-3 list-disc list-inside text-sm text-red">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="form-group col-4">
                <label for="cliente_seleccionado" class="form-label">Seleccione un cliente</label>
                <select wire:model="cliente_seleccionado" id="cliente_seleccionado"
                placeholder="Seleccione un cliente" class="form-control">
                    @foreach ($customers as $customer)
                        <option value="{{$customer->id}}">
                            {{$customer->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            @if ($ventas->count() > 0)
                <div class="form-group col-4">
                    <label for="venta_seleccionada" class="form-label">Seleccione una venta</label>
                    <select wire:model="venta_seleccionada" id="venta_seleccionada"
                    placeholder="Seleccione una venta" class="form-control">
                        <option value="0">
                            Seleccione una venta
                        </option>
                        @foreach ($ventas as $venta)
                            <option value="{{$venta->id}}">
                                {{$venta->id}}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-4">
                    <label for="" class="form-label">Pendiente por Cancelar:</label>
                    <input type="number" class="form-control" disabled value="{{$venta_seleccionada_obj?->por_cancelar_formateado}}">
                </div>

                <div class="form-group col-4">
                    <label for="" class="form-label">Cantidad a abonar/pagar</label>
                    <input wire:model="abono" id="abono" class="form-control" type="number">
                </div>

                <div class="form-group col-4">
                    <label for="" class="form-label">Tipo Pago</label>
                    <select id="tipo_pago" wire:model="tipo_pago" class="form-control">
                        <option value="Efectivo">Efectivo</option>
                        <option value="Tarjeta">Tarjeta</option>
                        <option value="Pago Movil">Pago Movil</option>
                        <option value="Cash">Cash</option>
                        <option value="Zelle">Zelle</option>
                    </select>

                </div>

                <div class="form-group col-4">
                    <label for="" class="form-label">Tipo Cobro</label>
                    <select wire:model="tipo_cobro" name="tipo_cobro" id="tipo_cobro" class="form-control">
                        <option value="Factura">Factura</option>
                        <option value="Nota de credito">Nota de credito</option>
                    </select>
                </div>

                @else
                <div>A este cliente no se le ha realizado ninguna venta</div>
            @endif
        </div>

        <button wire:submit.prevent="submit" type="submit" class="btn btn-info float-right">
            Agregar Cobro
        </button>
    </form>
</div>
