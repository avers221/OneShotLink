<?php

namespace App\Application\OneShotLink\DTOs;

class CreateOneShotLinkDTO
{
    public function __construct(
        public string $body,
        public ?int   $ttl
    )
    {
    }
}
