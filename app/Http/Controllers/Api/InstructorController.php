<?php

namespace App\Http\Controllers\Api;

use App\Traits\HttpResponse;
use Illuminate\Http\Request;
use App\Services\InstructorService;
use App\Http\Controllers\Controller;
use App\Http\Resources\InstructorResource;
use App\Http\Resources\InstructorDetailsResource;

class InstructorController extends Controller
{
    use HttpResponse;
    public function __construct(public InstructorService $instructorService){}


    public function index(Request $request)
    {
        $instructors = $this->instructorService->index();
        return $this->paginatedResponse($instructors, InstructorResource::class);
    }

    public function show($id)
    {
        $instructor = $this->instructorService->show($id);
        return $this->okResponse(new InstructorDetailsResource($instructor) , 'Instructor retrieved successfully');

    }

    public function MostInstructors()
    {
        $instructors = $this->instructorService->MostInstructors();
        return $this->simpleResponse($instructors , InstructorResource::class);
    }

    public function OurInstructors()
    {
        $instructors = $this->instructorService->OurInstructors();
        return $this->simpleResponse($instructors , InstructorResource::class);
    }


}
