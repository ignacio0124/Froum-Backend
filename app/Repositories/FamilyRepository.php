<?php

namespace App\Repositories;

use App\Models\Family;
use Illuminate\Support\Collection;

class FamilyRepository
{
    protected Family $model;

    function __construct(Family $model)
    {
        $this->model = $model;
    }

    /**
     * 取得 Family 列表
     *
     * @return Collection
     */
    function getList(): Collection
    {
        return $this->model
            ->get();
    }
}
