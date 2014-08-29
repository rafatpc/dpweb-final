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
        $sess = $this->checkSession();
        if ($uid) {
            new \DPWeb\Models\User\GrandReset($uid);
        } else {
            $this->view->render('user/characters', $sess->getCharacters());
        }
    }

    public function addstats($uid = null) {
        $sess = $this->checkSession();
        if ($uid) {
            new \DPWeb\Models\User\AddStats($uid);
        } else {
            $this->view->render('user/characters', $sess->getCharacters());
        }
    }

    public function doulestats($uid = null) {
        $sess = $this->checkSession();
        if ($uid) {
            new \DPWeb\Models\User\DoubleStats($uid);
        } else {
            $this->view->render('user/characters', $sess->getCharacters());
        }
    }

    public function warp($uid = null) {
        $sess = $this->checkSession();
        if ($uid) {
            new \DPWeb\Models\User\Warp($uid);
        } else {
            $this->view->render('user/characters', $sess->getCharacters());
        }
    }

    public function pkclear($uid = null) {
        $sess = $this->checkSession();
        if ($uid) {
            new \DPWeb\Models\User\PKClear($uid);
        } else {
            $this->view->render('user/characters', $sess->getCharacters());
        }
    }

}
