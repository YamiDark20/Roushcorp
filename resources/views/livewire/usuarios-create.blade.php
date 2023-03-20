<div>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <strong>
                    {{ $error }}
                </strong>
            </div>
        @endforeach
    @endif
    <div class="d-flex justify-content-between">
        <h4>Agregar Usuario</h4>
    </div>

    <form wire:submit.prevent="submit">
        <div class="row">

            <div class="form-group col-4">
                <label for="" class="form-label">Nombre</label>
                <input wire:model="name" id="name" name="name" type="text" class="form-control" >
            </div>

            <div class="form-group col-4">
                <label for="" class="form-label">Email</label>
                <input wire:model="email" id="email" name="email" type="text" class="form-control" >
            </div>

            <div class="form-group col-4">
                <label for="" class="form-label">Tipo Cobro</label>
                <select wire:model="rol_seleccionado_id" name="rol_seleccionado_id" id="rol_seleccionado_id" class="form-control">
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}">{{ $rol->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div>
            <a href="/usuarios" class="btn btn-secondary" >Cancelar</a>
            <button type="submit" class="btn btn-info" >Guardar</button>
        </div>
    </form>
</div>