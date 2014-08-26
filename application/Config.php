<?php

namespace DPWeb\Application;

class Config {

    public $configArray = array();
    public $configFolder = 'config';
    public $extension = '.php';
    public static $instance = null;

    private function __construct() {
        $this->configArray['main'] = parse_ini_file($this->config['ini_file']);
    }

    public function loadConfig($filename) {
        if (isset($this->configArray[$filename])) {
            return $this->configArray[$filename];
        }

        $filepath = $this->configFolder . DIRECTORY_SEPARATOR . $filename . $this->extension;

        if (file_exists($filepath) && is_readable($filepath)) {
            $this->configArray[$filename] = include_once $filepath;
            return $this->configArray[$filename];
        } else {
            throw new \Exception('Couldn\'t load config file.');
        }
    }

    public function __get($config) {
        return $this->loadConfig($config);
    }

    /**
     * 
     * @return Config
     */
    public static function getInstance() {
        if (self::$instance === null) {
            self::$instance = new Config;
        }
        
        return self::$instance;
    }

}
