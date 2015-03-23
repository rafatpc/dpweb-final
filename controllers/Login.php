<?php

namespace DPWeb\Controllers;

class Login extends \DefaultController {

    public function index() {
        if (isset($_POST['login']) && !isset($_SESSION['dpw_user'])) {
            $li = new \DPWeb\Models\User\Login();
            $li->loginUser($_POST['username'], $_POST['password']);
        }

        $this->view->render('home');
    }

}
