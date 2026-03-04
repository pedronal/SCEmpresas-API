<?php

namespace app\Infra\Persistencia\Mysql\DAO;

use app\Domain\Entities\EmpreendimentosEntity;
use app\Domain\Filtros\EmpreendimentosFiltros;
use App\Domain\Repositorios\EmpreendimentosRepositorio;
use Illuminate\Support\Collection;

class EmpreendimentosDAO extends SCDAO implements EmpreendimentosRepositorio
{
    private const TABELA = 'empreendimentos';

    public function atualiza(int $id, EmpreendimentosEntity $entity): void
    {
        $callable = function ($dado) {
            return $dado === null;
        };

        $update = array_filter([
            'nome' => $entity->nome,
            'empreendedor' => $entity->empreendedor,
            'municipio' => $entity->municipio,
            'segmento_id' => $entity->segmentoId,
            'contato' => $entity->contato,
            'status' => $entity->status,
            'update_at' => now()
        ], $callable);
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
            $query->where('nome', 'like', "%{$filtro->empreendedor}%");
        }

        if ($filtro->municipio) {
            $query->where('municipio', $filtro->municipio);
        }

        if ($filtro->segmentoId) {
            $query->where('segmento_id', $filtro->segmentoId);
        }

        if ($filtro->contato) {
            $query->where('nome', 'like', "%{$filtro->contato}%");
        }

        if ($filtro->status !== null) {
            $query->where('status', $filtro->status);
        }

        return $query->get();
    }

    public function insere(EmpreendimentosEntity $entity): int
    {
        $dados = [
            'nome' => $entity->nome,
            'empreendedor' => $entity->empreendedor,
            'municipio' => $entity->municipio,
            'segmento_id' => $entity->segmentoId,
            'contato' => $entity->contato,
            'status' => $entity->status,
        ];
        return parent::insert($dados);
    }

    public function buscaPorId(int $id): ?EmpreendimentosEntity
    {
        $row = parent::getPorId($id);

        if (!$row) {
        return null;
        }

        return new EmpreendimentosEntity(
            $row->id,
            $row->nome,
            $row->empreendedor,
            $row->municipio,
            $row->segmento_id,
            $row->contato,
            $row->status
        );
    }

    public function deletePorId(int $id): void
    {
        parent::deletePorId($id);
    }
}
