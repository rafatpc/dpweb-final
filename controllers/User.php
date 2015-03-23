<?php

namespace DPWeb\Controllers;

<<<<<<< HEAD
class User extends \DefaultController
{
=======
class User extends \DefaultController {
>>>>>>> 798aa1085cde3442cac6b1b50be0c40050a7c850

    public function index() {
        $this->checkSession();
        $this->overview();
    }

<<<<<<< HEAD
    public function login() {
        if (isset($_POST['login']) && !isset($_SESSION['dpw_user'])) {
            $li = new \DPWeb\Models\User\Account();
            $li->loginUser($_POST['username'], $_POST['password']);
        }

        $this->view->render('home');
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

=======
>>>>>>> 798aa1085cde3442cac6b1b50be0c40050a7c850
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
