<?php

namespace DPWeb\Controllers;

class Home extends \DefaultController {

    public function index($data = array()) {
        $this->view->render('home', $data);
    }

}
