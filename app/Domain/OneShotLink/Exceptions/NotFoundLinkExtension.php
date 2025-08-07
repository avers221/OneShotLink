<?php

namespace App\Domain\OneShotLink\Exceptions;

use App\Exceptions\Throwable;
use Exception;

class NotFoundLinkExtension extends Exception
{
    public function __construct(string $message = "Not Found One Shot Link", int $code = 0, ?Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
