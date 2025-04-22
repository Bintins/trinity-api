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
        Schema::create('stock', function (Blueprint $table) {
            $table->id();
            $table->string('tecno');
            $table->string('xiaomi');
            $table->string('oppo');
            $table->string('huawei');
            $table->string('samsung');
            $table->string('iphone');
            $table->string('motorola');
            $table->string('poco');
            $table->string('asus');
            $table->string('razer');
            $table->string('lenovo');
            $table->string('hp');
            $table->string('acer');
            $table->string('apple');
            $table->string('componentetec');
            $table->string('componentexia');
            $table->string('componenteoppo');
            $table->string('componentehua');
            $table->string('componentesam');
            $table->string('componenteiph');
            $table->string('componentemoto');
            $table->string('componentepoco');
            $table->string('componenteasus');
            $table->string('componenterazer');
            $table->string('componenteleno');
            $table->string('componentehp');
            $table->string('componenteacer');
            $table->string('componenteapple');
            $table->string('equiobsoletos');
            $table->string('componbsoletos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stock');
    }
};
