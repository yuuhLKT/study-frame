<?php

declare(strict_types=1);

namespace App\Core\Http;

use App\Contracts\ResponseInterface;

class Response implements ResponseInterface
{
    private string $content;
    private int $response_code = 200;
    private array $headers;

    public function __construct(string $content, int $response_code, array $headers)
    {
        $this->content = $content;
        $this->response_code = $response_code;
        $this->headers = $headers;
    }

    private function createResponseHeader(array $header): void
    {
        foreach ($header as $key => $value) {
            header("$key: $value");
        }
    }

    public function send(): void
    {
        http_response_code($this->response_code);

        $this->createResponseHeader($this->headers);

        echo $this->content;
    }

    public static function json(array $data, int $status): self
    {
        $content = json_encode($data);

        $json_header = [
            'Content-Type' => 'application/json'
        ];

        return new self($content, $status, $json_header);
    }

    public static function html(string $html, int $status): self
    {
        return new self($html, $status, ['Content-Type' => 'text/html']);
    }
}
