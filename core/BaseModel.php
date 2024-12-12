<?php

namespace app\core;

require_once __DIR__ . '/../vendor/autoload.php';

use app\core\Database\Database;

class BaseModel {
    protected $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }
}