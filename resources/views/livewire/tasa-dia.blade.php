<form wire:submit.prevent="submit">
    <div>
        <h2><b>@can("Super Admin")Gestionar @endcan Tasa Del Día (1$ = {{ $tasa_actual }} Bs.)💸</b></h2>
    </div>
    @can("Super Admin")
        <div class="form-group col-4 mt-2">
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        <strong>
                            {{ $error }}
                        </strong>
                    </div>
                @endforeach
            @endif
            <label class="form-label">Tasa</label>
            <div class="d-flex align-items-center flex-direction-row flex-no-wrap">
                <input type="number" min="1" max="300" name="tasa"
                wire:model="tasa" class="form-control" step=".01">
                <b class="ml-3">Bs./$</b>
            </div>
            <button type="submit" class="btn btn-info mt-3" >Guardar</button>
        </div>
    @endcan
</form>