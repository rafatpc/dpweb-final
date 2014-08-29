<?php

namespace DPWeb\Controllers;

class Character extends \DefaultController {

    public function index() {
        $this->view->render('user/characters', $this->checkSession()->getCharacters());
    }

    public function reset($uid = null) {
        $sess = $this->checkSession();
        if ($uid) {
            new \DPWeb\Models\User\Reset($uid);
        } else {
            $this->view->render('user/characters', $sess->getCharacters());
        }
    }

    public function grandreset($uid = null) {
        
    }

    public function addstats($uid = null) {
        
    }

    public function doulestats($uid = null) {
        
    }

    public function warp($uid = null) {
        
    }

    public function pkclear($uid = null) {
        
    }

}
