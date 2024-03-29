@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1><b>Bienvenido {{ Auth::user()->name }} 💸</b></h1>
@stop

@section('content')
  <div class="d-flex flex-wrap">

    @can('Gestionar Clientes')
      <a href="{{ route('customers.index') }}">
        <div class="contenedor" id="uno">
          <i class="fas fa-users icon fix-padding"></i>
          <p class="texto">Clientes</p>
        </div>
      </a>
    @endcan

    @can("Gestionar Productos")
      <a href="/productos">
        <div class="contenedor" id="dos">
          <i class="fa fa-box icon"></i>
          <p class="texto">Productos</p>
        </div>
      </a>
    @endcan

    @can("Gestionar Cobros")
      <a href="{{ route('cobros.index') }}">
        <div class="contenedor" id="tres">
          <i class="fas fa-fw fa-book icon"></i>
          <p class="texto">Cobros</p>
        </div>
      </a>
    @endcan

    @can("Gestionar Ventas")
      <a href="{{ route('ventas.index') }}">
        <div class="contenedor" id="cuatro">
          <i class="fas fa-fw fa-cash-register icon"></i>
          <p class="texto">Ventas</p>
        </div>
      </a>
    @endcan

    @can("Gestionar Reportes")
      <a href="{{ route('reportes.index') }}">
        <div class="contenedor" id="cinco">
          <i class="fas fa-fw fa-file icon"></i>
          <p class="texto">Reportes</p>
        </div>
      </a>
    @endcan

    @can("Gestionar Compras")
      <a href="{{ route('compra.index') }}">
        <div class="contenedor" id="seis">
          <i class="fas fa-fw fa-shopping-cart icon fix-padding"></i>
          <p class="texto">Compras</p>
        </div>
      </a>
    @endcan

    @can("Gestionar Inventario")
      <a href="{{ route('almacen.index') }}">
        <div class="contenedor" id="siete">
          <i class="fas fa-fw icon fa-warehouse fix-padding"></i>
          <p class="texto">Almacenes</p>
        </div>
      </a>
    @endcan

    @can("Super Admin")
      <a href="{{ route('usuarios.index') }}">
        <div class="contenedor" id="ocho">
          <i class="fas fa-fw icon fa-user"></i>
          <p class="texto">Usuarios</p>
        </div>
      </a>
    @endcan

  </div>

  <div class="mt-3">
    @livewire('tasa-dia')
  </div>

@stop

@section('css')

<style>

  @import url("https://fonts.googleapis.com/css?family=Roboto:400,400i,700");
  @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");

i.icon {
  color: white;
}

i.icon.fix-padding {
  padding-left: 15px;
}

div.contenedor{
  width:200px;
  height: 200px;
  float: left;
}
div#uno{
  background-color: rgb(208, 101, 3)
}
div#dos{
  background-color: rgb(233, 147, 26)
}
div#tres{
  background-color: rgb(22, 145, 190)
}
div#cuatro{
  background-color: rgb(22, 107, 162)
}
div#cinco{
  background-color: rgb(27, 54, 71)
}
div#seis{
  background-color: rgb(21, 40, 54)
}

div#siete{
  background-color: rgb(109, 3, 128)
}

div#ocho{
  background-color: rgb(202, 43, 230)
}


i.icon{
  color: white;
  font-size: 1.4em;
  display: block;
  margin: 50px auto;
  background-color: rgba(255, 255, 255, .15);
  width: 60px;
  padding: 20px;
  border-radius: 50%;
  box-shadow: 0px 0px 0px 30px rgba(255, 255, 255, 0);
  transition:box-shadow .4s;
}

p.texto{
  font-family:Helvetica, sans-serif;
  font-size: 1.2em;
  color: white;
  text-align: center;
  opacity: .5;
  transition: .4s;
  font-weight: bolder;
}

div.contenedor:hover p.texto{
  opacity: 1;
}

div.contenedor:hover i.icon{
  box-shadow: 0px 0px 0px 0px rgba(255255, 255, 255, .6);
}

  .btn-circle.btn-xl {
    width: 100px;
    height: 100px;
    padding: 10px 16px;
    border-radius: 50px;
    font-size: 24px;
    line-height: 1.33;
}


.btn-circle {
    width: 30px;
    height: 30px;
    padding: 6px 0px;
    border-radius: 15px;
    text-align: center;
    font-size: 12px;
    line-height: 1.42857;
}

.btn-xl {
    width: 150px;
    height: 50px;
    font-size: 23px;
    text-align: center;
    border-radius: 10px;
}

</style>

@stop

