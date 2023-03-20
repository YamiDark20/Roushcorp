@extends('dash.index');

@section('title', 'Editar producto')

@section('content_header')
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dash">Inicio</a></li>
        <li class="breadcrumb-item"><a href="/productos">Productos</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">Editar</a></li>

    </ol>
</nav>
<h1></h1>
@endsection

@section('content')
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                <strong>
                    {{ $error }}
                </strong>
            </div>
        @endforeach
    @endif
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4>Editar producto</h4>
                </div>

                <form action="/productos/{{$producto->id}}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        <div class="mb-3 col-4">
                            <label for="" class="form-label">Codigo</label>
                            <input id="codigo" name="codigo" type="text" value="{{$producto->codigo}}" class="form-control" readonly>
                        </div>

                        <div class="mb-3 col-4">
                            <label for="" class="form-label">Nombre</label>
                            <input id="nombre" name="nombre" type="text" value="{{$producto->nombre}}" class="form-control">
                        </div>

                        <div class="mb-3 col-4">
                            <label for="" class="form-label">Marca</label>
                            <input id="marca" name="marca" type="text" value="{{$producto->marca}}" class="form-control">
                        </div>

                        <div class="mb-3 col-4">
                            <label for="" class="form-label">Peso</label>
                            <input id="peso" name="peso" type="number" min="1" value="{{$producto->peso}}" class="form-control">
                        </div>

                        <div class="mb-3 col-4">
                            <label for="" class="form-label">Cantidad</label>
                            <input id="cantidad" name="cantidad" type="number" min="1" value="{{$producto->cantidad}}" class="form-control">
                        </div>

                        <div class="mb-3 col-4">
                            <label for="" class="form-label">Precio</label>
                            <input id="precio" name="precio" type="text" step="any" value="{{$producto->precio}}" class="form-control">
                        </div>

                        <div class="mb-3 col-6">
                            <label for="" class="form-label">Descripcion</label>
                            <input id="descripcion" name="descripcion" type="text" value="{{$producto->descripcion}}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="" class="form-label d-block">Exonerado</label>
                            <div class="btn-group btn-group-toggle d-block" data-toggle="buttons">
                                @if ($producto->exonerado == 0)
                                    <div class="btn btn-primary">
                                        <input type="radio" name="exonerado" value="1" autocomplete="off" class="btn-check" checked>Sin IVA
                                    </div>
                                    <div class="btn btn-primary">
                                        <input type="radio" name="exonerado" value="0" autocomplete="off" class="btn-check">Con IVA
                                    </div>
                                @else
                                    <div class="btn btn-primary">
                                        <input type="radio" name="exonerado" value="1" autocomplete="off" class="btn-check">Sin IVA
                                    </div>
                                    <div class="btn btn-primary">
                                        <input type="radio" name="exonerado" value="0" autocomplete="off" class="btn-check" checked>Con IVA
                                    </div>
                                @endif

                            </div>
                        </div>

                    </div>

                    <div>
                        <a href="/productos" class="btn btn-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-info">Guardar</button>
                    </div>
                </form>
            </div>


        </div>


    </div>


@endsection
