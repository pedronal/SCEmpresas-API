<?php

namespace app\Infra\Persistencia\Mysql\Mappers;

use app\Domain\Entities\EmpreendimentosEntity;

class EmpreendimentosMapper
{
    public static function criarEntity(object $row): EmpreendimentosEntity
    {
        return new EmpreendimentosEntity(
            $row->id,
            $row->nome,
            $row->empreendedor,
            $row->municipio,
            $row->segmentoId,
            $row->contato,
            $row->status
        );

    }
    public static function toArray(EmpreendimentosEntity $entity): array

    {
        return [
            'nome' => $entity->nome,
            'empreendedor' => $entity->empreendedor,
            'municipio' => $entity->municipio,
            'id_segmento' => $entity->segmentoId,
            'contato' => $entity->contato,
            'status' => $entity->status
        ];
    }
}
