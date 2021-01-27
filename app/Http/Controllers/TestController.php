<?php

namespace App\Http\Controllers;

use App\Service\HeaderService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test(HeaderService $service)
    {
        $service->store();
    }

    public function index(HeaderService $service)
    {
        $data = $service->getList();

        dd($data);
    }
}
