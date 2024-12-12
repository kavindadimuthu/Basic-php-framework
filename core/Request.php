<?php

namespace app\core;

class Request {
    /**
     * Get the HTTP method of the request.
     * @return string
     */
    public function getMethod(): string {
        return $_SERVER['REQUEST_METHOD'] ?? 'GET';
    }

    /**
     * Get the request path (URL).
     * @return string
     */
    public function getPath(): string {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        return strtok($path, '?'); // Remove query parameters
    }

    /**
     * Get query parameters from the URL.
     * @return array
     */
    public function getQueryParams(): array {
        return $_GET ?? [];
    }

    /**
     * Get all request headers.
     * @return array
     */
    public function getHeaders(): array {
        return getallheaders() ?? [];
    }

    /**
     * Get the raw body of the request.
     * @return string
     */
    public function getBody(): string {
        return file_get_contents('php://input');
    }

    /**
     * Get parsed body data based on content type.
     * @return array|null
     */
    public function getParsedBody(): ?array {
        $contentType = $this->getContentType();

        if ($contentType === 'application/json') {
            return json_decode($this->getBody(), true);
        } elseif ($contentType === 'application/x-www-form-urlencoded') {
            return $_POST;
        }

        return null;
    }

    /**
     * Get uploaded files.
     * @return array
     */
    public function getFiles(): array {
        return $_FILES ?? [];
    }

    /**
     * Get a specific query or body parameter.
     * @param string $key
     * @param mixed $default
     * @return mixed
     */
    public function getParam(string $key, $default = null) {
        return $_GET[$key] ?? $_POST[$key] ?? $default;
    }

    /**
     * Get the client's IP address.
     * @return string
     */
    public function getClientIp(): string {
        return $_SERVER['REMOTE_ADDR'] ?? '127.0.0.1';
    }

    /**
     * Get the content type of the request.
     * @return string|null
     */
    public function getContentType(): ?string {
        return $_SERVER['CONTENT_TYPE'] ?? null;
    }
}
