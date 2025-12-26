<?php

declare(strict_types=1);

namespace App\Contracts;

interface EnvInterface
{
    public static function load(string $path): void;
}
