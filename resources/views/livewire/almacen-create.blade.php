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
                <label for="vendedor_id" class="form-label">Asigne un vendedor al almacen</label>
                <select wire:model="vendedor_id" id="vendedor_id"
                placeholder="Seleccione un vendedor" class="form-control">
                    @foreach ($vendedores as $vendedor)
                        <option value="{{$vendedor->id}}">
                            {{$vendedor->name}}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group col-4">
                <label for="estado" class="form-label">Estado del almacen</label>
                <select wire:model="estado" id="estado"
                placeholder="Seleccione un estado" class="form-control">
                    <option value="Activo">
                        Activo
                    </option>
                    <option value="Inactivo">
                        Inactivo
                    </option>
                </select>
            </div>

            <div class="form-group col-4">
                <label for="" class="form-label">Nombre:</label>
                <input type="text" class="form-control" wire:model="nombre">
            </div>

            <div class="form-group col-4">
                <label for="" class="form-label">Dirección:</label>
                <input type="text" class="form-control" wire:model="direccion">
            </div>

            <div class="form-group col-4">
                <label for="" class="form-label">Capacidad:</label>
                <input type="number" step="0.01" class="form-control" wire:model="capacidad">
            </div>
        </div>

        <button wire:submit.prevent="submit" type="submit" class="btn btn-info float-right">
            Agregar Almacen
        </button>
    </form>
</div>
