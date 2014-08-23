<?php

define('APPCLASSES', 'app'. DIRECTORY_SEPARATOR . 'classes');
define('CORECLASSES', 'core'. DIRECTORY_SEPARATOR . 'classes');

/* if there is an underscore "_" in the class name it will be used as a "DIRECTORY_SEPARATOR" 
 *
 * exemple: 
 * "new DB_MySQL()" this will lead to core/classes/DB/MySQL.php
 * 
 * if you want to load core/classes/DB_MySQL you can't it will load core/classes/DB/MySQL.php
 */

function __autoload($className)
{
    $paths = array(CORECLASSES, APPCLASSES);
    $className = str_replace("_" , DIRECTORY_SEPARATOR, $className);
    foreach ($paths as $path)
    {
        $filename = $path . DIRECTORY_SEPARATOR . $className;
        if (is_readable($filename . '.php'))
        {
            require_once $filename . '.php';
            break;
       }
    }
}
