<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    use HasFactory;

    public function cliente()
    {
        return $this->belongsTo(Customer::class);
    }

    public function links()
    {
        return "";
    }
}
