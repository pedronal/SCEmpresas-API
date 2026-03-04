<?php

namespace app\Aplicacoes\CasosDeUso\Empreendimentos;

use app\Domain\Entities\EmpreendimentosEntity;
use App\Domain\Repositorios\EmpreendimentosRepositorio;

final readonly class BuscarEmpreendimento
{
    public function __construct(private EmpreendimentosRepositorio $repositorio)
    {
    }

    public function executar(int $id): EmpreendimentosEntity
    {
        return $this->repositorio->buscaPorId($id);
    }
}
