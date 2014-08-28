<?php

namespace DPWeb\Controllers;

class View {

    public $layoutData = array();
    public $smarty = null;
    public static $instance = null;

    private function __construct() {
        $smarty = new \Smarty;
        $smarty->setCacheDir('./views/cache');
        $smarty->setCompileDir('./views/compiled');
        $smarty->setTemplateDir('./views');

        if (!\DPWeb\Application\Config::getInstance()->main['development']) {
            $smarty->caching = true;
            $smarty->cache_lifetime = 120;
        } else {
            if (\DPWeb\Application\Config::getInstance()->main['smartydebug']) {
                $smarty->debugging = true;
            }
        }

        $this->smarty = $smarty;
        $this->dpcustom();
    }
    
    public function setData($data = array()) {
        $this->layoutData = array_merge($this->layoutData, $data);
        return $this; // in order to chain 
        // example: See Controllers/test.php
    }

    public function setError($value) {
        $this->layoutData['errors'] = $value;
    }
    
    public function titleGenerator() {
        //SHOULD BE UPDATE, I know :D
        $this->layoutData['title'] = 'DarkPowerMu - Season 3 Episode 1 MuOnline :: ' . $_SERVER['REQUEST_URI'];
    }

    public function render($view, $data = array()) {
        $smarty = $this->smarty;
        $viewFile = $view . '.tpl';
        $this->setTemplateData();
        $this->titleGenerator();
        $data['layout'] = $this->layoutData;
        
        if (!$smarty->templateExists($viewFile)) {
            $viewFile = '404.tpl';
        }

        $this->variableAssign($data, $viewFile);

        $time = explode(' ', microtime());
        $diff = $time[1] + $time[0];
        $total_time = round(($diff - STARTTIME), 4);

        $smarty->assign('loadtime', $total_time);
        $this->dispatch();
    }

    public function dpcustom() {
        $this->layoutData = array(
            'links' => array(
                'Home' => 'home',
                'Register' => 'register',
                'Rankings' => 'rankings',
                'Download' => 'download',
                'Castle Siege' => 'castlesiege',
                'Market' => 'market',
                'Webshop' => 'webshop'
            ),
            'navlinks' => array(
                'Home' => 'home',
                'Events' => 'events',
                'Hall of Fame' => 'hof',
            ),
            'servername' => 'DarkPowerMu',
            'online' => 20,
            'limit' => 200,
            'news' => array(
                'Test of the news 1' => 'blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah ',
                'Test of the news 2' => 'blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah ',
                'Test of the news 3' => 'blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah blah ',
            )
        );
    }

    public function setTemplateData() {
        $this->layoutData['sess'] = $_SESSION;
        $this->layoutData['baseurl'] = '//' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF']) . '/';
        $this->layoutData['js'] = "templates/dpcustom/javascript/";
        $this->layoutData['imgs'] = "templates/dpcustom/images/";
        $this->layoutData['css'] = "templates/dpcustom/css/";
    }

    public function variableAssign($data, $viewFile) {
        foreach ($data as $key => $value) {
            $this->smarty->assign($key, $value);
        }

        $this->smarty->assign('viewFileTPL', $viewFile);
        $this->smarty->assign('usedMemory', number_format(((memory_get_usage() / 1024) / 1024), 2, '.', ' '));
    }

    public function dispatch() {
        $this->smarty->display('index.tpl');
    }

    /**
     * 
     * @return View
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new View();
        }

        return self::$instance;
    }

}
