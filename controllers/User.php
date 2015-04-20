<?php

namespace DPWeb\Controllers;

class User extends \DefaultController
{

    public function index() {
        $this->checkSession();
        $this->overview();
    }

    public function login() {
        if (isset($_POST['login']) && !isset($_SESSION['dpw_user'])) {
            $li = new \DPWeb\Models\User\Account();
            if (!$li->loginUser($_POST['username'], $_POST['password'])) {
                $this->view->render('home');
            } else {
                header('Location: /user/overview/');
            }
        } else {
            $this->view->render('home');
        }
    }

    public function register() {
        if (isset($_POST['register-user'])) {
            $register = new \DPWeb\Models\User\Account();
            $registerData = $register->register($_POST['username'], $_POST['password']);

            $this->view->render('register', $registerData);
        } else {
            $this->view->render('register');
        }
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
