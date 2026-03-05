<?php

namespace app\Infra\Persistencia\Mysql\Mappers;

use app\Domain\Entities\EmpreendimentosEntity;
use Illuminate\Http\Request;

class EmpreendimentosMapper
{
    public static function criarEntityFromRequest(Request $request): EmpreendimentosEntity
    {
        return new EmpreendimentosEntity(
            $request->id,
            $request->nome,
            $request->empreendedor,
            $request->municipio,
            $request->segmentoId,
            $request->contato,
            $request->status
        );

    }

    public static function criarEntityFromRow(object $row): EmpreendimentosEntity
    {
        return new EmpreendimentosEntity(
            $row->empreendimentos_id,
            $row->nome,
            $row->empreendedor,
            $row->municipio,
            $row->id_segmento,
            $row->contato,
            $row->status
        );

    }

    public static function toArray(EmpreendimentosEntity $entity): array

    {
        return [
            'nome' => $entity->nome ?? '',
            'empreendedor' => $entity->empreendedor ?? '',
            'municipio' => $entity->municipio ?? '',
            'id_segmento' => $entity->segmentoId ?? 0,
            'contato' => $entity->contato ?? '',
            'status' => $entity->status ?? true
        ];
    }
}
