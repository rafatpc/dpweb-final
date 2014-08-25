<?php

define('ENV', 'development'); // valid "development","production"

define('APP', 'app'. DIRECTORY_SEPARATOR);
define('CORE', 'core'. DIRECTORY_SEPARATOR);

require 'core/core.php';

$httprequest = new HttpRequest();
$httprequest->setConfig(array(
    
        // The folder where the controllers are
        'controllers_folder' => 'app/controllers/',
        
        // The folder of the framework
        // example:
        // http://localhost/mvc/framework/
        // 'sub_web_folder' => '/mvc/framework/'; MUST have trailing slashs
        // if is in you main folder leave
        // 'sub_web_folder' => '/';
        'sub_web_folder' => '/netb/OOP/',
    
        // The default controller that will load on start
        'default_controller' => 'home',
    
        // The default method that will load on start
        'default_method' => 'index'

    ))->httpLoader(); // process the http request and load the controller