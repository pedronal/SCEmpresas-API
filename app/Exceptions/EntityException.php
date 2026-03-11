<?php

namespace App\Exceptions;

use Exception;

class EntityException extends Exception
{
    public function __construct(
        string $atributo,
        int    $codigo = 0,
    )
    {
        parent::__construct($this->buildMessage($atributo), $codigo);
    }

    public function buildMessage(string $atributo): string
    {
        return "O atributo '{$atributo}' é obrigatorio";
    }
}

