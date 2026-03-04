<?php

namespace app\Aplicacoes\CasosDeUso\Empreendimentos;

use app\Domain\Entities\EmpreendimentosEntity;
use App\Domain\Repositorios\EmpreendimentosRepositorio;

final readonly class EditarEmpreendimento
{
    public function __construct(private EmpreendimentosRepositorio $repositorio)
    {
    }

    public function executar(EmpreendimentosEntity $entity)
    {
        $this->repositorio->atualiza($entity->id, $entity);
    }
}
