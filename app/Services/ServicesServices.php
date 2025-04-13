<?php

namespace App\Services;

use App\Models\Service;

class ServicesServices
{
    public function __construct(public Service $services) {}

    public function index()
    {
        $services = $this->services->paginate();
        return $services;
    }
    public function show($id)
    {
        $instructor = $this->services->findOrFail($id);
        return $instructor;
    }

    public function MostInstructors()
    {
        $instructors = $this->services->withCount('courses')->orderBy('courses_count', 'desc')->take(3)->get();
        return $instructors;
    }

    public function OurInstructors()
    {
        $instructors = $this->services->inRandomOrder()->take(4)->get();
        return $instructors;
    }
}
