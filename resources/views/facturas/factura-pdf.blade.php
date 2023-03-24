<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Factura - {{ $venta->id }}</title>
        <style>
            * {
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;
            }

            h1,h2,h3,h4,h5,h6,p,span,div { 
                font-family: DejaVu Sans; 
                font-size:10px;
                font-weight: normal;
            }

            th,td { 
                font-family: DejaVu Sans; 
                font-size:10px;
            }

            .panel {
                margin-bottom: 20px;
                background-color: #fff;
                border: 1px solid transparent;
                border-radius: 4px;
                -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
                box-shadow: 0 1px 1px rgba(0,0,0,.05);
            }

            .panel-default {
                border-color: #ddd;
            }

            .panel-body {
                padding: 15px;
            }

            table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 0px;
                border-spacing: 0;
                border-collapse: collapse;
                background-color: transparent;

            }

            thead  {
                text-align: left;
                display: table-header-group;
                vertical-align: middle;
            }

            th, td  {
                border: 1px solid #ddd;
                padding: 6px;
            }

            .well {
                min-height: 20px;
                padding: 19px;
                margin-bottom: 20px;
                background-color: #f5f5f5;
                border: 1px solid #e3e3e3;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
                box-shadow: inset 0 1px 1px rgba(0,0,0,.05);
            }

            .logo-name {
                color: orange;
                font-size: 30px;
                font-weight: 700;
                margin-bottom: 0.25rem;
            }

            .encabezado {
                display: grid;
                grid-template-columns: 20% auto 30%;
            }

            .imagen {
                width: 20%;
            }

            .imagen img {
                width: 100px;
            }

            .text {
                text-align: left;
            }

            .fecha {
                width: 30%;
                text-align: right;
            }

            .no-borders th {
                border: none;
            }

        </style>
    </head>
    <body>
        <header>
            <table class="no-borders">
                <thead>
                    <th class="imagen">
                        <img src="img/LogoRoushCorp.png" alt="logo">
                    </th>
                    <th class="text">
                        <h1 class="logo-name">RoushCorp</h1>
                        <span>Via Alterna, Universidad De Oriente, Departamento Computación y Sistemas</span><br>
                        <span>Tlf: 0281-1234567</span><br>
                        <a href="mailto:ventas@roushcorp.com">ventas@roushcorp.com</a><br>
                        <a href="https://www.roushcorp.com">roushcorp.com</a><br>
                    </th>
                    <th class="fecha">
                        {{ $fecha_formateada }}<br />
                        @if ($venta->id)
                            <b>Venta #: </b> {{ $venta->id }}
                        @endif
                    </th>
                </thead>
            </table>
            <br />
        </header>
        <br>
        <main>
            <div style="clear:both; position:relative;">
                <div>
                    <h4>Facturar a:</h4>
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <b>ID:</b> {{ $venta->cliente->id }}<br />
                            <b>Nombre:</b> {{ $venta->cliente->name }}<br />
                            <b>RIF:</b> {{ $venta->cliente->rif }}<br />
                            <b>Tlf:</b> {{ $venta->cliente->telephone }}<br />
                            <b>Email:</b> <a href="mailto:{{ $venta->cliente->email }}">{{ $venta->cliente->email }}</a><br />
                            <b>Ciudad:</b> {{ $venta->cliente->city }}<br />
                            <b>Dirección:</b> {{ $venta->cliente->address }}<br />
                        </div>
                    </div>
                </div>
            </div>
            <h4>Productos:</h4>
            <table class="table table-bordered">
                <thead>
                    <th>Codigo</th>
                    <th>Nombre</th>
                    <th>Almacen</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>IVA</th>
                    <th>Total</th>
                </thead>

                <tbody>
                    @foreach ($venta->facturas as $factura)
                        <tr>
                            <td>{{$factura->producto->codigo}}</td>
                            <td>{{$factura->producto->nombre}}</td>
                            <td>{{$factura->almacen->nombre}}</td>
                            <td>{{$factura->cantidad_producto}}</td>
                            <td>{{$factura->precio_producto_formateado}}</td>
                            <td>{{$factura->iva_producto_formateado}}</td>
                            <td>{{$factura->total_producto_formateado}}</td>
                        </tr>
                    @endforeach
                </tbody>


            </table>

            <div style="clear:both; position:relative;">
                <div style="margin-left: 300pt;">
                    <h4>Total:</h4>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><b>Subtotal</b></td>
                                <td>{{ $venta->subtotal_formateado }}</td>
                            </tr>
                            <tr>
                                <td><b>IVA</b></td>
                                <td>{{ $venta->iva_formateado }}</td>
                            </tr>
                            <tr>
                                <td><b>TOTAL</b></td>
                                <td><b>{{ $venta->valor_compra_formateado }}</b></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </main>
    </body>
</html>