<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListaProductosValidos;


class ListaProductosValidosController extends Controller
{
    protected $lista;

    public function create(string $request)
    {
        try {
            
            DB::beginTransaction();
            $lista = ListaProductosValidos::create([
                'nombre_del_producto'=> $request['nombre_del_producto'],
            ]);

            DB::commit();
        } catch (\Throwable $th) {
            throw $th;
            DB::rollback();
        }

        $response = [
            'lista' => $lista,
        
        ];

    }

    public function list(int $userId)
    {
        $financialOrganizationsList = DB::table('lista_de_productos_validos')
                                      ->orderBy('name');

        return   $financialOrganizationsList;
    }

}