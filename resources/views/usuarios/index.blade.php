@extends('dash.index');

@section('title', 'Usuarios')

@section('content_header')
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/dash">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">Usuarios</a></li>

    </ol>
</nav>
<h1>Usuarios</h1>
@endsection

@section('content')

    <div class= "col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <div class="d-flex justify-content-between">
                    <h3 class="card-title">Lista de Usuarios</h3>
                    <div class="btn-group">
                        <a href="{{ route("usuarios.create") }}" class="btn btn-warning mb-3">Agregar</a>
                    </div>
                </div>

                @if ($usuarios->count())
                    <div class="table-responsive">
                        <table class="table table-dark table-striped mt-4">
                            <tr>
                                <thead>
                                    <th scope='col'>Id</th>
                                    <th scope='col'>Nombre</th>
                                    <th scope='col'>Email</th>
                                    <th scope='col'>Rol</th>
                                </thead>
                            </tr>

                            <tbody>
                                @foreach ($usuarios as $usuario)
                                    <tr>
                                        <td>{{ $usuario ->id}}</td>
                                        <td>{{ $usuario ->name}}</td>
                                        <td>{{ $usuario ->email}}</td>
                                        <td>{{ $usuario->roles->first()?->name ?? "Sin Rol" }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
