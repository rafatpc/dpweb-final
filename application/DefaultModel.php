<?php

namespace DPWeb\Application;

class DefaultModel {

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
    
    /**
     *
     * @var Validator
     */
    public $validator = null;

    public function __construct() {
        $this->db = \DPWeb\Application\Database::getInstance();
        $this->config = \DPWeb\Application\Config::getInstance();
        $this->view = \DPWeb\Application\View::getInstance();
        $this->validator = new \DPWeb\Application\Validator;
    }

}
