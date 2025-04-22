<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    
    use HasFactory;

    protected $table = 'venta';

    protected $fillable = [
        'cajaregistradora',
        'producto',
        'lugar',
        'hora',
        'fecha',
        'estado'
    ];
    
}
