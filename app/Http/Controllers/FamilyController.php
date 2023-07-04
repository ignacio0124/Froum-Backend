<?php

namespace App\Http\Controllers;

use App\Http\Resources\FamilyCollection;
use App\Services\FamilyService;
use Symfony\Component\Routing\Annotation\Route;

class FamilyController extends Controller
{
    protected FamilyService $familyService;

    public function __construct(FamilyService $familyService)
    {
        $this->familyService = $familyService;
    }

    /**
     * @Route('/families', methods: 'GET')
     *
     * @return FamilyCollection
     */
    public function index(): FamilyCollection
    {
        $resource = $this->familyService->repo->getList();

        return new FamilyCollection($resource);
    }
}
