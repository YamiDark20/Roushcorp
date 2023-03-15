<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Factura;
use App\Models\Compra;
use App\Models\Cliente;
use App\Models\Almacen;
use App\Models\Venta;
use Carbon\Carbon;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('reporte.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $clienteId, int $almacenId)
    {
        //
    }
    public function showGeneral($id)
    {
        //
    }

    public function showById(int $clienteId, string $startDate, string $endDate)
    {

        $startDate = Carbon::parse($startDate);
        $endDate = Carbon::parse($endDate);
        $reporteCliente = Factura::whereIn('venta_id', function($query) use ($clienteId, $startDate, $endDate) {
            $query->select('id')
                ->from((new Venta())->getTable())
                ->where('cliente_id', $clienteId)
                ->whereBetween('created_at', [$startDate, $endDate]);
        })->get();
        return $reporteCliente;
    }

}
