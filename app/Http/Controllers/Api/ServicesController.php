<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ServicesResource;
use App\Services\ServicesServices;
use App\Traits\HttpResponse;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    use HttpResponse;
    public function __construct(public ServicesServices $servicesServices) {}
    public function index(Request $request)
    {
        $services = $this->servicesServices->index();
        return $this->paginatedResponse($services, ServicesResource::class);
    }
}
