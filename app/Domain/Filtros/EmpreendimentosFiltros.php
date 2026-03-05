<?php

namespace app\Domain\Filtros;

class EmpreendimentosFiltros
{
    public ?int $id = null;

    public ?string $nome = null;

    public ?string $empreendedor = null;

    public ?string $municipio = null;

    public ?int $segmentoId = null;

    public ?string $contato = null;

    public ?bool $status = null;

    public bool $flag_oculto;
}
