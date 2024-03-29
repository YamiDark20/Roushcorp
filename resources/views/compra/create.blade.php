@extends('dash.index');

@section('title', 'Agregar Compra')

@section('content_header')
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="/dash">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{route('compra.index')}}">Compras</a></li>
        <li class="breadcrumb-item active" aria-current="page"><a href="">Agregar Compra</a></li>

    </ol>
</nav>
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
                    <h4>Agregar compra del almacen {{$codalm}}</h4>
                </div>
                @livewire('agregar-compra', ['codalm' => $codalm])
            </div>
        </div>
    </div>
@endsection
