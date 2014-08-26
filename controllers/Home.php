<?php

namespace DPWeb\Controllers;

class Home {

    public function index() {
        View::getInstance()->render('home', array("Hello, how are you?"));
    }

}
