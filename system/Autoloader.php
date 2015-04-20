<?php

namespace DPWeb\System;

class Autoloader {

    /**
     * Creates a new <tt>Autoloader</tt> that loads classes.
     *
     * @param string $ns The namespace to use.
     */
    public function __construct() {
        $this->register();
        $this->setAliases(array(
            '\DPWeb\System\Validator' => 'Validator',
            '\DPWeb\System\DefaultController' => 'DefaultController',
            '\DPWeb\System\DefaultModel' => 'DefaultModel'
        ));
    }

    /**
     * Installs this class loader on the SPL autoload stack.
     */
    public function register() {
        spl_autoload_register(array($this, 'loadClass'));
    }

    /**
     * Uninstalls this class loader from the SPL autoloader stack.
     */
    public function unregister() {
        spl_autoload_unregister(array($this, 'loadClass'));
    }

    /**
     * Loads the given class or interface.
     *
     * @param string $className The name of the class to load.
     * @return void
     */
    public function loadClass($className) {
        if ($className) {
            $components = preg_split("/\\\\/", $className, -1, PREG_SPLIT_NO_EMPTY);

            $file = ucfirst(end($components) . '.php');
            unset($components[count($components) - 1], $components[0]);
            $path = implode(DIRECTORY_SEPARATOR, $components);
            $filepath = $path . DIRECTORY_SEPARATOR . $file;

            if (!is_dir($path) || !is_readable($filepath) || !file_exists($filepath)) {
                echo $filepath;
                throw new \Exception("Couldn't load the requested class: {$file}", 404);
            }

            require $filepath;
        }
    }

    public function setAliases($aliases) {
        foreach ($aliases as $class => $alias) {
            class_alias($class, $alias);
        }

        return true;
    }

}
