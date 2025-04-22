<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registroproducto', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('color');
            $table->string('capacidad');
            $table->string('lectorhuella');
            $table->string('caracteristicas');
            $table->string('sistemaoperativo');
            $table->string('marca');
            $table->string('numeronucleos');
            $table->string('ram');
            $table->string('versionsistemaoperativo');
            $table->string('velocidadprocesador');
            $table->string('tamañopantalla');
            $table->string('resolucionpantalla');
            $table->string('tipopantalla');
            $table->string('tipocamarafrontal');
            $table->string('tipocamaraposterior');
            $table->string('resolucioncamarafrontal');
            $table->string('resolucioncamaraposterior');
            $table->string('resolucionotrascamaras');
            $table->string('flashfrontal');
            $table->string('flashposterior');
            $table->string('reddatos');
            $table->string('espaciossim');
            $table->string('fuentesalimentacionenergias');
            $table->string('opcionesconectividad');
            $table->string('tipospuertosentradassalidas');
            $table->string('capacidadbateria');
            $table->string('resistenciaagua');
            $table->string('garantia');
            $table->string('quenoincluye');
            $table->string('queincluye');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registroproducto');
    }
};
