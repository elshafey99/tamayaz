<?php

namespace App\Http\Controllers\Api;

use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Services\StageService;
use Illuminate\Auth\Access\Gate;
use App\Http\Controllers\Controller;
use App\Http\Resources\StageResource;

class StageController extends Controller
{
    use HttpResponse;
    public function __construct(public StageService $stageService)
    {

    }

    public function index()
    {
        $stages = $this->stageService->index();

        return $this->successResponse(StageResource::collection($stages), 'Grades retrieved successfully');
    }
}
