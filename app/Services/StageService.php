<?php
namespace App\Services;

use App\Models\Stage;




class StageService
{

    public function index()
    {
        $stage = Stage::get();
        return $stage;
    }

}
