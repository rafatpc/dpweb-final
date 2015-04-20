<?php

namespace DPWeb\System;

class FrontController {

    private $controller = 'Home';
    private $method = 'index';
    private $params = null;

    public function __construct() {
        $this->setUpFrontController();
        $this->executeController();
    }

    function setUpFrontController() {
        $components = explode('/', RESTFUL_URI, 3);

        //TODO: Security checks
        
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
        $class = '\\DPWeb\\Controllers\\' . ucfirst($this->controller);
        $instance = new $class();
        
        if(!method_exists($instance, $this->method)){
            throw new \Exception('Method not implemented: ' . $class . '->' . $this->method, 501);
        }
        
        if($this->params){
            call_user_func(array($instance, $this->method), $this->params); 
        } else {
            call_user_func(array($instance, $this->method)); 
        }
    }
}
