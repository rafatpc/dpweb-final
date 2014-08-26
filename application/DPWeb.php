<?php

namespace DPWeb\Application;

require_once './application/Autoloader.php';

class DPWeb {
    
    /**
     *
     * @var Database
     */
    public $db = null;
    /**
     *
     * @var Config
     */
    public $config = null;
    public static $instance = null;
    
    private function __construct() {
        new \DPWeb\Application\Autoloader();
        $this->config = \DPWeb\Application\Config::getInstance();
        new \DPWeb\Application\FrontController();
        $this->db = \DPWeb\Application\Database::getInstance();
    }

    /**
     * 
     * @return DPWeb
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new DPWeb;
        }

        return self::$instance;
    }

}
