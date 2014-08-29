<?php

namespace DPWeb\Controllers;

class User extends \DefaultController {

    private $account = null;

    public function checkSession() {
        if (!isset($_SESSION['dpw_user']) || !isset($_SESSION['dpw_pass']) || !\Validator::session()) {
            if (isset($_SESSION['dpw_user']) || isset($_SESSION['dpw_pass'])) {
                session_destroy();
            }

            header('Location: ' . DPWEB_BASE_DIRECTORY);
            exit;
        }

        $this->account = new \DPWeb\Models\User\Account();
    }

    public function index() {
        $this->checkSession();
        $this->overview();
    }

    public function overview() {
        $this->checkSession();
        $this->view->render('user/characters', $this->account->getCharacters());
    }

    public function edit($type) {
        $this->checkSession();
        
        switch ($type) {
            case 'password':
                $this->view->render('user/changepassword');
                break;
            default:
                $this->view->render('user/changemail');
        }
    }

    public function reset($character = null) {
        $this->checkSession();
        if ($character) {
            new \DPWeb\Models\Reset($character);
        } else {
            View::getInstance()->render('user/characters', $this->account->getCharacters());
        }
    }

}
