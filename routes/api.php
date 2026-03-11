<?php

namespace routes;

use App\Http\Controllers\EmpreendimentosController;
use App\Http\Controllers\SegmentosController;
use Illuminate\Support\Facades\Route;

Route::prefix('empreendimentos')->group(function () {

    Route::get('/', [EmpreendimentosController::class, 'getLista']);

    Route::get('/{id}', [EmpreendimentosController::class, 'buscaPorId']);

    Route::post('/', [EmpreendimentosController::class, 'adiciona']);

    Route::put('/', [EmpreendimentosController::class, 'atualiza']);

    Route::delete('/{id}', [EmpreendimentosController::class, 'remove']);
});

Route::prefix('segmentos')->group(function () {

    Route::get('/', [SegmentosController::class, 'getLista']);
});
