@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
    <h1>Roushcorp</h1>
@stop

@section('content')
    {{-- <p>Welcome to this beautiful admin panel.</p> --}}
   <div class="d-flex">
   
    <div class="mr-3"> 
    <a href="/productos" class="btn btn-danger btn-xl">
      <i class=" ocul-ico fa fa-heart">&nbsp;Productos</i>
    </a>
    </div>

    <div class="mr-3"> 
      <a href="#" class="btn btn-primary btn-xl">
      <i class="fa fa-user">&nbsp;Clientes  </i>
      </a>
    </div>

    
    <div class="mr-3"> 
      <a href="#" class="btn btn-success btn-xl">
      <i class="fa fa-user">&nbsp;Ventas  </i>
      </a>
    </div>

    <div class="mr-3"> 
      <a href="#" class="btn btn-info btn-xl">
      <i class="fa fa-heart">&nbsp;Compras  </i>
      </a>
    </div>

  </div>

@stop

@section('css')

<style>
  
  @import url("https://fonts.googleapis.com/css?family=Roboto:400,400i,700");
  @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css");
  
  
  
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
;
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

@section('js')
    <script> console.log('Hi!'); </script>
@stop