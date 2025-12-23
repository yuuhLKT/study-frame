<?php

declare(strict_types=1);

namespace App\Core\Routing;

readonly class Route
{
    public function __construct(
        public string $method,
        public string $uri,
        public string $controller,
        public string $action
    ) {}

    public static function make(string $method, string $uri, array $action): self
    {
        return new self($method, $uri, $action[0], $action[1]);
    }
}
