<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Reporte</title>
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
                width: 40%;
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
                        Reporte<br>
                        Generado por: {{ Auth::user()->name }} <br>
                        {{ $fecha_formateada }}<br />
                    </th>
                </thead>
            </table>
            <br />
        </header>
        <br>
        <main>
            @if($nombre_cliente)
                <div><b>Cliente: </b>{{ $nombre_cliente }}</div><br>
            @endif
            <div><b>Fecha Inicio: </b>{{ $fecha_inicio_formateada }}</div><br>
            <div><b>Fecha Fin: </b>{{ $fecha_fin_formateada }}</div><br>

            <table class="table table-bordered">
                <thead>
                    <th scope='col' class="text-sm">ID</th>
                    <th scope='col' class="text-sm">Valor Compra</th>
                    <th scope='col' class="text-sm">Cancelado</th>
                    <th scope='col' class="text-sm">Por Cancelar</th>
                    <th scope='col' class="text-sm">Vuelto</th>
                    <th scope='col' class="text-sm">Estado</th>
                    <th scope='col' class="text-sm">Cliente</th>
                    <th scope='col' class="text-sm">Vendedor</th>
                    <th scope='col' class="text-sm">Fecha</th>
                </thead>

                <tbody>
                    @foreach ($results as $venta)
                        <tr>
                            <td class="text-sm">{{ $venta ->id}}</td>
                            <td class="text-sm">{{ $venta ->valor_compra_formateado}}</td>
                            <td class="text-sm">{{ $venta ->cancelado_formateado}}</td>
                            <td class="text-sm">{{ $venta ->por_cancelar_formateado}}</td>
                            <td class="text-sm">{{ $venta ->vuelto_formateado}}</td>
                            <td class="text-sm">{{ $venta ->estado }}</td>
                            <td>
                                {{ $venta ->cliente->name }}
                            </td>
                            <td>
                                {{ $venta ->vendedor->name }}
                            </td>
                            <td>
                                {{ $venta -> created_at }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </main>
    </body>
</html>