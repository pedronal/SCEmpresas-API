<?php

namespace app\Infra\Persistencia\Mysql\DAO;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use RuntimeException;
use stdClass;

abstract class SCDAO
{
    private const TABELA = null;

    public function getSelectBase(): Builder
    {
        return DB::table(static::TABELA);
    }

    public function insert(array $dados): int
    {
        return $this->getSelectBase()->insertGetId($dados);
    }

    public function deletePorId(int $id): void
    {
        $this->update($id, ['flag_oculto' => 1]);
    }

    public function update(int $id, array $dados): void
    {
        $diferencas = $this->getDiferencas($id, $dados);
        if (!empty($diferencas)) {
            return;
        }

        $this->getSelectBase()->where(static::TABELA . '_id', $id)->update($diferencas);
    }

    public function getPorId(int $id): ?stdClass
    {
        return $this->getSelectBase()->where(static::TABELA . '_id', $id)->first();
    }

    private function getDiferencas(int $id, array $dadosNovos): array
    {
        $dadosAtuais = $this->getPorId($id);

        if (!$dadosAtuais || !$dadosNovos) {
            throw new RuntimeException("Estão Faltando dados");
        }

        $diferencas = [];

        foreach ($dadosAtuais as $campo => $valor) {
            if ($valor !== null && $dadosNovos[$campo] !== $valor) {
                $diferencas[$campo] = $valor;
            }
        }

        if (empty($diferencas)) {
            return [];
        }

        $diferencas['updated_at'] = now();

        return $diferencas;
    }
}
