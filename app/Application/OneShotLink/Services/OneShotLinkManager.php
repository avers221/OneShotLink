<?php

namespace App\Application\OneShotLink\Services;

use App\Application\OneShotLink\DTOs\CreateOneShotLinkDTO;
use App\Domain\OneShotLink\Entities\OneShotLinkEntity;
use App\Domain\OneShotLink\Exceptions\LinkOpenedBefore;
use App\Domain\OneShotLink\Repository\OneShotLinkRepositoryInterface;

class OneShotLinkManager
{
    public function __construct(protected OneShotLinkRepositoryInterface $linkRepository)
    {
    }

    public function openOneShotLink(string $id): OneShotLinkEntity
    {
        $link = $this->linkRepository->getLinkById($id);
        if ($link->open_at)
            throw new LinkOpenedBefore();

        return $link;
    }


    public function createLink(CreateOneShotLinkDTO $dto): OneShotLinkEntity
    {
        $entity = new OneShotLinkEntity(id: null, body: $dto->body, ttl: $dto->ttl);

        return $this->linkRepository->save($entity);
    }
}
