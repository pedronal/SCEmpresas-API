<?php

namespace app\Aplicacoes\CasosDeUso\Empreendimentos;

use app\Domain\Entities\EmpreendimentosEntity;
use App\Domain\Repositorios\EmpreendimentosRepositorio;

final readonly class CriarEmpreendimento
{
    public function __construct(private EmpreendimentosRepositorio $repositorio) {
    }

    public function executar(EmpreendimentosEntity $entity): int
    {
        return $this->repositorio->insere($entity);
    }
}
