<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registro extends Model
{
    use HasFactory;

    protected $table = 'registro';

    protected $fillable = [
        'tipodocumento',
        'nrodocumento',
        'primernombre',
        'segundonombre',
        'primerapellido',
        'segundoapellido',
        'fechaexpedicion',
        'fechanacimiento',
        'nrocelular',
        'correo',
        'contraseña'
    ];
}
