<?php

namespace DPWeb\Controllers;

class Items extends \DefaultController {

    public function index() {
        
    }

    public function market($params = null) {
        $this->view->render('items/market');
    }

    public function webshop($params = null) {
        if ($params != null) {
            $params = explode('/', $params, 2);
            $iid = (int) $params[1];

            if ($iid !== 0) {
                if (strpos($params[0], 'buy') === 0) {
                    echo 'buy request for item: ' . $iid;
                } else {
                    echo 'Show buy form for item from ' . $cat . ' with $iid=' . $iid;
                }
            } else {
                echo 'invalid buy request';
            }
        } else {
            $this->view->render('items/webshop');
        }
    }

}
