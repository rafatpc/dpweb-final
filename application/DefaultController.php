<?php

namespace DPWeb\Application;

class DefaultController {
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

    public function __construct(){
    	$this->db = \DPWeb\Application\Database::getInstance();
    	$this->config = \DPWeb\Application\Config::getInstance();
    	$this->view = \DPWeb\Controllers\View::getInstance();
    }
}
