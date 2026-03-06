<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('segmentos', function (Blueprint $table) {
            $table->id('segmentos_id');
            $table->string('nome');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('segmentos');
    }
};
