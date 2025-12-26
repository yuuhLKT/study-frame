<?php

namespace App\Controllers;

use App\Core\Http\Response;

class HomeController
{
    public function index(): Response
    {
        return Response::html("<h1>Hello World, from HomeController</h1>", 200);
    }
}
