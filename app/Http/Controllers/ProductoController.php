<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::all();
        return view('producto.index')->with('productos', $productos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('producto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:productos',
            'nombre' => 'required',
            'marca' => 'required',
            'peso' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
            'exonerado' => 'required'
        ]);
        Producto::create($request->all());
        return redirect()->route('productos.index');

        // $productos = new Producto();

        // $productos->codigo = $request->get('codigo');
        // $productos->nombre = $request->get('nombre');
        // $productos->marca = $request->get('marca');
        // $productos->peso = $request->get('peso');
        // $productos->descripcion = $request->get('descripcion');
        // $productos->cantidad = $request->get('cantidad');
        // $productos->precio = $request->get('precio');
        // $productos->exonerado = $request->get('exonerado');

        // $productos->save();

        // return redirect('/productos');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $producto = Producto::find($id);
        return view('producto.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $producto = Producto::find($id);
        return view('producto.edit')->with('producto', $producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'codigo' => "required|unique:productos,codigo,$id",
            'nombre' => 'required',
            'marca' => 'required',
            'peso' => 'required',
            'descripcion' => 'required',
            'cantidad' => 'required',
            'precio' => 'required',
            'exonerado' => 'required'
        ]); 
        $producto = Producto::find($id);

        $producto->codigo = $request->get('codigo');
        $producto->nombre = $request->get('nombre');
        $producto->marca = $request->get('marca');
        $producto->peso = $request->get('peso');
        $producto->descripcion = $request->get('descripcion');
        $producto->cantidad = $request->get('cantidad');
        $producto->precio = $request->get('precio');
        $producto->exonerado = $request->get('exonerado');

        $producto->save();

        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
