<?php

namespace DPWeb\System;

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

    /**
     * 
     * @return \DPWeb\Models\User\Account
     */
    public function checkSession() {
        if (!isset($_SESSION['dpw_user']) || !isset($_SESSION['dpw_pass']) || !$this->validator->session()) {
            if (isset($_SESSION['dpw_user']) || isset($_SESSION['dpw_pass'])) {
                session_destroy();
            }

            header('Location: ' . DPWEB_BASE_DIRECTORY);
            exit;
        }

        return new \DPWeb\Models\User\Account();
    }

}
