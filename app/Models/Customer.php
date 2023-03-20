<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable =['name', 'lastname', 'rif', 'address', 'telephone',
    'email', 'city'];

    public function documentos()
    {
        return $this->hasMany(Documento::class);
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'cliente_id', 'id');
    }
}
