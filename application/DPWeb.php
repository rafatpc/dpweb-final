<?php

namespace DPWeb\Application;

require_once './application/Autoloader.php';

class DPWeb {
    public function __construct() {
        new \DPWeb\Application\Autoloader();
        new \DPWeb\Application\FrontController();
    }
}
