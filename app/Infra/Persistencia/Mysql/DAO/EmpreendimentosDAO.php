<?php

namespace app\Infra\Persistencia\Mysql\DAO;

use app\Domain\Entities\EmpreendimentosEntity;
use app\Domain\Filtros\EmpreendimentosFiltros;
use App\Domain\Repositorios\EmpreendimentosRepositorio;
use app\Infra\Persistencia\Mysql\Mappers\EmpreendimentosMapper;
use Illuminate\Support\Collection;

class EmpreendimentosDAO extends SCDAO implements EmpreendimentosRepositorio
{
    public const TABELA = 'empreendimentos';

    public function atualiza(int $id, EmpreendimentosEntity $entity): void
    {
        $callable = function ($dado) {
            return $dado === null;
        };

        $update = array_filter(EmpreendimentosMapper::toArray($entity), $callable);

        parent::update($id, $update);
    }

    public function buscar(EmpreendimentosFiltros $filtro): Collection
    {
        $query = $this->getSelectBase();

        if ($filtro->id) {
            $query->where('empreendimentos_id', 'like', "%{$filtro->id}%");
        }

        if ($filtro->nome) {
            $query->where('nome', 'like', "%{$filtro->nome}%");
        }

        if ($filtro->empreendedor) {
            $query->where('empreendedor', 'like', "%{$filtro->empreendedor}%");
        }

        if ($filtro->municipio) {
            $query->where('municipio', $filtro->municipio);
        }

        if ($filtro->segmentoId) {
            $query->where('id_segmento', $filtro->segmentoId);
        }

        if ($filtro->contato) {
            $query->where('nome', 'like', "%{$filtro->contato}%");
        }

        if ($filtro->status !== null) {
            $query->where('status', $filtro->status);
        }

        return $query->get()->map(function ($row) {
            EmpreendimentosMapper::criarEntity($row);
        });
    }

    public function insere(EmpreendimentosEntity $entity): int
    {
        $dados = EmpreendimentosMapper::toArray($entity);
        return parent::insert($dados);
    }

    public function buscaPorId(int $id): ?EmpreendimentosEntity
    {
        $row = parent::getPorId($id);

        if (!$row) {
        return null;
        }

        return EmpreendimentosMapper::criarEntity($row);
    }

    public function deletar(int $id): void
    {
        parent::deletePorId($id);
    }
}
