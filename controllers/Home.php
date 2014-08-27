<?php

namespace DPWeb\Controllers;

class Home {

    public function index() {
        if (isset($_POST['login'])) {
            new \DPWeb\Models\User\Login($_POST['username'], $_POST['password']);
        }
        
        View::getInstance()->render('home', array("Hello, how are you?"));
    }

}
