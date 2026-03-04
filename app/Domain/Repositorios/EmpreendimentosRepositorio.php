<?php

namespace App\Domain\Repositorios;

use App\Domain\Entities\EmpreendimentosEntity;
use app\Domain\Filtros\EmpreendimentosFiltros;
use Illuminate\Support\Collection;

interface EmpreendimentosRepositorio
{

    public function buscar(EmpreendimentosFiltros $filtro): Collection;

    public function insere(EmpreendimentosEntity $entity): int;

    public function atualiza(int $id, EmpreendimentosEntity $entity): void;

    public function buscaPorId(int $id): ?EmpreendimentosEntity;

    public function deletePorId(int $id): void;
}
