<?php

namespace App\Infra\Persistencia\Mysql\DAO;

use Illuminate\Support\Collection;

class SegmentosDao extends SCDAO
{
    public const TABELA = 'segmentos';

    public function lista(): Collection
    {
        return $this->getSelectBase()->get();
    }
}
