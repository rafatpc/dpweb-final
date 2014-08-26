<?php

error_reporting(E_ERROR | E_PARSE | E_NOTICE);

require_once './application/DPWeb.php';
require './application/libs/Smarty/Smarty.class.php';

//$smarty = new Smarty;

try {
    $app = \DPWeb\Application\DPWeb::getInstance();
    
} catch (Exception $exc) {
    echo "<pre>";
    echo $exc->getMessage();
    echo "</pre>";
}

//$memory_used = number_format(((memory_get_usage() / 1024) / 1024), 2, '.', ' ');
//echo "----------------------------------------------------------------<br/>";
//echo "{$memory_used}MB RAM used.";