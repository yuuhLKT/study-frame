<?php

declare(strict_types=1);

namespace App\Contracts;

interface RouterInterface
{
    public static function get(string $uri, array $action): void;
    public static function post(string $uri, array $action): void;
    public static function dispatch(): void;
}
