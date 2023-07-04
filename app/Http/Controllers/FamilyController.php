<?php

namespace App\Http\Controllers;

use App\Http\Resources\FamilyCollection;
use App\Services\FamilyService;
use Illuminate\Http\Response;
use Symfony\Component\Routing\Annotation\Route;

class FamilyController extends Controller
{
    protected FamilyService $familyService;

    public function __construct(FamilyService $familyService)
    {
        $this->familyService = $familyService;
    }

    /**
     * 取得 Family 列表
     *
     * @Route('/families', methods: 'GET')
     * @return FamilyCollection
     */
    public function index(): FamilyCollection
    {
        $response = $this->familyService->repo->getList();

        return new FamilyCollection($response);
    }

    /**
     * 設定喜歡的分類
     *
     * @param int $familyId
     * @return Response
     */
    public function setFavorite(int $familyId): Response
    {
        $userId = 1;

        $this->familyService->setFavorite($userId, $familyId);

        return response()->noContent();
    }
}
