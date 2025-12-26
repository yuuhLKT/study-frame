<?php

declare(strict_types=1);

namespace App\Contracts;

interface RequestInterface
{
    public static function capture(): self;

    public function getMethod(): string;

    public function getUri(): string;

    public function getQueryParams(): array;

    public function getHeaders(): array;

    public function getBody(): array;
}
