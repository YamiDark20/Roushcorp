<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use App\Models\Movimiento;
use App\Models\Compra;
use App\Models\Almacen;
// use App\Models\MovimientoAlmacen;
use App\Models\User;

class ListaCompraAlm extends Component
{
    public $codalm = '0', $search, $compras, $comprasalm, $almacenes;
    // , $movimientos, $compras, $movalmacenes, $comprasalm;

    public function mount(){
        $this->compras = Compra::all();
        $this->almacenes = Almacen::all();
        // $this->movimientos = Movimiento::all();
        // $this->movalmacenes = MovimientoAlmacen::all();
        $this->comprasalm = [];
        // $indexcodalm = $indexcodmov = "";
        // foreach ($this->movalmacenes as $movalmacen) {
        //     if ($this->comprasalm == []) {
        //         if ($movalmacen->codalm == $this->codalm) {
        //             foreach ($this->movimientos as $movimiento) {
        //                 if ($movimiento->codmov == $movalmacen->codmov) {
        //                     foreach ($this->compras as $compra) {
        //                         if ($compra->codcompra == $movimiento->codcompra) {
        //                             $this->comprasalm[] = array($movimiento->codcompra,
        //                             $movalmacen->codmov, $movimiento->tipomov,
        //                             $movimiento->fecha, $compra->proveedor,
        //                             $compra->total, $compra->impuesto);
        //                             break;
        //                         }
        //                     }
        //                     break;
        //                 }
        //             }
        //         }
        //     }else{
        //         if ($movalmacen->codalm == $this->codalm) {
        //             foreach ($this->movimientos as $movimiento) {
        //                 if ($movimiento->codmov == $movalmacen->codmov) {
        //                     $existe = False;
        //                     foreach ($this->comprasalm as $compraalm) {
        //                         if ($compraalm[0] == $movimiento->codcompra) {
        //                             $existe = True;
        //                             break;
        //                         }
        //                     }
        //                     if ($existe == False) {
        //                         foreach ($this->compras as $compra) {
        //                             if ($compra->codcompra == $movimiento->codcompra) {
        //                                 $this->comprasalm[] = array($movimiento->codcompra,
        //                                 $movalmacen->codmov, $movimiento->tipomov,
        //                                 $movimiento->fecha, $compra->proveedor,
        //                                 $compra->total, $compra->impuesto);
        //                                 break;
        //                             }
        //                         }
        //                     }
        //                     break;
        //                 }
        //             }
        //         }
        //     }
        // }
    }

    public function render()
    {
        return view('livewire.lista-compra-alm');
    }
}
