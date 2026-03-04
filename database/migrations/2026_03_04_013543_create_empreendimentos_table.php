<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{    public function up(): void
    {
        Schema::create('empreendimentos', function (Blueprint $table) {
            $table->id('empreendimentos_id');
            $table->string('nome');
            $table->string('empreendedor');
            $table->string('municipio');
            $table->integer('id_segmento');
            $table->string('contato');
            $table->boolean('status')->default(true);
            $table->timestamps();
            $table->boolean('flag_oculto')->default(false);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empreendimentos');
    }
};
