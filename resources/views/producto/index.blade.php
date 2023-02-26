@extends('dash.index');

@section('title', 'Productos')

@section('content_header')
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dash">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">Productos</a></li>

    </ol>
</nav>
<h1>Productos</h1>
@endsection

@section('content')

    <div class= "col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                
                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Lista de productos</h3>
                    <div class="btn-group">
                        <a href="productos\create" class="btn btn-warning mb-3 mr-5"> +Agregar</a>
                           
                        <a class="btn" href="#"> <i class=" fas fa-download"></i>Exportar</a>
                       
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-dark table-striped mt-4">
                        <tr>
                            <thead>
                                <th scope='col'>ID</th>
                                <th scope='col'>CODIGO</th>
                                <th scope='col'>NOMBRE</th>
                                <th scope='col'>MARCA</th>
                                <th scope='col'>PESO</th>
                                <th scope='col'>DESCRIPCION</th>
                                <th scope='col'>CANTIDAD</th>
                                <th scope='col'>PRECIO</th>
                                <th scope='col'>EXONERADO</th>
                                <th scope='col'>ACCIONES</th>
                            </thead>
                        </tr>
                    
                        <tbody>
                            @foreach ($productos as $producto)
                                <tr>
                                    <td>{{ $producto ->id}}</td>
                                    <td>{{ $producto ->codigo}}</td>
                                    <td>{{ $producto ->nombre}}</td>
                                    <td>{{ $producto ->marca}}</td>
                                    <td>{{ $producto ->peso}}</td>
                                    <td>{{ $producto ->descripcion}}</td>
                                    <td>{{ $producto ->cantidad}}</td>
                                    <td>{{ $producto ->precio}}</td>
                                    @if ($producto ->exonerado == 0)
                                    <td>No</td>
                                    @endif
                                    @if ($producto ->exonerado == 1)
                                    <td>Si</td>
                                    @endif
                                    
                                    <td>
                                        <a href="/productos/{{$producto->id}}/edit" class = 'btn btn-info'><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>

            </div>


        </div>


    </div>

@endsection