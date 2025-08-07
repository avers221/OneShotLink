<?php

namespace App\Domain\OneShotLink\Events;

use App\Domain\OneShotLink\Entities\OneShotLinkEntity;
use Carbon\Carbon;
use Illuminate\Foundation\Events\Dispatchable;

class LinkOpened
{
    use Dispatchable;

    /**
     * Create a new event instance.
     */
    public function __construct(public OneShotLinkEntity $entity, public Carbon $time)
    {
        //
    }
}
