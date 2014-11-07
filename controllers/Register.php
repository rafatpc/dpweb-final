<?php

namespace DPWeb\Controllers;

class Register extends \DefaultController
{

    public function index() {
        $this->view->render('register');
    }

}
