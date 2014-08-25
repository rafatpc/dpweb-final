<?php

namespace DPWeb\Controllers;

class User {

    public function index() {
        echo "Just load the user view...<br>";
    }

    public function reset($character = null) {
        if ($character) {
            new \DPWeb\Models\Reset($character);
        } else {
            $this->resetView();
        }
    }

    public function resetView() {
        include_once './views/User/reset.php';
    }

}
