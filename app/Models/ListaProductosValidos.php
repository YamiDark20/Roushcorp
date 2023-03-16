<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListaProductosValidos extends Model
{
    use HasFactory;

    protected $table = 'almacenxs';

    protected $fillable = ['nombre_del_producto'];
}