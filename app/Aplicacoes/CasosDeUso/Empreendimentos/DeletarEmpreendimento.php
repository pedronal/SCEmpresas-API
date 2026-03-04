<?php

namespace app\Aplicacoes\CasosDeUso\Empreendimentos;

use App\Domain\Repositorios\EmpreendimentosRepositorio;

final readonly class DeletarEmpreendimento
{
    public function __construct(private EmpreendimentosRepositorio $repositorio)
    {
    }

    public function executar(int $id): void
    {
        $this->repositorio->deletar($id);
    }
}
