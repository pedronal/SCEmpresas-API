<?php

namespace routes;

use App\Http\Controllers\EmpreendimentosController;
use Illuminate\Support\Facades\Route;

Route::prefix('empreendimentos')->group(function () {

    Route::get('/', [EmpreendimentosController::class, 'getLista']);

    Route::get('/{id}', [EmpreendimentosController::class, 'buscaPorId']);

    Route::post('/', [EmpreendimentosController::class, 'adiciona']);

    Route::put('/{id}', [EmpreendimentosController::class, 'atualiza']);

    Route::delete('/{id}', [EmpreendimentosController::class, 'remover']);

});
