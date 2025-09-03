<?php

namespace App\Exceptions;

use Exception;

class TreatedException extends Exception
{
    public function __construct(string $message, int $code = 500, ?Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
