<div>
    <div class="row">
        <div class="col-12">
            <div>
                <a href="{{route('almacen.create')}}"
                class="btn btn-warning mb-3 ml-2 mr-1 d-inline float-right">Crear Almacen</a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-dark table-striped">
                <thead>
                    <tr>
                        <th scope='col'>Nombre</th>
                        <th scope='col'>Dirección</th>
                        <th scope='col'>Vendedor</th>
                        <th scope='col'>Capacidad</th>
                        <th scope='col'>Estado</th>
                        <th scope='col'>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($almacenes as $almacen)
                        <tr>
                            <td>{{ $almacen->nombre }}</td>
                            <td>{{ $almacen->direccion }}</td>
                            <td>{{ $almacen->vendedor->name }}</td>
                            <td>{{ $almacen->capacidad }}</td>
                            <td>{{ $almacen->estado }}</td>
                            <td>
                                <a href="/almacen/{{$almacen->id}}" class = 'btn btn-sm btn-info'><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
