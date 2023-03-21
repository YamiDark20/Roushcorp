<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TasaDia extends Model
{
    use HasFactory;

    protected $table = 'cambio_divisa';

    protected $fillable = ['tasa',];
}
