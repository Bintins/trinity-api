<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;

    protected $table = 'categoria';

    protected $fillable = [
        'nombre',
        'tamaño',
        'marca',
        'color',
        'material',
        'procesador',
        'RAM',
        'almacenamiento',
    ];
}