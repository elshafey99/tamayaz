<?php
namespace App\Services;

use App\Models\Grade;
use App\Models\Instructor;

class InstructorService
{
    public function __construct(public Instructor $instructor){}

    public function index()
    {
        $instructor = $this->instructor->paginate();
        return $instructor;
    }

    public function show($id)
    {
        $instructor = $this->instructor->findOrFail($id);
        return $instructor;
    }

    public function MostInstructors()
    {
        $instructors = $this->instructor->withCount('courses')->orderBy('courses_count', 'desc')->take(3)->get();
        return $instructors;
    }

    public function OurInstructors()
    {
        $instructors = $this->instructor->inRandomOrder()->take(4)->get();
        return $instructors;
    }

}
