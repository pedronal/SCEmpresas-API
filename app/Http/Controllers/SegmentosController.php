<?php

namespace App\Http\Controllers;

use App\Aplicacoes\CasosDeUso\Segmentos\ListarSegmento;

class SegmentosController extends Controller
{
    public function getLista(ListarSegmento $useCase)
    {
        return response()->json([
            'data' => $useCase->executar()
        ]);
    }
}
