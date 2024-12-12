<?php

namespace app\core;

class Application {
    public Router $router;
    public Request $request;
    public Response $response;

    public function __construct(?Router $router = null, ?Request $request = null, ?Response $response = null) {
        $this->router = $router ?? new Router();
        $this->request = $request ?? new Request();
        $this->response = $response ?? new Response();
    }

    public function run(): void {
        try {
            $this->router->handleRequest($this->request, $this->response);
        } catch (\Throwable $e) {
            $this->handleError($e);
        }
    }

    /**
     * Handle application-level errors.
     */
    private function handleError(\Throwable $e): void {
        http_response_code(500);
        echo "An error occurred: " . htmlspecialchars($e->getMessage());
    }
}
