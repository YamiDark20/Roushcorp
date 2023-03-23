<?php

namespace App\Http\Controllers;
use App\Models\Almacen;

class AlmacenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('almacen.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('almacen.create');
    }
    public function show($id)
    {
        $almacen = Almacen::find($id);
        $productos_almacen = $almacen->productos_almacen;
        return view('almacen.show', compact('almacen', 'productos_almacen'));
    }

}
