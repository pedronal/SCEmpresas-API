<?php

namespace app\Domain\Entities;

class EmpreendimentosEntity
{
    public function __construct(
        public ?int $id,
        public ?string $nome,
        public ?string $empreendedor,
        public ?string $municipio,
        public ?int $segmentoId,
        public ?string $contato,
        public ?bool $status
    ) {
    }
}
