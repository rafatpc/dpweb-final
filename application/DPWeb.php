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

    /**
     *
     * @var View
     */
    public $view = null;
    public static $instance = null;

    private function __construct() {
        new \DPWeb\Application\Autoloader();
        $this->config = \DPWeb\Application\Config::getInstance();
        new \DPWeb\Application\FrontController();
        $this->db = \DPWeb\Application\Database::getInstance();
        $this->view = \DPWeb\Controllers\View::getInstance();
        
        if($this->config->main['development']){
            error_reporting(E_ERROR | E_PARSE | E_NOTICE);
        } else {
            error_reporting(0);
        }
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
