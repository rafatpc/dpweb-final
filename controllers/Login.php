<?php

namespace DPWeb\Controllers;

class Login {

    public function index() {
        if (isset($_POST['login']) && !isset($_SESSION['dpw_user'])) {
            // new \DPWeb\Models\User\Login($_POST['username'], $_POST['password']);
            // see the index.php and Autoloader::setAliases
            new \Model_Login($_POST['username'], $_POST['password']);
        }

        View::getInstance()->render('home');
    }

}
