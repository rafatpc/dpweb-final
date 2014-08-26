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

        $this->layoutData = array(
            'title' => 'DarkPowerMu'
        );
    }

    public function render($view, $data = array()) {
        $smarty = $this->smarty;
        $viewFile = $view . '.tpl';
        $data['layout'] = $this->layoutData;

        if (!$smarty->templateExists($viewFile)) {
            $viewFile = '404.tpl';
        }

        $this->variableAssign($data, $viewFile);
        $this->dispatch();
    }

    public function variableAssign($data, $viewFile) {
        foreach ($data as $key => $value) {
            $this->smarty->assign($key, $value);
        }
        
        $this->smarty->assign('viewFileTPL', $viewFile);
        $this->smarty->assign('sess', $_SESSION);
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
