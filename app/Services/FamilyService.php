<?php

namespace App\Services;

use App\Repositories\FamilyRepository;

class FamilyService
{
    public FamilyRepository $repo;

    public function __construct(FamilyRepository $repo)
    {
        $this->repo = $repo;
    }
}
