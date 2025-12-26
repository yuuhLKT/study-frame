<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Config\Env;
use App\Core\Http\Request;
use App\Core\Http\Response;

class TestController
{

    public function index(Request $request): Response
    {
        $env = Env::get('TesteENV', 123);

        $data = [
            'Olá' => "Mundo",
            'From' => "TestController",
            'ENV' => $env
        ];

        return Response::json($data, 200);
    }
}
