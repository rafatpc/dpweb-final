<?php

namespace DPWeb\Application;

class Autoloader {

    private $_fileExtension = '.php';
    private $_namespaceSeparator = '\\';

    /**
     * Creates a new <tt>Autoloader</tt> that loads classes.
     *
     * @param string $ns The namespace to use.
     */
    public function __construct() {
        $this->register();
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
            $components = explode($this->_namespaceSeparator, $className);
            $folder = $components[1];
            $file = ucfirst($components[2] . $this->_fileExtension);
            $filepath = $folder . DIRECTORY_SEPARATOR . $file;

            if (!is_dir($folder) || !is_readable($filepath) || !file_exists($filepath)) {
                throw new \Exception("Couldn't load the requested class.", 404);
            }

            require $filepath;
        }
    }

}
