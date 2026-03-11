<?php

namespace app\Aplicacoes\CasosDeUso\Empreendimentos;

use app\Domain\Entities\EmpreendimentosEntity;
use App\Domain\Repositorios\EmpreendimentosRepositorio;
use App\Exceptions\EntityException;

final readonly class EditarEmpreendimento
{
    public function __construct(private EmpreendimentosRepositorio $repositorio)
    {
    }

    public function executar(EmpreendimentosEntity $entity)
    {
        if (empty($entity->id)) {
            throw new EntityException('ID', 401);
        }

        $this->repositorio->atualiza($entity->id, $entity);
    }
}
