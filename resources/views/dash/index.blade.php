@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Roushcorp</h1>
@stop

@section('content')
    {{-- <p>Welcome to this beautiful admin panel.</p> --}}
   <div class="d-flex">

    <div class="mr-3">
    <a href="{{ route('productos.index') }}" class="btn btn-danger btn-xl">
      <i class="fa fa-heart small"></i>
      Productos
    </a>
    </div>

    <div class="mr-3">
      <a href="{{ route('customers.index') }}" class="btn btn-primary btn-xl">
      <i class="fa fa-user small"></i>
      Clientes
      </a>
    </div>


    <div class="mr-3">
      <a href="{{ route('ventas.index') }}" class="btn btn-success btn-xl">
      <i class="fa fa-user small"></i>
      Ventas
      </a>
    </div>

    <div class="mr-3">
      <a href="{{ route('reportes.index') }}" class="btn btn-secondary btn-xl">
      <i class="fa fa-file small"></i>
      Reporte
      </a>
    </div>

    <div class="mr-3">
      <a href="#" class="btn btn-info btn-xl">
      <i class="fa fa-heart small"></i>
      Compras
      </a>
    </div>
    
{{-- Botones con animacion --}}
    {{-- <a href="/productos">
      <div class="contenedor" id="uno">
      <i class="fa fa-user icon"></i>
        <p class="texto">productos</p>
      
      </div>
    </a>

    <a href="{{ route('customers.index') }}">
      <div class="contenedor" id="dos">
        <i class="fa fa-heart icon"></i>
        <p class="texto">clientes</p>
      </div>
    </a> --}}

  </div>

@stop

@section('css')

<style>

  @import url("https://fonts.googleapis.com/css?family=Roboto:400,400i,700");
  @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");


div.contenedor{
  width:200px;
  height: 200px;
  float: left;
  transition: height .4s;  
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

i.icon{
  font-size: 1.5em;
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
  font-size: 1.2em;
  color: white;
  text-align: center;
  padding-top: 10px;
  opacity: .5;
  transition: .4s;
}
div.contenedor:hover{
  height: 230px;
}

div.contenedor:hover p.texto{
  padding-top: 30px;
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

/* .contenedor{
  width: 50px;
  right: 8px;
  z-index: 999;
}

.botonHover {
    width: 31px;
    height: 45px;
    background: coral;
    border-radius: 5%;
    font-size: 23px;
    position: fixed;
    border: none;
    color: #FFF;
    transition: .3s;
    margin-bottom: 250px;
}

.botonHover:hover{
  width: 150px;
}

.botonHover:hover .ocul{
  visibility: visible;
}

.ocul{
  visibility: hidden;
}

a:hover .ocul{
  visibility:visible ;
}
 */


</style>

@stop

