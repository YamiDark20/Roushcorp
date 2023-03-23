
<tr>
    <td>{{ $this->producto_obj->codigo }}</td>
    <td>{{ $this->producto_obj->nombre }} </td>
    <td>{{ $this->producto_obj->marca }} </td>
    <td>{{ $this->producto_almacen->almacen->nombre }} </td>
    <td>
        <input type="number" min="1" max="{{ $this->producto['max_cantidad'] }}" id="producto.cantidad" name="producto.cantidad" wire:model="producto.cantidad" class="form-control">
    </td>
    <td>{{ $this->producto_obj->precio }} </td>
    <td>{{ $this->iva_divisas }} </td>
    <td>{{ $this->total_divisas }} </td>
    <td>
        <button type="button" class="btn btn-danger" wire:click="handleEliminarProducto">Eliminar</button>
    </td>
</tr>
