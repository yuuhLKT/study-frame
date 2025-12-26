<?php

namespace App\Controllers;

use App\Core\Http\Request;

class TestController
{

    public function index()
    {
        $request = Request::capture();
        echo $request->getMethod() . " - " . $request->getUri() . "<br>";
        echo "Body: " . json_encode($request->getBody(), JSON_PRETTY_PRINT) . "<br><br><br>";
        echo "Headers: " . json_encode($request->getHeaders(), JSON_PRETTY_PRINT) . "<br>";
    }
}
