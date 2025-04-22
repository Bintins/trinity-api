<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registroproducto extends Model
{
    use HasFactory;

    protected $table = 'registroproducto';

    protected $fillable = [
        'nombre',
        'color',
        'capacidad',
        'lectorhuella',
        'caracteristicas',
        'sistemaoperativo',
        'marca',
        'numeronucleos',
        'ram',
        'versionsistemaoperativo',
        'velocidadprocesador',
        'tamañopantalla',
        'resolucionpantalla',
        'tipopantalla',
        'tipocamarafrontal',
        'tipocamaraposterior',
        'resolucioncamarafrontal',
        'resolucioncamaraposterior',
        'resolucionotrascamaras',
        'flashfrontal',
        'flashposterior',
        'reddatos',
        'espaciossim',
        'fuentesalimentacionenergias',
        'opcionesconectividad',
        'tipospuertosentradassalidas',
        'capacidadbateria',
        'resistenciaagua',
        'garantia',
        'quenoincluye',
        'queincluye'
    ];
}
