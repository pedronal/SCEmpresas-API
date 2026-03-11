<?php

namespace app\Http\Controllers;

use app\Aplicacoes\CasosDeUso\Empreendimentos\BuscarEmpreendimento;
use app\Aplicacoes\CasosDeUso\Empreendimentos\CriarEmpreendimento;
use app\Aplicacoes\CasosDeUso\Empreendimentos\DeletarEmpreendimento;
use app\Aplicacoes\CasosDeUso\Empreendimentos\EditarEmpreendimento;
use app\Aplicacoes\CasosDeUso\Empreendimentos\ListarEmpreendimento;
use app\Aplicacoes\Factories\Empreendimentos\EmpreendimentosFiltrosFactory;
use App\Exceptions\EmptyBodyException;
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
        if (empty($request->all())) {
            throw new EmptyBodyException();
        }

        $entity = EmpreendimentosMapper::criarEntityFromRequest($request);

        $id = $useCase->executar($entity);

        return response()->json([
            'sucesso' => true,
            'empreendimento_id' => $id
        ]);
    }

    public function atualiza(Request $request, EditarEmpreendimento $useCase): JsonResponse
    {
        if (empty($request->all())) {
            throw new EmptyBodyException();
        }

        $useCase->executar(EmpreendimentosMapper::criarEntityFromRequest($request));

        return response()->json([
            'sucesso' => true,
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
