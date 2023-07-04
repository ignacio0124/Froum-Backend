<?php

namespace App\Repositories;

use App\Models\Favorite;
use Illuminate\Database\Eloquent\Model;

class FavoriteRepository
{
    protected Favorite $model;

    public function __construct(Favorite $model)
    {
        $this->model = $model;
    }

    /**
     * 新增喜歡的分類
     *
     * @param int $userId
     * @param int $familyId
     * @return Model
     */
    public function create(int $userId, int $familyId): Model
    {
        return $this->model
            ->create([
                'user_id' => $userId,
                'family_id' => $familyId
            ]);
    }

    /**
     * 移除喜歡的分類
     *
     * @param int $userId
     * @param int $familyId
     * @return bool
     */
    public function delete(int $userId, int $familyId): bool
    {
        return $this->model
            ->where([
                'user_id' => $userId,
                'family_id' => $familyId
            ])
            ->delete();
    }

    /**
     * 判斷是否已加入喜歡的分類
     *
     * @param int $userId
     * @param int $familyId
     * @return bool
     */
    public function exists(int $userId, int $familyId): bool
    {
        return $this->model
            ->where([
                'user_id' => $userId,
                'family_id' => $familyId
            ])
            ->exists();
    }
}
