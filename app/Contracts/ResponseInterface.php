<?php

declare(strict_types=1);

namespace App\Contracts;

interface ResponseInterface
{
    public function send(): void;
    public static function json(array $data, int $stauts): self;
    public static function html(string $html, int $stauts): self;
}
