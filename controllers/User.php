<?php

namespace DPWeb\Controllers;

class User {

    private $account = null;

    public function __construct() {
        if (!isset($_SESSION['dpw_user']) || !isset($_SESSION['dpw_pass']) || !\Validator::session()) {
            if (isset($_SESSION['dpw_user']) || isset($_SESSION['dpw_pass'])) {
                session_destroy();
            }

            header('Location: ./');
            exit;
        }

        $this->account = new \DPWeb\Models\User\Account();
    }

    public function index() {
        View::getInstance()->render('home');
    }

    public function overview() {
        View::getInstance()->render('user/characters', $this->account->getCharacters());
    }

    public function edit($type) {
        echo $type;
    }

    public function reset($character = null) {
        if ($character) {
            new \DPWeb\Models\Reset($character);
        } else {
            $this->resetView();
        }
    }

}
