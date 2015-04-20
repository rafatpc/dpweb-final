<?php

namespace DPWeb\System;

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
        $this->db = \DPWeb\System\Database::getInstance();
        $this->config = \DPWeb\System\Config::getInstance();
        $this->view = \DPWeb\System\View::getInstance();
        $this->validator = new \DPWeb\System\Validator;
    }

}
