<?php

declare(strict_types=1);

namespace App\Contracts;

use App\Core\Http\Request;
use App\Core\Http\Response;

interface RouterInterface
{
    public static function get(string $uri, array $action): void;
    public static function post(string $uri, array $action): void;
    public static function dispatch(Request $request): Response;
}
