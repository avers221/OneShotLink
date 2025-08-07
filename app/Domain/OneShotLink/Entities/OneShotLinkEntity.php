<?php

namespace App\Domain\OneShotLink\Entities;

use App\Domain\OneShotLink\ValueObjects\OpeningTime;

class OneShotLinkEntity
{
    protected int $default_ttl = 30;

    public function __construct(
        public ?string      $id,
        public string       $body,
        public ?int         $ttl,
        public ?OpeningTime $open_at = null
    )
    {
        if (!($this->ttl) || $this->ttl <= 0)
            $this->ttl = $this->default_ttl;
    }

    public function markAsOpenedAt(OpeningTime $openingTime): void
    {
        $this->open_at = $openingTime;
    }

    public static function createFromDTO()
    {

    }
}
