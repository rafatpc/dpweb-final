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
        $view_file = $view . '.tpl';
        $data['layout'] = $this->layoutData;
        
        if (!$smarty->templateExists($view_file)) {
            $view_file = '404.tpl';
        }

        foreach ($data as $key => $value) {
            $smarty->assign($key, $value);
        }

        $smarty->assign('viewFileTPL', $view_file);
        $smarty->display('index.tpl');
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
