<?php

namespace app\Aplicacoes\CasosDeUso\Empreendimentos;

use app\Domain\Entities\EmpreendimentosEntity;
use App\Domain\Repositorios\EmpreendimentosRepositorio;
use App\Exceptions\EntityException;

final readonly class CriarEmpreendimento
{
    public function __construct(private EmpreendimentosRepositorio $repositorio) {
    }

    public function executar(EmpreendimentosEntity $entity): int
    {
        if (empty($entity->nome)) {
            throw new EntityException('Nome', 401);
        }
        return $this->repositorio->insere($entity);
    }
}
