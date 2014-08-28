<?php

namespace DPWeb\Controllers;

class Login {

    public function index() {
        if (isset($_POST['login']) && !isset($_SESSION['dpw_user'])) {
            new \Login($_POST['username'], $_POST['password']);
        }
        
        View::getInstance()->render('home');
    }

}
