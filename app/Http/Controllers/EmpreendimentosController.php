<?php

namespace App\Http\Controllers;

use app\Aplicacoes\CasosDeUso\Empreendimentos\BuscarEmpreendimento;
use app\Aplicacoes\CasosDeUso\Empreendimentos\CriarEmpreendimento;
use app\Aplicacoes\CasosDeUso\Empreendimentos\DeletarEmpreendimento;
use app\Aplicacoes\CasosDeUso\Empreendimentos\EditarEmpreendimento;
use app\Aplicacoes\CasosDeUso\Empreendimentos\ListarEmpreendimento;
use app\Aplicacoes\Factories\Empreendimentos\EmpreendimentosFiltrosFactory;
use App\Http\Controllers\Controller;
use app\Infra\Persistencia\Mysql\Mappers\EmpreendimentosMapper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EmpreendimentosController extends Controller
{
    public function getLista(Request $request, ListarEmpreendimento $useCase): JsonResponse
    {
        $filtro = EmpreendimentosFiltrosFactory::fromRequest($request);

        $lista = $useCase->executar($filtro);

        return response()->json($lista);
    }

    public function buscaPorId(int $id, BuscarEmpreendimento $useCase): JsonResponse
    {
        $empreendimento = $useCase->executar($id);

        if (!$empreendimento) {
            return response()->json([
                'message' => 'Empreendimento não encontrado'
            ], 404);
        }

        return response()->json($empreendimento);
    }

    public function adiciona(Request $request, CriarEmpreendimento $useCase): JsonResponse
    {
        $id = $useCase->executar(EmpreendimentosMapper::criarEntity($request));

        if (!$id) {
            return response()->json([
                'message' => 'Erro ao adicionar empreendimento'
            ], 404);
        }

        return response()->json([
            'message' => 'Empreendimento adicionado com sucesso'
        ]);
    }

    public function atualiza(Request $request, EditarEmpreendimento $useCase): JsonResponse
    {
        $id = $useCase->executar(EmpreendimentosMapper::criarEntity($request));

        return response()->json([
            'message' => 'Empreendimento atualizado'
        ]);
    }

    public function remove(int $id, DeletarEmpreendimento $useCase): JsonResponse
    {
        $useCase->executar($id);

        return response()->json([
            'message' => 'Empreendimento removido'
        ]);
    }
}
