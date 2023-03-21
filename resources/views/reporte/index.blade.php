@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
    <nav>
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/dash">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page"><a href="">Reporte</a></li>
        </ol>
    </nav>
@endsection

@section('content')

    @livewire('reporte-index')

@stop


{{-- @extends('dash.index');

@section('title', 'Reporte')

@section('content_header')
<nav>
    <ol class="breadcrumb">
        <li class="breadcrumb-item "><a href="/dash">Inicio</a></li>
        <li class="breadcrumb-item"><a href="{{route('compra.almacen')}}">Reporte</a></li>
    </ol>
</nav>
@endsection

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <h4>Reporte</h4>
                </div>
                @livewire('reporte-index')
            </div>
        </div>
    </div>
@endsection --}}
