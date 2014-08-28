<?php

namespace DPWeb\Controllers;

class Test
{
    public function index() 
    {
        $view = View::getInstance();
        $view->setData(array('title' => 'Test title');
        $view->render('home');
    }
}
