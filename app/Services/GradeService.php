<?php
namespace App\Services;

use App\Models\Grade;




class GradeService
{

    public function index()
    {
        $grades = Grade::with('stage')->get();
        return $grades;
    }

}
