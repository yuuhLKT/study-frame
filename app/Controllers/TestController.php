<?php

namespace App\Controllers;

use App\Core\Http\Request;

class TestController
{

    public function index()
    {
        $request = Request::capture();
        echo $request->getMethod() . " - " . $request->getUri();
    }
}
