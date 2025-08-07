<?php

namespace App\Domain\OneShotLink\Repository;

use App\Domain\OneShotLink\Entities\OneShotLinkEntity;

interface OneShotLinkRepositoryInterface
{
    public function getLinkById(string $id): OneShotLinkEntity;

    public function save(OneShotLinkEntity $domainLink): OneShotLinkEntity;

}
