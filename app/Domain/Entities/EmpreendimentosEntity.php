<?php

namespace app\Domain\Entities;

class EmpreendimentosEntity
{
    public function __construct(
        public ?int $id,
        public string $nome,
        public string $empreendedor,
        public string $municipio,
        public int $segmentoId,
        public string $contato,
        public bool $status
    ) {}

    public function __toArray(): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'empreendedor' => $this->empreendedor,
            'municipio' => $this->municipio,
            'segmentoId' => $this->segmentoId,
            'contato' => $this->contato,
            'status' => $this->status
        ];
    }

}
