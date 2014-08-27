<?php

namespace DPWeb\Controllers;

class User {

    public function index() {
        View::getInstance()->render('home');
    }

    public function reset($character = null) {
        if ($character) {
            new \DPWeb\Models\Reset($character);
        } else {
            $this->resetView();
        }
    }

}
