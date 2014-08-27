<?php

namespace DPWeb\Controllers;

class Home {

    public function index($data = array()) {
        View::getInstance()->render('home', $data);
    }

}
