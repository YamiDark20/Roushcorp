<?php

namespace App\Http\Livewire;

use Livewire\Component;
// use App\Models\Movimiento;
use App\Models\Compra;
use App\Models\Guia;
use App\Models\Almacen;
use App\Models\Customer;
// use App\Models\MovimientoAlmacen;
use App\Models\User;
use Livewire\WithPagination;

class ListaCompraAlm extends Component
{
    public $codalm = '0', $search = "", $compras,
    $comprasalm, $almacenes, $guias, $clientes;
    // , $movimientos, $compras, $movalmacenes, $comprasalm;

    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public function mount(){
        $this->compras = Compra::all();
        $this->clientes = Customer::all();
        $this->almacenes = Almacen::all();
        // $this->guias = Guia::all();
        // $this->movimientos = Movimiento::all();
        // $this->movalmacenes = MovimientoAlmacen::all();
        $this->comprasalm = [];
        // foreach ($this->compras as $compra) {
        //     if ($compra->almacen_id == $this->codalm){
        //         // $guia = Guia::find($compra->guias_id);
        //         $cliente = Customer::find($compra->cliente_id);
        //         $this->comprasalm[] = array($compra->id,
        //         $compra->guias_id, $cliente->rif,
        //         $cliente->name, $compra->tipo_pago,
        //         $compra->valor_compra);
        //     }
        // }
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
        // $cliente = Customer::where('rif', 'LIKE', '%'.$this->search.'%');
        // $comprasnav = Compra::where('id', 'LIKE', '%'.$this->search.'%')
        // ->orwhere('almacen_id', 'LIKE', '%'.$this->codalm.'%')->paginate(5);
        // return view('livewire.lista-compra-alm', compact('comprasnav'));
        return view('livewire.lista-compra-alm');
    }
}
