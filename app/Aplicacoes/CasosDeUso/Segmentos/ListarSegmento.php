<?php

namespace App\Aplicacoes\CasosDeUso\Segmentos;

use App\Infra\Persistencia\Mysql\DAO\SegmentosDao;
use Illuminate\Support\Collection;

final readonly class ListarSegmento
{
    public function __construct(private SegmentosDAO $repositorio)
    {
    }

    public function executar(): Collection
    {
        return $this->repositorio->lista();
    }
}
