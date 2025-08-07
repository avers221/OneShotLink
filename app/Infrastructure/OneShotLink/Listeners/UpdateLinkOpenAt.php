<?php

namespace App\Infrastructure\OneShotLink\Listeners;

use App\Domain\OneShotLink\Events\LinkOpened;
use App\Domain\OneShotLink\Repository\OneShotLinkRepositoryInterface;
use App\Domain\OneShotLink\ValueObjects\OpeningTime;

class UpdateLinkOpenAt
{
    /**
     * Create the event listener.
     */
    public function __construct(protected OneShotLinkRepositoryInterface $linkRepository)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(LinkOpened $event): void
    {
        $event->entity->markAsOpenedAt(OpeningTime::fromCarbon($event->time));
        $this->linkRepository->save($event->entity);
    }
}
