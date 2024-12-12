<?php

namespace app\core;

class BaseController
{
    public function model($model) {
        require_once __DIR__ . '/../models/' . $model . '.php';
        return new $model();
    }

    public function renderPage(string $view, array $data = []): void {
        extract($data); // Extract data into variables for the view
        require_once __DIR__ . "/../views/$view.php";
    }

    public function renderLayout(string $layout, string $view, array $data = []): void {
        extract($data); // Extract data into variables
        ob_start(); // Start output buffering for the page content
        require_once __DIR__ . "/../views/$view.php";
        $content = ob_get_clean(); // Capture the rendered content

        // Include the layout and pass the page content
        require_once __DIR__ . "/../views/layouts/$layout.php";
    }

}