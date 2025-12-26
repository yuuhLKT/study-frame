<?php

declare(strict_types=1);

namespace App\Core\Http;

readonly class Request
{
    public function __construct(
        private string $method,
        private string $uri,
        private array $queryParams,
        private array $headers,
        private array $body
    ) {}

    public static function capture(): self
    {
        $method = strtoupper($_SERVER['REQUEST_METHOD']) ?? 'GET';

        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';

        $queryParams = $_GET;

        $raw_headers = $_SERVER;

        $headers = [];

        foreach ($raw_headers as $key => $value) {
            $http_prefix = "HTTP_";
            if (str_starts_with($key, $http_prefix)) {
                $headerName = substr($key, strlen($http_prefix));

                $headerName = str_replace('_', '-', $headerName);
                $headerName = ucwords(strtolower($headerName), '-');

                $headers[$headerName] = $value;
            }
        }

        $body = !empty($_POST)
            ? $_POST
            : (json_decode(file_get_contents('php://input'), true) ?? []);


        return new self($method, $uri, $queryParams, $headers, $body);
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function getQueryParams()
    {
        return $this->queryParams;
    }

    public function getHeaders()
    {
        return $this->headers;
    }

    public function getBody()
    {
        return $this->body;
    }
}
