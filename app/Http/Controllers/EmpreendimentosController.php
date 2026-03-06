<?php

namespace app\Http\Controllers;

use app\Aplicacoes\CasosDeUso\Empreendimentos\BuscarEmpreendimento;
use app\Aplicacoes\CasosDeUso\Empreendimentos\CriarEmpreendimento;
use app\Aplicacoes\CasosDeUso\Empreendimentos\DeletarEmpreendimento;
use app\Aplicacoes\CasosDeUso\Empreendimentos\EditarEmpreendimento;
use app\Aplicacoes\CasosDeUso\Empreendimentos\ListarEmpreendimento;
use app\Aplicacoes\Factories\Empreendimentos\EmpreendimentosFiltrosFactory;
use App\Http\Controllers\Controller;
use App\Http\Resources\EmpreendimentoResource;
use app\Infra\Persistencia\Mysql\Mappers\EmpreendimentosMapper;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpreendimentosController extends Controller
{
    public function getLista(Request $request, ListarEmpreendimento $useCase): AnonymousResourceCollection
    {
        $filtro = EmpreendimentosFiltrosFactory::fromRequest($request);

        $lista = $useCase->executar($filtro);

        return EmpreendimentoResource::collection($lista);
    }

    public function buscaPorId(int $id, BuscarEmpreendimento $useCase): JsonResource
    {
        $empreendimento = $useCase->executar($id);


        return new EmpreendimentoResource($empreendimento);
    }

    public function adiciona(Request $request, CriarEmpreendimento $useCase): JsonResponse
    {
        try {
            $id = $useCase->executar(EmpreendimentosMapper::criarEntityFromRequest($request));
        } catch (\Exception) {
            $id = 0;
        }

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
        try {
            $useCase->executar(EmpreendimentosMapper::criarEntityFromRequest($request));
            $message = 'Empreendimento atualizado';
        } catch (\Exception $e) {
            $message = $e->getMessage();
        }

        return response()->json([
            'message' => $message
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
