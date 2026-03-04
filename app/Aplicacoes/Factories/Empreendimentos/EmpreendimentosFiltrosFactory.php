<?php

namespace app\Aplicacoes\Factories\Empreendimentos;

use app\Domain\Filtros\EmpreendimentosFiltros;
use Illuminate\Http\Request;

class EmpreendimentosFiltrosFactory
{
    public static function fromRequest(Request $request): EmpreendimentosFiltros
    {
        $filtro = new EmpreendimentosFiltros();
        $filtro->id = $request->query('id');
        $filtro->nome = $request->query('nome');
        $filtro->empreendedor = $request->query('empreendedor');
        $filtro->municipio = $request->query('municipio');
        $filtro->segmentoId = $request->query('segmentoId');
        $filtro->contato = $request->query('contato');
        $filtro->status = $request->query('status');

        return $filtro;
    }
}
