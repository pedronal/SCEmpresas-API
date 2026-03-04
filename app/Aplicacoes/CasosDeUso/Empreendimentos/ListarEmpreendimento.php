<?php

namespace app\Aplicacoes\CasosDeUso\Empreendimentos;

use app\Domain\Filtros\EmpreendimentosFiltros;
use App\Domain\Repositorios\EmpreendimentosRepositorio;
use Illuminate\Support\Collection;

final readonly class ListarEmpreendimento
{
    public function __construct(private EmpreendimentosRepositorio $repositorio)
    {
    }

    public function executar(EmpreendimentosFiltros $filtros): Collection
    {
        return $this->repositorio->buscar($filtros);
    }
}
