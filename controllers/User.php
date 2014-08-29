<?php

namespace DPWeb\Controllers;

class User extends \DefaultController {

    public function index() {
        $this->checkSession();
        $this->overview();
    }

    public function overview() {
        $this->view->render('user/characters', $this->checkSession()->getCharacters());
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

}
