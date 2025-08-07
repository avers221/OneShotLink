<?php

namespace App\Infrastructure\OneShotLink\Persistence\Eloquent\Repositories;

use App\Domain\OneShotLink\Entities\OneShotLinkEntity;
use App\Domain\OneShotLink\Exceptions\NotFoundLinkExtension;
use App\Domain\OneShotLink\Repository\OneShotLinkRepositoryInterface;
use App\Domain\OneShotLink\ValueObjects\OpeningTime;
use App\Infrastructure\OneShotLink\Persistence\Eloquent\Models\OneShotLink;

class OneShotLinkRepository implements OneShotLinkRepositoryInterface
{

    public function getLinkById(string $id): OneShotLinkEntity
    {
        $entity = OneShotLink::query()->where('id', $id)->first();
        if (empty($entity))
            throw new NotFoundLinkExtension();

        return new OneShotLinkEntity(
            $entity->id,
            $entity->body,
            $entity->ttl,
            $entity->open_at ? OpeningTime::fromString($entity->open_at) : null,
        );
    }

    public function save(OneShotLinkEntity $domainLink): OneShotLinkEntity
    {
        $link = $domainLink->id ? OneShotLink::find($domainLink->id) : new OneShotLink();

        $link->body = $domainLink->body;
        $link->ttl = $domainLink->ttl;
        $link->open_at = $domainLink->open_at?->toCarbon();

        $link->save();

        return new OneShotLinkEntity(
            $link->id,
            $link->body,
            $link->ttl,
            $link->open_at ? OpeningTime::fromCarbon($link->open_at) : null,
        );
    }
}
