<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        $hello = "Hello World from Controller";
        echo $hello;
    }
}
