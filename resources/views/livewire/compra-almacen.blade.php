<div>
    <div class="row">

        <div class="form-group col-4 mt-2">
            <label class="form-label">Codigo Almacen</label>
            <input type="text" name="codalm" value="{{$codalm}}"
            class="form-control" readonly>
        </div>

        <div class="form-group col-4 mt-2">
            <label class="form-label">Codigo Compra</label>
            <input type="text" name="codcompra" wire:model="codcompra"
            class="form-control" readonly>
        </div>

        <div class="form-group col-4 mt-2">
            <label class="form-label">Proveedor</label>
            <input wire:model="proveedor" name="proveedor"
            type="text" class="form-control" readonly>
        </div>

        <div class="form-group col-4 mt-2">
            <label class="form-label">Fecha</label>
            <input wire:model="fecha" name="fecha"
            type="date" class="form-control" readonly>
        </div>

        <div class="form-group col-4 mt-2">
            <label class="form-label">Moneda</label>
            <select name="moneda" wire:model="moneda"
            class="form-control" disabled="True" readonly>
                <option value="">---------</option>
                <option value="$">Dolar ($)</option>
                <option value="Bs">Bolivar (Bs)</option>
                <option value="€">Euro (€)</option>
            </select>
        </div>

        <div class="form-group col-4 mt-2">
            <label class="form-label">Guia de Mov.</label>
            <input type="text" name="guiamov" wire:model="guiamov"
            class="form-control" readonly>
        </div>

        <div class="form-group col-4 mt-2">
            <label class="form-label">Tipo de Mov.</label>
            <select name="tipomov" wire:model="tipomov"
            class="form-control" disabled="True" readonly>
                <option value="0">---------</option>
                <option value="Terrestre">Terrestre</option>
                <option value="Aereo">Aereo</option>
                <option value="Maritimo">Maritimo</option>
            </select>
        </div>

        <div class="form-group col-4 mt-2">
            <label class="form-label">Impuesto</label>
            <input type="number" min="1" max="100" name="impuesto"
            wire:model="impuesto" class="form-control" readonly>
        </div>

        <div class="col-12">
            <h4 class="h5">Lista de productos agregados</h4>
        </div>

        @if ($prodcomprados == [])
            <div class="col-12 alert alert-info">
                <strong>No se han agregado ningun producto a la lista.</strong>
            </div>
        @else
            <div class="table-responsive mt-3">
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope='col'>CodProd</th>
                            <th scope='col'>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prodcomprados as $prod)
                            <tr>
                                <td>{{$prod[0]}}</td>
                                <td>{{$prod[1]}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col-12">
                <label for="" class="float-right">Impuesto: {{$moneda}} {{$this->total * ($this->impuesto / 100)}}</label>
            </div>
            <div class="col-12">
                <label for="" class="float-right">Total: {{$moneda}} {{$total + ($this->total * ($this->impuesto / 100))}}</label>
            </div>
        @endif
    </div>

</div>
