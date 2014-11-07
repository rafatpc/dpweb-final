<?php

session_start();
date_default_timezone_set('Europe/Sofia');
header('Content-type: text/html; charset=utf-8');

$time = explode(' ', microtime());

define('STARTTIME', ($time[1] + $time[0]));
define('DPWEB_BASE_DIRECTORY', substr(dirname($_SERVER['SCRIPT_NAME']), 0, -1) . '/');
define('DPWEB_REQUEST', substr($_SERVER['REQUEST_URI'], strlen(DPWEB_BASE_DIRECTORY)));
define('RESTFUL_URI', current(explode('?', DPWEB_REQUEST)));

require_once './application/DPWeb.php';
require_once './application/libs/Smarty/Smarty.class.php';

//try {
    $app = \DPWeb\Application\DPWeb::getInstance();
//} catch (Exception $exc) {
//    echo "<pre>";
//    echo $exc->getMessage();
//    echo "</pre>";
//}
