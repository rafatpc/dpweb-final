<?php

namespace DPWeb\Application;

class FrontController {

    private $controller = 'Home';
    private $method = 'index';
    private $params = null;

    public function __construct() {
        define('DPWEB_BASE_DIRECTORY', dirname($_SERVER['SCRIPT_NAME']) . DIRECTORY_SEPARATOR);
        define('DPWEB_REQUEST', substr($_SERVER['REQUEST_URI'], strlen(DPWEB_BASE_DIRECTORY)));


        $this->setUpFrontController();
        $this->executeController();
    }

    function setUpFrontController() {
        $components = explode('/', DPWEB_REQUEST, 3);

        if (isset($components[0]) && !empty($components[0])) {
            $this->controller = $components[0];
        }

        if (isset($components[1]) && !empty($components[1])) {
            $this->method = $components[1];
        }
        
        if (isset($components[2]) && !empty($components[2])) {
            $this->params = $components[2];
        }
    }

    function executeController() {
        $namespace = '\\DPWeb\\Controllers\\' . ucfirst($this->controller);
        $instance = new $namespace();
        
        if($this->params){
            call_user_func(array($instance, $this->method), $this->params); 
        } else {
            call_user_func(array($instance, $this->method)); 
        }
    }
}
