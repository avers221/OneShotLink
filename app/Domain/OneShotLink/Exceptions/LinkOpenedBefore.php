<?php

namespace App\Domain\OneShotLink\Exceptions;

use App\Exceptions\Throwable;
use Exception;

class LinkOpenedBefore extends Exception
{
    public function __construct(string $message = "the link was opened earlier", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
