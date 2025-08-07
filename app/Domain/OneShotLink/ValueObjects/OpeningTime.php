<?php

namespace App\Domain\OneShotLink\ValueObjects;

use Carbon\Carbon;

final class OpeningTime
{
    private function __construct(
        private int $timestamp
    ) {}

    public static function fromCarbon(Carbon $carbon): self
    {
        return new self($carbon->getTimestamp());
    }

    public static function fromString(string $datetime): self
    {
        return new self(strtotime($datetime));
    }

    public function toCarbon(): Carbon
    {
        return Carbon::createFromTimestamp($this->timestamp);
    }

    public function toString(): string
    {
        return date('Y-m-d H:i:s', $this->timestamp);
    }

    public function timestamp(): int
    {
        return $this->timestamp;
    }
}
