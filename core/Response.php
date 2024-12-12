<?php

namespace app\core;

class Response {
    /**
     * Set the HTTP status code for the response.
     * @param int $code
     * @return void
     */
    public function setStatusCode(int $code): void {
        http_response_code($code);
    }

    /**
     * Set a response header.
     * @param string $key
     * @param string $value
     * @return void
     */
    public function setHeader(string $key, string $value): void {
        header("$key: $value");
    }

    /**
     * Send a plain text response.
     * @param string $content
     * @return void
     */
    public function send(string $content): void {
        echo $content;
    }

    /**
     * Send a JSON response.
     * @param mixed $data
     * @return void
     */
    public function sendJson($data): void {
        $this->setHeader('Content-Type', 'application/json');
        echo json_encode($data, JSON_PRETTY_PRINT);
    }

    /**
     * Send an HTML response.
     * @param string $html
     * @return void
     */
    public function sendHtml(string $html): void {
        $this->setHeader('Content-Type', 'text/html');
        echo $html;
    }

    /**
     * Redirect to another URL.
     * @param string $url
     * @return void
     */
    public function redirect(string $url): void {
        header("Location: $url");
        exit;
    }

    /**
     * Send a file for download.
     * @param string $filePath
     * @param string $fileName
     * @return void
     */
    public function sendFile(string $filePath, string $fileName): void {
        $this->setHeader('Content-Type', mime_content_type($filePath));
        $this->setHeader('Content-Disposition', "attachment; filename=\"$fileName\"");
        readfile($filePath);
    }

    /**
     * Send an error response.
     * @param string $message
     * @param int $code
     * @return void
     */
    public function sendError(string $message, int $code = 400): void {
        $this->setStatusCode($code);
        $this->sendJson(['error' => $message]);
    }
}
