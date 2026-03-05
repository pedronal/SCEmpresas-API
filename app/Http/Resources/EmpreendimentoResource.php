<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmpreendimentoResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'nome' => $this->nome,
            'empreendedor' => $this->empreendedor,
            'municipio' => $this->municipio,
            'segmento_id' => $this->segmentoId,
            'contato' => $this->contato,
            'status' => $this->status,
        ];
    }

    public function success(): self
    {
        $this->additional([
            'success' => true,
        ]);

        return $this;
    }

    public function message(string $message): self
    {
        return $this->additional([
            'message' => $message
        ]);
    }
}
