<?php

declare(strict_types=1);

namespace App\Core\Config;

use App\Contracts\EnvInterface;

class Env implements EnvInterface
{
    public static function load(string $path): void
    {

        if (!file_exists($path) || !is_readable($path)) {
            throw new \InvalidArgumentException("File not found or not readable: $path");
        }

        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        foreach ($lines as $line) {
            $line = trim($line);

            if (str_starts_with($line, ";") || str_starts_with($line, "#")) {
                continue;
            }

            echo $line;
        }
    }
}
