<?php

namespace DPWeb\Application;

require_once './application/Autoloader.php';

class DPWeb {
    
    public static $instance = null;

    private function __construct() {
        set_exception_handler(array($this, 'exceptionHandler'));
        new \DPWeb\Application\Autoloader();
        \DPWeb\Application\Config::getInstance();
        new \DPWeb\Application\FrontController();
        
        if ($this->config->main['development']) {
            error_reporting(E_ERROR | E_PARSE | E_NOTICE);
        } else {
            error_reporting(0);
        }
    }

    public function exceptionHandler(\Exception $exception) {
      echo '<b>Fatal error</b>: <i>' . $exception->getMessage();
      echo '</i> in <b>' . $exception->getFile() . '</b> on line <b>' . $exception->getLine() . '</b><br>';
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
