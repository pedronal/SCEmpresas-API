<?php

namespace App\Exceptions;

use Exception;

class EmptyBodyException extends Exception
{
    public function __construct(
    )
    {
        parent::__construct($this->buildMessage(), 400);
    }

    public function buildMessage(): string
    {
        return "O corpo da requisicão é obrigatório";
    }
}
