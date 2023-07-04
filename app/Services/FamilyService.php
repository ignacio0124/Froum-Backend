<?php

namespace App\Services;

use App\Repositories\FamilyRepository;
use App\Repositories\FavoriteRepository;
use Illuminate\Database\Eloquent\Model;

class FamilyService
{
    public FamilyRepository $repo;
    public FavoriteRepository $favoriteRepo;

    public function __construct(
        FamilyRepository $repo,
        FavoriteRepository $favoriteRepo
    ) {
        $this->repo = $repo;
        $this->favoriteRepo = $favoriteRepo;
    }

    /**
     * 新增或刪除喜歡的分類
     *
     * @param int $userId
     * @param int $familyId
     * @return Model|bool
     */
    public function setFavorite(int $userId, int $familyId): Model|bool
    {
        $result = $this->favoriteRepo->exists($userId, $familyId);

        if (!$result) {
            return $this->favoriteRepo->create($userId, $familyId);
        }

        return $this->favoriteRepo->delete($userId, $familyId);
    }
}
