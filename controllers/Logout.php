<?php

namespace DPWeb\Controllers;

class Logout extends \DefaultController
{

    public function index() {
        if (isset($_POST['logout'])) {
            session_start();
            session_destroy();
        }

        header('Location: /');
    }

}
