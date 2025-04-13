<?php

namespace App\Http\Controllers\Api;

use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Services\GradeService;
use Illuminate\Auth\Access\Gate;
use App\Http\Controllers\Controller;
use App\Http\Resources\GradeResource;

class GradeController extends Controller
{
    use HttpResponse;
    public function __construct(public GradeService $gradeService)
    {

    }

    public function index()
    {
        $grades = $this->gradeService->index();

        return $this->successResponse(GradeResource::collection($grades), 'Grades retrieved successfully');
    }
}
