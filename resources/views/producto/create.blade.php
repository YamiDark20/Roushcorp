@extends('dash.index');

@section('title', 'Registrar productos')

@section('content_header')
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="/dash">Inicio</a></li>
        <li class="breadcrumb-item"><a href="/productos">Productos</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">Agregar</a></li>
    </ol>
</nav>
@endsection

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>No se han colocado nada en ninguno de los campos o el codigo del producto ya existe.</strong>
        </div>
    @endif
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4>Agregar producto</h4>
                </div>

                <form action="/productos" method="POST">
                    @csrf
                    <div class="row">

                        <div class="form-group col-4">
                            <label for="" class="form-label">Codigo</label>
                            <input id="codigo" name="codigo" type="text" class="form-control" >
                        </div>

                        <div class="form-group col-4">
                            <label for="" class="form-label">Nombre</label>
                            <input id="nombre" name="nombre" type="text" class="form-control" >
                        </div>

                        <div class="form-group col-4">
                            <label for="" class="form-label">Marca</label>
                            <input id="marca" name="marca" type="text" class="form-control" >
                        </div>

                        <div class="form-group col-4">
                            <label for="" class="form-label">Peso</label>
                            <input id="peso" name="peso" type="number" class="form-control" >
                        </div>

                        <div class="form-group col-4">
                            <label for="" class="form-label">Cantidad</label>
                            <input id="cantidad" name="cantidad" type="number" class="form-control" >
                        </div>

                        <div class="form-group col-4">
                            <label for="" class="form-label">Precio</label>
                            <input id="precio" name="precio" type="text" step="any" value="0.00" class="form-control" >
                        </div>

                        <div class="form-group col-6">
                            <label for="" class="form-label">Descripcion</label>
                            <textarea id="descripcion" name="descripcion" type="text" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label d-block">Exonerado</label>
                            <div class="btn-group btn-group-toggle d-block" data-toggle="buttons">
                                <div class="btn btn-primary">
                                    <input type="radio" name="exonerado" value="0" autocomplete="off" class="btn-check" checked>Sin IVA
                                </div>
                                <div class="btn btn-primary">
                                    <input type="radio" name="exonerado" value="1" autocomplete="off" class="btn-check">Con IVA
                                </div>

                            </div>
                        </div>


                    </div>


                    <div>
                        <a href="/productos" class="btn btn-secondary" >Cancelar</a>
                        <button type="submit" class="btn btn-info" >Guardar</button>
                    </div>


            </div>

        </div>

    </div>



@endsection
