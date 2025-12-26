<?php

namespace App\Controllers;

use App\Core\Config\Env;
use App\Core\Http\Request;
use App\Core\Http\Response;

class TestController
{

    public function index(Request $request): Response
    {

        $data = [
            'Olá' => "Mundo",
            'From' => "TestController"
        ];

        return Response::json($data, 200);
    }
}
