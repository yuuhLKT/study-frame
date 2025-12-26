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

            if (strpos($line, '=') === false) {
                continue;
            }

            $parts = explode("=", $line, 2);
            $key = trim($parts[0]);
            $value = trim($parts[1]);
            $value = trim($value, '"');

            $_ENV[$key] = $value;
            putenv("$key=$value");
        }
    }

    public static function get(string $key, mixed $default = null): mixed
    {
        if (array_key_exists($key, $_ENV)) {
            $value = $_ENV[$key];
        } else {
            $value = getenv($key);

            if ($value === false) {
                return $default;
            }
        }

        return match (strtolower((string)$value)) {
            'true', '(true)' => true,
            'false', '(false)' => false,
            'empty', '(empty)' => '',
            'null', '(null)' => null,
            default => $value,
        };
    }
}
